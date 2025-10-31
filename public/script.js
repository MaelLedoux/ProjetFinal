/* script.js — propre, sans doublons • SPA + sticky desktop + burger mobile */

/* --------- Utils --------- */
function getCleanPath(pathname = location.pathname) {
  return new URL(pathname, location.origin).pathname || "/";
}

function inProjets(pathname = location.pathname) {
  return getCleanPath(pathname).includes("/projets/");
}

function getBasePath(pathname = location.pathname) {
  return inProjets(pathname) ? "../" : "/";
}

function scrollToTop() {
  try {
    window.scrollTo({ top: 0, behavior: "auto" }); // "auto" au lieu de "instant"
  } catch {
    window.scrollTo(0, 0);
  }
}

/* --------- BOOT --------- */
document.addEventListener("DOMContentLoaded", () => {
  initPage(location.pathname);
  enableSpaNavigation();
  window.addEventListener("popstate", () => initPage(location.pathname));
});

/* --------- SPA: chargement de page --------- */
function initPage(pathname) {
  const cleanPath = getCleanPath(pathname);
  const pageName = cleanPath.split("/").pop() || "index.html";

  const pageMeta = {
    "index.html": { titre: "MH Interior - Accueil", bannerClass: "" },
    "about.html": { titre: "MH Interior - À propos", bannerClass: "no-banner" },
    "contact.html": { titre: "MH Interior - Contact", bannerClass: "" },
    "portfolio.html": { titre: "MH Interior - Portfolio", bannerClass: "" },
    "services.html": { titre: "MH Interior - Services", bannerClass: "" },
    "merci.html": { titre: "MH Interior - Merci !", bannerClass: "no-banner" },
    "projet1.html": { titre: "MH Interior - Galerie", bannerClass: "" },
    "projet2.html": { titre: "MH Interior - Galerie", bannerClass: "" },
    "projet3.html": { titre: "MH Interior - Galerie", bannerClass: "" },
    "projet4.html": { titre: "MH Interior - Galerie", bannerClass: "" },
    "projet5.html": { titre: "MH Interior - Galerie", bannerClass: "" },
    "projet6.html": { titre: "MH Interior - Galerie", bannerClass: "" },
    "archi.html": { titre: "MH Interior - Archi Intérieur", bannerClass: "" },
    "deco.html": { titre: "MH Interior - Décoration", bannerClass: "" },
    "dessins-peintures.html": { titre: "MH Interior - Dessins & peintures", bannerClass: "" },
    "maquettes.html": { titre: "MH Interior - Maquettes", bannerClass: "" },
    "pros.html": { titre: "MH Interior - Projets pros", bannerClass: "" }
  };

  const meta = pageMeta[pageName] || { titre: "MH Interior", bannerClass: "" };
  document.title = meta.titre;

  // Charge le HTML de la page demandée et remplace <main>
  fetch(cleanPath, { credentials: "same-origin" })
    .then(res => res.text())
    .then(html => {
      const parser = new DOMParser();
      const doc = parser.parseFromString(html, "text/html");
      const newMain = doc.querySelector("main");
      const currentMain = document.querySelector("main");
      if (currentMain && newMain) currentMain.replaceWith(newMain);

      // (Re)charger header/footer après injection du main
      loadHeader(getBasePath(cleanPath), meta);
      loadFooter(getBasePath(cleanPath));

      if (pageName === "index.html") injectRandomProjects();

      reinitAll();
      scrollToTop();
    })
    .catch(err => console.error("Erreur initPage :", err));
}

/* --------- Header / Footer --------- */
function loadHeader(basePath, meta) {
  fetch(basePath + "components/header.html", { credentials: "same-origin" })
    .then(res => res.text())
    .then(data => {
      const processed = data
        .replace(/{{base}}/g, basePath)
        .replace(/{{titre}}/g, meta.titre)
        .replace(/{{bannerClass}}/g, meta.bannerClass);

      const headerPlaceholder = document.getElementById("header-placeholder");
      if (headerPlaceholder) headerPlaceholder.innerHTML = processed;

      attachSearchEvents();
      makeNavSticky(); // sticky (desktop only)
      initBurgerNav(); // burger (mobile only, idempotent)
    })
    .catch(err => console.error("Erreur loadHeader :", err));
}

