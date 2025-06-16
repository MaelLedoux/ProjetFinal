// script.js

document.addEventListener("DOMContentLoaded", function () {
    // === VALIDATION FORMULAIRE + ENVOI FETCH ===
    const form = document.querySelector("form#contactForm");
    if (form) {
        form.addEventListener("submit", async (e) => {
            e.preventDefault();

            const nom = form.querySelector("input[name='nom']").value.trim();
            const email = form.querySelector("input[name='email']").value.trim();
            const telephone = form.querySelector("input[name='telephone']").value.trim();
            const sujet = form.querySelector("input[name='sujet']").value.trim();
            const message = form.querySelector("textarea[name='message']").value.trim();

            const errorBox = document.getElementById("formError");
            if (errorBox) errorBox.textContent = "";

            if (!nom || !email || !sujet || !message) {
                if (errorBox) errorBox.textContent = "Veuillez remplir tous les champs obligatoires.";
                return;
            }

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                if (errorBox) errorBox.textContent = "Adresse e-mail invalide.";
                return;
            }

            if (message.length < 10) {
                if (errorBox) errorBox.textContent = "Le message doit contenir au moins 10 caractères.";
                return;
            }

            const formData = new FormData(form);

            try {
                const response = await fetch("backend/send_contact.php", {
                    method: "POST",
                    body: formData
                });

                if (response.redirected) {
                    window.location.href = response.url;
                } else {
                    const text = await response.text();
                    if (errorBox) errorBox.textContent = text;
                }
            } catch (err) {
                if (errorBox) errorBox.textContent = "Erreur d'envoi. Veuillez réessayer.";
                console.error(err);
            }
        });
    }

    // === ANIMATIONS ===
    document.querySelectorAll(".project").forEach(el => {
        el.addEventListener("mouseenter", () => {
            el.style.transform = "scale(1.05)";
            el.style.transition = "0.3s ease-in-out";
        });
        el.addEventListener("mouseleave", () => {
            el.style.transform = "scale(1)";
        });
    });

    document.querySelectorAll(".category-card").forEach(card => {
        card.addEventListener("mouseenter", () => {
            card.style.transform = "scale(1.05)";
            card.style.transition = "0.3s ease-in-out";
        });
        card.addEventListener("mouseleave", () => {
            card.style.transform = "scale(1)";
        });
    });

    // === RECHERCHE ===
    const searchToggle = document.getElementById("searchToggle");
    const searchForm = document.getElementById("searchForm");
    const searchInput = document.getElementById("searchInput");

    if (searchToggle && searchForm && searchInput) {
        searchToggle.addEventListener("click", function () {
            searchForm.classList.toggle("active");
            if (searchForm.classList.contains("active")) {
                searchInput.focus();
            } else {
                searchInput.value = "";
                document.querySelectorAll(".project").forEach(project => {
                    project.style.display = "block";
                });
            }
        });

        function filtrerProjets() {
            const searchQuery = searchInput.value.toLowerCase().trim();
            document.querySelectorAll(".project").forEach(project => {
                const projectText = project.textContent.toLowerCase();
                project.style.display = projectText.includes(searchQuery) ? "block" : "none";
            });
        }

        searchInput.addEventListener("input", filtrerProjets);

        searchInput.addEventListener("keydown", function (event) {
            if (event.key === "Enter") {
                event.preventDefault();
                filtrerProjets();
            }
        });

        searchForm.addEventListener("submit", function (event) {
            event.preventDefault();
            filtrerProjets();
        });
    }

    // === STICKY NAV ===
    const nav = document.querySelector("header nav");
    window.addEventListener("scroll", function () {
        if (window.scrollY > 200) {
            nav.classList.add("sticky-nav");
        } else {
            nav.classList.remove("sticky-nav");
        }
    });

    // === SLIDER ===
    const mainImage = document.getElementById('mainImage');
    const thumbs = document.querySelectorAll('.thumb');
    const prevBtn = document.querySelector('.prev');
    const nextBtn = document.querySelector('.next');
    if (mainImage && thumbs.length && prevBtn && nextBtn) {
        const currentPage = window.location.pathname.split("/").pop();
        let imageList = [];
        switch (currentPage) {
            case 'projet1.html': imageList = ['../images/projet1-1.jpg','../images/projet1-2.jpg','../images/projet1-3.jpg','../images/projet1-4.jpg','../images/projet1-5.jpg','../images/projet1-6.jpg','../images/projet1-7.jpg']; break;
            case 'projet2.html': imageList = ['../images/projet2-1.jpg','../images/projet2-2.jpg','../images/projet2-3.jpg']; break;
            case 'projet3.html': imageList = ['../images/projet3-1.jpg','../images/projet3-2.jpg','../images/projet3-3.jpg','../images/projet3-4.jpg','../images/projet3-5.jpg','../images/projet3-6.jpg']; break;
            case 'projet4.html': imageList = ['../images/projet4-1.jpg','../images/projet4-2.jpg','../images/projet4-3.jpg','../images/projet4-4.jpg','../images/projet4-5.jpg','../images/projet4-6.jpg']; break;
            case 'projet5.html': imageList = ['../images/projet5-1.jpg','../images/projet5-2.jpg','../images/projet5-3.jpg','../images/projet5-4.jpg','../images/projet5-5.jpg','../images/projet5-6.jpg','../images/projet5-7.jpg']; break;
            case 'projet6.html': imageList = ['../images/projet6-1.jpg','../images/projet6-2.jpg','../images/projet6-3.jpg','../images/projet6-4.jpg','../images/projet6-5.jpg','../images/projet6-6.jpg','../images/projet6-7.jpg','../images/projet6-8.jpg']; break;
            default: imageList = ['../images/default.jpg'];
        }

        let currentIndex = 0;

        function updateImage(index) {
            mainImage.src = imageList[index];
            thumbs.forEach((thumb, i) => {
                thumb.classList.toggle('active', i === index);
            });
        }

        prevBtn.addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + imageList.length) % imageList.length;
            updateImage(currentIndex);
        });

        nextBtn.addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % imageList.length;
            updateImage(currentIndex);
        });

        thumbs.forEach((thumb, i) => {
            thumb.addEventListener('click', () => {
                currentIndex = i;
                updateImage(currentIndex);
            });
        });

        updateImage(currentIndex);

        const modal = document.getElementById('imageModal');
        const modalImg = document.getElementById('imgZoom');
        const closeModal = document.querySelector('.close-modal');

        if (mainImage && modal && modalImg && closeModal) {
            mainImage.style.cursor = 'zoom-in';
            mainImage.addEventListener('click', function () {
                modal.classList.add('open');
                modalImg.src = mainImage.src;
                modalImg.removeAttribute('width');
                modalImg.removeAttribute('height');
                modalImg.style.width = '';
                modalImg.style.height = '';
            });
            closeModal.addEventListener('click', function () {
                modal.classList.remove('open');
                modalImg.src = '';
            });
            modal.addEventListener('click', function (e) {
                if (e.target === modal) {
                    modal.classList.remove('open');
                    modalImg.src = '';
                }
            });
        }
    }

    // === PLEIN ÉCRAN VIDEO ===
    const video = document.querySelector('.video-wrapper.vertical video');
    function handleFullscreenChange() {
        if (document.fullscreenElement === video ||
            document.webkitFullscreenElement === video ||
            document.mozFullScreenElement === video ||
            document.msFullscreenElement === video) {
            video.style.objectFit = 'contain';
        } else {
            video.style.objectFit = 'cover';
        }
    }
    document.addEventListener('fullscreenchange', handleFullscreenChange);
    document.addEventListener('webkitfullscreenchange', handleFullscreenChange);
    document.addEventListener('mozfullscreenchange', handleFullscreenChange);
    document.addEventListener('MSFullscreenChange', handleFullscreenChange);
});
