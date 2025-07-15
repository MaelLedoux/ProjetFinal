/* script.js - refactoré, sans basePath pour les API, URL toujours en localhost:8001 */

document.addEventListener("DOMContentLoaded", () => {
  initPage(location.pathname);
  enableSpaNavigation();
  window.addEventListener("popstate", () => initPage(location.pathname));
});

/**
 * Initialise la page en mode SPA :
 * - Charge le <main> via fetch
 * - Met à jour le <title>
 * - Charge le header et le footer
 * - Relance les scripts spécifiques
 */
function initPage(pathname) {
  const cleanPath = new URL(pathname, location.origin).pathname;
  const isInProjets = cleanPath.includes("/projets/");
  const basePath = isInProjets ? "../" : "";
  const pageName = cleanPath.split("/").pop() || "index.html";

  const pageMeta = {
    "index.html":             { titre: "MH Interior - Accueil",            bannerClass: "" },
    "about.html":             { titre: "MH Interior - À propos",           bannerClass: "no-banner" },
    "contact.html":           { titre: "MH Interior - Contact",            bannerClass: "" },
    "portfolio.html":         { titre: "MH Interior - Portfolio",          bannerClass: "" },
    "services.html":          { titre: "MH Interior - Services",           bannerClass: "" },
    "merci.html":             { titre: "MH Interior - Merci !",            bannerClass: "no-banner" },
    "projet1.html":           { titre: "MH Interior - Galerie",            bannerClass: "" },
    "projet2.html":           { titre: "MH Interior - Galerie",            bannerClass: "" },
    "projet3.html":           { titre: "MH Interior - Galerie",            bannerClass: "" },
    "projet4.html":           { titre: "MH Interior - Galerie",            bannerClass: "" },
    "projet5.html":           { titre: "MH Interior - Galerie",            bannerClass: "" },
    "projet6.html":           { titre: "MH Interior - Galerie",            bannerClass: "" },
    "archi.html":             { titre: "MH Interior - Archi Intérieur",    bannerClass: "" },
    "deco.html":              { titre: "MH Interior - Décoration",         bannerClass: "" },
    "dessins-peintures.html": { titre: "MH Interior - Dessins & peintures",bannerClass: "" },
    "maquettes.html":         { titre: "MH Interior - Maquettes",          bannerClass: "" },
    "pros.html":              { titre: "MH Interior - Projets pros",       bannerClass: "" }
  };

  const meta = pageMeta[pageName] || { titre: "MH Interior", bannerClass: "" };
  document.title = meta.titre;

  fetch(cleanPath)
    .then(res => res.text())
    .then(html => {
      const parser = new DOMParser();
      const doc = parser.parseFromString(html, "text/html");
      const newMain = doc.querySelector("main");
      const currentMain = document.querySelector("main");
      if (currentMain && newMain) currentMain.replaceWith(newMain);

      loadHeader(basePath, meta);
      loadFooter(basePath);
      if (pageName === "index.html") injectRandomProjects();
      reinitAll();
    })
    .catch(err => console.error("Erreur initPage :", err));
}

/** Charge et injecte le header depuis components/header.html */
function loadHeader(basePath, meta) {
  fetch(basePath + "components/header.html")
    .then(res => res.text())
    .then(data => {
      const processed = data
        .replace(/{{base}}/g, basePath)
        .replace(/{{titre}}/g, meta.titre)
        .replace(/{{bannerClass}}/g, meta.bannerClass);
      const headerPlaceholder = document.getElementById("header-placeholder");
      if (headerPlaceholder) headerPlaceholder.innerHTML = processed;
      attachSearchEvents();
      makeNavSticky();
    })
    .catch(err => console.error("Erreur loadHeader :", err));
}

/** Charge et injecte le footer depuis components/footer.html */
function loadFooter(basePath) {
  fetch(basePath + "components/footer.html")
    .then(res => res.text())
    .then(data => {
      const processed = data.replace(/{{base}}/g, basePath);
      const footerPlaceholder = document.getElementById("footer-placeholder");
      if (footerPlaceholder) footerPlaceholder.innerHTML = processed;
      const yearSpan = document.getElementById("year");
      if (yearSpan) yearSpan.textContent = new Date().getFullYear();
    })
    .catch(err => console.error("Erreur loadFooter :", err));
}

/** Rend la nav sticky au scroll */
function makeNavSticky() {
  const nav = document.querySelector("header nav");
  if (!nav) return;
  window.addEventListener("scroll", () => {
    nav.classList.toggle("sticky-nav", window.scrollY > 200);
  });
}