function loadFooter(basePath) {
  fetch(basePath + "components/footer.html", { credentials: "same-origin" })
    .then(res => res.text())
    .then(data => {
      const processed = data.replace(/{{base}}/g, basePath);
      const footerPlaceholder = document.getElementById("footer-placeholder");
      if (footerPlaceholder) footerPlaceholder.innerHTML = processed;
      const yearSpan = document.getElementById("year");
      if (yearSpan) yearSpan.textContent = new Date().getFullYear();
    })
    .catch(err => console.error("Erreur loadFooter :", err));
}

/* --------- Sticky nav (desktop only) --------- */
function makeNavSticky() {
  const nav = document.querySelector("header nav");
  if (!nav || nav.dataset.stickyInit === "1") return;
  nav.dataset.stickyInit = "1";

  const mq = window.matchMedia("(max-width: 900px)");
  const apply = () => {
    if (mq.matches) {
      nav.classList.remove("sticky-nav"); // jamais de sticky en mobile
      return;
    }
    nav.classList.toggle("sticky-nav", window.scrollY > 200);
  };

  window.addEventListener("scroll", apply, { passive: true });
  (mq.addEventListener ? mq.addEventListener("change", apply) : mq.addListener(apply));
  apply();
}

/* --------- Burger mobile --------- */
function initBurgerNav() {
  const header = document.querySelector("header");
  const nav = document.querySelector("header nav");
  if (!header || !nav) return;

  // bouton (créé une seule fois)
  let btn = header.querySelector(".burger");
  if (!btn) {
    btn = document.createElement("button");
    btn.className = "burger";
    btn.setAttribute("aria-label", "Ouvrir le menu");
    btn.innerHTML = '<span class="bar"></span>';
    header.appendChild(btn);
  }

  // UL du menu (sécurise la sélection et la classe nécessaire)
  let ul =
    nav.querySelector("ul.menu-popover") ||
    nav.querySelector(":scope > ul") ||
    nav.querySelector("ul");
  if (!ul) return;
  ul.classList.add("menu-popover");
  if (!ul.id) ul.id = "mobile-menu";
  btn.setAttribute("aria-controls", ul.id);

  // marqueur CSS pour n’appliquer les règles mobiles que si burger OK
  document.body.classList.add("has-burger");

  const placeMenuUnderButton = () => {
    if (!ul) return;

    // rendre le popover mesurable sans flash
    const wasOpen = nav.classList.contains("is-open");
    const prevVis = ul.style.visibility;
    const prevDisp = ul.style.display;
    ul.style.visibility = "hidden";
    ul.style.display = "block";
    nav.classList.add("is-open");

    // positionnement: collé au bouton
    const btnRect = btn.getBoundingClientRect();
    const menuWidth = ul.offsetWidth || 280;
    const pad = 12;

    // aligner le bord droit du menu sur le bord droit du bouton
    let left = Math.round(btnRect.right - menuWidth);
    left = Math.max(pad, Math.min(left, window.innerWidth - pad - menuWidth));

    // TOP = juste sous le bouton (gap 4–6px)
    const top = Math.round(btnRect.bottom + 6);

    ul.style.setProperty("--menu-left", left + "px");
    ul.style.setProperty("--menu-top", top + "px");

    // restore
    if (!wasOpen) nav.classList.remove("is-open");
    ul.style.visibility = prevVis;
    ul.style.display = prevDisp;
  };

  const closeMenu = () => {
    nav.classList.remove("is-open");
    btn.setAttribute("aria-expanded", "false");
    document.documentElement.style.overflowY = "";
    document.body.style.overflowY = "";
  };

  const openMenu = () => {
    btn.setAttribute("aria-expanded", "true");
    placeMenuUnderButton();
    nav.classList.add("is-open");
    document.documentElement.style.overflowY = "hidden";
    document.body.style.overflowY = "hidden";
  };

  const toggle = () => (nav.classList.contains("is-open") ? closeMenu() : openMenu());

  if (!btn.dataset.bound) {
    btn.addEventListener("click", toggle);
    nav.addEventListener("click", (e) => {
      const a = e.target.closest("a");
      if (a && nav.classList.contains("is-open")) closeMenu();
    });
    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape" && nav.classList.contains("is-open")) closeMenu();
    });
    window.addEventListener("resize", () => {
      if (btn.matches('[aria-expanded="true"]')) placeMenuUnderButton();
    });
    btn.dataset.bound = "1";
  }

  const mq = window.matchMedia("(max-width: 900px)");
  const apply = () => {
    if (mq.matches) {
      btn.style.display = "inline-flex";
      nav.classList.remove("sticky-nav"); // pas de sticky en mobile
      closeMenu(); // fermé par défaut
    } else {
      btn.style.display = "none";
      closeMenu();
    }
  };
  (mq.addEventListener ? mq.addEventListener("change", apply) : mq.addListener(apply));
  apply();
}

/* --------- SPA nav --------- */
function enableSpaNavigation() {
  if (document.body.dataset.spaInit === "1") return;
  document.body.dataset.spaInit = "1";

  document.addEventListener("click", e => {
    const link = e.target.closest("a");
    if (!link) return;

    // Cas à laisser au navigateur
    if (link.hasAttribute("download")) return;
    if (link.target && link.target.toLowerCase() === "_blank") return;
    const href = link.getAttribute("href") || "";
    if (!href || href.startsWith("#")) return;
    if (link.hasAttribute("data-no-spa")) return; // opt-out

    // Interne seulement
    const url = new URL(href, location.href);
    if (url.origin !== location.origin) return;

    // Intercept SPA
    e.preventDefault();
    const to = url.pathname + url.search + url.hash;
    history.pushState({}, "", to);
    initPage(to);
  });
}

/* --------- Hooks post-chargement --------- */
function reinitAll() {
  attachSearchEvents();
  attachHoverAnimations();
  initSlider();
  initFullscreenVideo();
  initFormHandler();
  loadPageData();
}

/* --------- Accueil : 3 projets aléatoires --------- */
function injectRandomProjects() {
  const projets = [
    { url: "/projets/projet1.html", titre: "Appartement chaleureux - Montbeton (82)", image: "images/projet1-1.jpg" },
    { url: "/projets/projet2.html", titre: "Kitchenette - Montauban (82)", image: "images/projet2-1.jpg" },
    { url: "/projets/projet3.html", titre: "Pièce contemporaine - Montauban (82)", image: "images/projet3-1.jpg" },
    { url: "/projets/projet4.html", titre: "Salle séminaire - Montauban (82)", image: "images/projet4-1.jpg" },
    { url: "/projets/projet5.html", titre: "Ancienne cuisine - Montricoux (82)", image: "images/projet5-1.jpg" },
    { url: "/projets/projet6.html", titre: "Mezzanine - Nérac (47)", image: "images/projet6-1.jpg" }
  ];
  const galerie = document.querySelector(".gallery");
  if (!galerie) return;
  galerie.innerHTML = "";
  projets.sort(() => 0.5 - Math.random()).slice(0, 3).forEach(p => {
    const a = document.createElement("a");
    a.href = p.url; // liens absolus -> SPA intercepte
    a.className = "project";
    a.style.backgroundImage = `url(${p.image})`;
    const span = document.createElement("span");
    span.textContent = p.titre;
    a.appendChild(span);
    galerie.appendChild(a);
  });
}