/** Active la navigation en SPA pour tous les <a data-nav> */
function enableSpaNavigation() {
  document.addEventListener("click", e => {
    const link = e.target.closest("a[data-nav]");
    if (!link || link.href.includes("#") || link.origin !== location.origin) return;
    e.preventDefault();
    const to = new URL(link.getAttribute("href"), location.href).pathname;
    history.pushState({}, "", to);
    initPage(to);
  });
}

/** Réinitialise tous les comportements JS après chaque chargement */
function reinitAll() {
  attachSearchEvents();
  attachHoverAnimations();
  initSlider();
  initFullscreenVideo();
  initFormHandler();
  loadPageData();
}

/** Affiche 3 projets aléatoires sur la page d’accueil */
function injectRandomProjects() {
  const projets = [
    { url:"projets/projet1.html", titre:"Appartement chaleureux - Montbeton (82)", image:"images/projet1-1.jpg" },
    { url:"projets/projet2.html", titre:"Kitchenette - Montauban (82)",              image:"images/projet2-1.jpg" },
    { url:"projets/projet3.html", titre:"Pièce contemporaine - Montauban (82)",      image:"images/projet3-1.jpg" },
    { url:"projets/projet4.html", titre:"Salle séminaire - Montauban (82)",         image:"images/projet4-1.jpg" },
    { url:"projets/projet5.html", titre:"Ancienne cuisine - Montricoux (82)",       image:"images/projet5-1.jpg" },
    { url:"projets/projet6.html", titre:"Mezzanine - Nérac (47)",                  image:"images/projet6-1.jpg" }
  ];
  const galerie = document.querySelector(".gallery");
  if (!galerie) return;
  galerie.innerHTML = "";
  projets.sort(() => 0.5 - Math.random()).slice(0,3).forEach(p => {
    const a = document.createElement("a");
    a.href = p.url; a.className = "project";
    a.style.backgroundImage = `url(${p.image})`;
    const span = document.createElement("span");
    span.textContent = p.titre;
    a.appendChild(span);
    galerie.appendChild(a);
  });
}

/** Charge dynamiquement données spécifiques selon page */
function loadPageData() {
  const file = location.pathname.split("/").pop();

  if (file === "dessins-peintures.html") {
    fetchDataAndInject(
      "http://localhost:8001/api/realisations/dessin",
      ".gallery-dessins",
      injectDessinsPeintures
    );
  }
  else if (file === "maquettes.html") {
    fetchDataAndInject(
      "http://localhost:8001/api/realisations/maquette",
      ".gallery-maquettes",
      injectMaquettes
    );
  }
  else if (file === "services.html") {
    fetchDataAndInject(
      "http://localhost:8001/api/services",
      ".services-wrapper",
      injectServices
    );
  }
}

/** Helper fetch + injection */
function fetchDataAndInject(url, selector, injectFn) {
  const container = document.querySelector(selector);
  if (!container) return;
  fetch(url)
    .then(res => res.json())
    .then(data => injectFn(data))
    .catch(err => {
      console.error(`Erreur ${selector}:`, err);
      container.innerHTML = "<p>Erreur lors du chargement.</p>";
    });
}

/** Injecte les dessins & peintures */
function injectDessinsPeintures(data) {
  const cont = document.querySelector(".gallery-dessins");
  cont.innerHTML = "";
  data.forEach(item => {
    const div = document.createElement("div");
    div.className = "dessin-peinture-project";
    div.innerHTML = `
      <img src="${item.image}" alt="${item.description||''}">
      <p>${item.description||''}</p>
    `;
    cont.appendChild(div);
  });
}

/** Injecte les maquettes */
function injectMaquettes(data) {
  const cont = document.querySelector(".gallery-maquettes");
  cont.innerHTML = "";
  data.forEach(item => {
    const div = document.createElement("div");
    div.className = "maquette-project"; // ✅ Ajout correct de la classe
    div.innerHTML = `
      <img src="${item.image}" alt="${item.description || ''}">
      <p>${item.description || ''}</p>
    `;
    cont.appendChild(div);
  });
}