/* --------- Data dynamiques par page --------- */
function loadPageData() {
  const file = location.pathname.split("/").pop();

  if (file === "dessins-peintures.html") {
    fetchDataAndInject(
      "http://localhost:8001/api/realisations/dessin",
      ".gallery-dessins",
      injectDessinsPeintures
    );
  } else if (file === "maquettes.html") {
    fetchDataAndInject(
      "http://localhost:8001/api/realisations/maquette",
      ".gallery-maquettes",
      injectMaquettes
    );
  } else if (file === "services.html") {
    fetchDataAndInject(
      "http://localhost:8001/api/services",
      ".services-wrapper",
      injectServices
    );
  }
}

function fetchDataAndInject(url, selector, injectFn) {
  const container = document.querySelector(selector);
  if (!container) return;
  fetch(url, { headers: { "Accept": "application/json" } })
    .then(res => res.json())
    .then(data => injectFn(data))
    .catch(err => {
      console.error(`Erreur ${selector}:`, err);
      container.innerHTML = "<p>Erreur lors du chargement.</p>";
    });
}

/* --------- Injecteurs --------- */
function injectDessinsPeintures(data) {
  const cont = document.querySelector(".gallery-dessins");
  if (!cont) return;
  cont.innerHTML = "";
  (data || []).forEach(item => {
    const div = document.createElement("div");
    div.className = "dessin-peinture-project";
    div.innerHTML = `
      <img src="${item.image}" alt="${item.description||''}">
      <p>${item.description||''}</p>
    `;
    cont.appendChild(div);
  });
}

function injectMaquettes(data) {
  const cont = document.querySelector(".gallery-maquettes");
  if (!cont) return;
  cont.innerHTML = "";
  (data || []).forEach(item => {
    const div = document.createElement("div");
    div.className = "maquette-project";
    div.innerHTML = `
      <img src="${item.image}" alt="${item.description || ''}">
      <p>${item.description || ''}</p>
    `;
    cont.appendChild(div);
  });
}

function injectServices(data) {
  const servicesDiv = document.querySelector(".services-wrapper");
  const videoSection = document.querySelector("#services-video");
  if (!servicesDiv || !videoSection) return;

  servicesDiv.innerHTML = "";
  const v1 = videoSection.querySelector(".video-wrapper.vertical");
  const v2 = videoSection.querySelector(".video-wrapper.horizontal");
  if (v1) v1.innerHTML = "";
  if (v2) v2.innerHTML = "";

  ((data && data.services) || []).forEach(s => {
    const d = document.createElement("div");
    d.className = "service";
    d.innerHTML = `<span class="icon">${s.icone ?? ""}</span><h3>${s.titre ?? ""}</h3><p>${s.description ?? ""}</p>`;
    servicesDiv.appendChild(d);
  });

  ((data && data.videos) || []).forEach((v, i) => {
    if (!v.video) return;
    const sel = i === 0 ? ".video-wrapper.vertical" : ".video-wrapper.horizontal";
    const html = i === 0
      ? `<video controls autoplay muted loop playsinline><source src="${v.video}" type="video/mp4">Votre navigateur ne supporte pas la vidéo.</video>`
      : `<iframe src="${v.video}" title="${v.titre || ""}" allowfullscreen allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"></iframe>`;
    const wrap = videoSection.querySelector(sel);
    if (wrap) wrap.innerHTML = html;
  });
}

/* --------- UI helpers --------- */
function attachSearchEvents() {
  const toggle = document.getElementById("searchToggle");
  const form = document.getElementById("searchForm");
  const input = document.getElementById("searchInput");
  if (!toggle || !form || !input) return;

  if (!form.dataset.bound) {
    toggle.addEventListener("click", () => {
      form.classList.toggle("active");
      if (form.classList.contains("active")) input.focus();
      else {
        input.value = "";
        document.querySelectorAll(".project").forEach(p => p.style.display = "block");
      }
    });

    const filter = () => {
      const q = input.value.toLowerCase().trim();
      document.querySelectorAll(".project").forEach(p => {
        p.style.display = p.textContent.toLowerCase().includes(q) ? "block" : "none";
      });
    };
    input.addEventListener("input", filter);
    form.addEventListener("submit", e => {
      e.preventDefault();
      filter();
    });

    form.dataset.bound = "1";
  }
}