/** Injecte services et vidéos */
function injectServices(data) {
  const servicesDiv = document.querySelector(".services-wrapper");
  const videoSection = document.querySelector("#services-video");
  servicesDiv.innerHTML = "";
  videoSection.querySelector(".video-wrapper.vertical").innerHTML   = "";
  videoSection.querySelector(".video-wrapper.horizontal").innerHTML = "";

  (data.services||[]).forEach(s => {
    const d = document.createElement("div");
    d.className = "service";
    d.innerHTML = `<span class="icon">${s.icone}</span><h3>${s.titre}</h3><p>${s.description}</p>`;
    servicesDiv.appendChild(d);
  });
  (data.videos||[]).forEach((v,i) => {
    if (!v.video) return;
    const sel = i===0 ? ".video-wrapper.vertical" : ".video-wrapper.horizontal";
    const html = i===0
      ? `<video controls autoplay muted loop playsinline><source src="${v.video}" type="video/mp4">Votre navigateur ne supporte pas la vidéo.</video>`
      : `<iframe src="${v.video}" title="${v.titre}" allowfullscreen allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"></iframe>`;
    videoSection.querySelector(sel).innerHTML = html;
  });
}

/** Filtre la recherche dans les projets */
function attachSearchEvents() {
  const toggle = document.getElementById("searchToggle");
  const form   = document.getElementById("searchForm");
  const input  = document.getElementById("searchInput");
  if (!toggle || !form || !input) return;

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
  form.addEventListener("submit", e => { e.preventDefault(); filter(); });
}

/** Hover animations sur projets et catégories */
function attachHoverAnimations() {
  document.querySelectorAll(".project, .category-card").forEach(el => {
    el.addEventListener("mouseenter", () => el.style.transform = "scale(1.05)");
    el.addEventListener("mouseleave", () => el.style.transform = "scale(1)");
  });
}

/** Slider pour galerie détaillée */
function initSlider() {
  const mainImg = document.getElementById("mainImage");
  const thumbs  = document.querySelectorAll(".thumb");
  const prev    = document.querySelector(".prev");
  const next    = document.querySelector(".next");
  if (!mainImg || thumbs.length===0 || !prev || !next) return;

  let idx = 0;
  const imgs = Array.from(thumbs).map(t => t.dataset.full || t.src);
  const update = i => {
    mainImg.src = imgs[i];
    thumbs.forEach((t,j) => t.classList.toggle("active", i===j));
  };
  prev.addEventListener("click", () => { idx=(idx-1+imgs.length)%imgs.length; update(idx); });
  next.addEventListener("click", () => { idx=(idx+1)%imgs.length; update(idx); });
  thumbs.forEach((t,i) => t.addEventListener("click", () => { idx=i; update(idx); }));
  update(idx);

  // Zoom modal
  const modal = document.getElementById("imageModal");
  const zoom  = document.getElementById("imgZoom");
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

/** Gestion du fullscreen pour la vidéo verticale */
function initFullscreenVideo() {
  document.addEventListener("fullscreenchange", () => {
    const fsEl = document.fullscreenElement;
    if (fsEl && fsEl.tagName === 'VIDEO') {
      fsEl.classList.add("fullscreen-contain");
    } else {
      document.querySelectorAll("video.fullscreen-contain").forEach(v => {
        v.classList.remove("fullscreen-contain");
      });
    }
  });
}

/** Validation et envoi du formulaire de contact */
function initFormHandler() {
  const form = document.querySelector("form#contactForm");
  if (!form) return;
  const url = "http://localhost:8001/api/contact";

  form.setAttribute("action", url);
  form.addEventListener("submit", async e => {
    e.preventDefault();
    const nom       = form.querySelector("input[name='nom']").value.trim();
    const email     = form.querySelector("input[name='email']").value.trim();
    const telephone = form.querySelector("input[name='telephone']").value.trim();
    const sujet     = form.querySelector("input[name='sujet']").value.trim();
    const message   = form.querySelector("textarea[name='message']").value.trim();
    const errorBox  = document.getElementById("formError");

    if (!nom || !email || !sujet || !message) {
      if (errorBox) errorBox.textContent = "Veuillez remplir tous les champs obligatoires.";
      return;
    }
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
      if (errorBox) errorBox.textContent = "Adresse e-mail invalide.";
      return;
    }
    if (message.length < 10) {
      if (errorBox) errorBox.textContent = "Le message doit contenir au moins 10 caractères.";
      return;
    }

    try {
      const resp = await fetch(url, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ nom, email, telephone, sujet, message })
      });
      const res = await resp.json();
      if (res.success) window.location.href = "merci.html";
      else if (errorBox) errorBox.textContent = res.error || "Une erreur est survenue.";
    } catch (err) {
      if (errorBox) errorBox.textContent = "Erreur d'envoi. Veuillez réessayer.";
      console.error(err);
    }
  });
}