function attachHoverAnimations() {
  document.querySelectorAll(".project, .category-card").forEach(el => {
    if (el.dataset.bound) return;
    el.addEventListener("mouseenter", () => el.style.transform = "scale(1.05)");
    el.addEventListener("mouseleave", () => el.style.transform = "scale(1)");
    el.dataset.bound = "1";
  });
}

function initSlider() {
  const mainImg = document.getElementById("mainImage");
  const thumbs = document.querySelectorAll(".thumb");
  const prev = document.querySelector(".prev");
  const next = document.querySelector(".next");
  if (!mainImg || thumbs.length === 0 || !prev || !next) return;

  let idx = 0;
  const imgs = Array.from(thumbs).map(t => t.dataset.full || t.src);
  const update = i => {
    mainImg.src = imgs[i];
    thumbs.forEach((t, j) => t.classList.toggle("active", i === j));
  };
  prev.addEventListener("click", () => {
    idx = (idx - 1 + imgs.length) % imgs.length;
    update(idx);
  });
  next.addEventListener("click", () => {
    idx = (idx + 1) % imgs.length;
    update(idx);
  });
  thumbs.forEach((t, i) => t.addEventListener("click", () => {
    idx = i;
    update(idx);
  }));
  update(idx);

  const modal = document.getElementById("imageModal");
  const zoom = document.getElementById("imgZoom");
  const close = document.querySelector(".close-modal");
  if (modal && zoom && close) {
    mainImg.style.cursor = "zoom-in";
    mainImg.addEventListener("click", () => {
      modal.classList.add("open");
      zoom.src = mainImg.src;
    });
    close.addEventListener("click", () => {
      modal.classList.remove("open");
      zoom.src = "";
    });
    modal.addEventListener("click", e => {
      if (e.target === modal) {
        modal.classList.remove("open");
        zoom.src = "";
      }
    });
  }
}

function initFullscreenVideo() {
  document.addEventListener("fullscreenchange", () => {
    const fsEl = document.fullscreenElement;
    if (fsEl && fsEl.tagName === 'VIDEO') {
      fsEl.classList.add("fullscreen-contain");
    } else {
      document.querySelectorAll("video.fullscreen-contain").forEach(v => v.classList.remove("fullscreen-contain"));
    }
  });
}

function initFormHandler() {
  const form = document.querySelector("form#contactForm");
  if (!form || form.dataset.bound) return;
  form.dataset.bound = "1";

  const url = "http://localhost:8001/api/contact";
  form.setAttribute("action", url);

  form.addEventListener("submit", async e => {
    e.preventDefault();
    const nom = form.querySelector("input[name='nom']").value.trim();
    const email = form.querySelector("input[name='email']").value.trim();
    const telephone = form.querySelector("input[name='telephone']").value.trim();
    const sujet = form.querySelector("input[name='sujet']").value.trim();
    const message = form.querySelector("textarea[name='message']").value.trim();
    const errorBox = document.getElementById("formError");

    const setErr = (msg) => { if (errorBox) errorBox.textContent = msg; };

    if (!nom || !email || !sujet || !message) {
      return setErr("Veuillez remplir tous les champs obligatoires.");
    }
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
      return setErr("Adresse e-mail invalide.");
    }
    if (message.length < 10) {
      return setErr("Le message doit contenir au moins 10 caractères.");
    }

    try {
      const resp = await fetch(url, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ nom, email, telephone, sujet, message })
      });

      const ct = resp.headers.get("content-type") || "";
      const isJson = ct.includes("application/json");
      const res = isJson ? await resp.json() : { success: resp.ok };

      if (res.success) {
        // Redirection absolue vers la racine (évite /projets/merci.html)
        window.location.assign("/merci.html");
      } else {
        setErr(res.error || "Une erreur est survenue.");
      }
    } catch (err) {
      setErr("Erreur d'envoi. Veuillez réessayer.");
      console.error(err);
    }
  });
}
