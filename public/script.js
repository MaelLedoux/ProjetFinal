document.addEventListener("DOMContentLoaded", function () {

    // Animations sur les cards portfolio
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

    // Barre de recherche dans le menu
    const searchToggle = document.getElementById("searchToggle");
    const searchForm = document.getElementById("searchForm");
    const searchInput = document.getElementById("searchInput");

    if (searchToggle && searchForm && searchInput) {
        // Ouvre/ferme la barre de recherche
        searchToggle.addEventListener("click", function () {
            searchForm.classList.toggle("active");
            if (searchForm.classList.contains("active")) {
                searchInput.focus();
            } else {
                searchInput.value = "";
                // Réaffiche tous les projets quand on referme la barre
                document.querySelectorAll(".project").forEach(project => {
                    project.style.display = "block";
                });
            }
        });

        // Recherche en direct
        function filtrerProjets() {
            const searchQuery = searchInput.value.toLowerCase().trim();
            document.querySelectorAll(".project").forEach(project => {
                const projectText = project.textContent.toLowerCase();
                project.style.display = projectText.includes(searchQuery) ? "block" : "none";
            });
        }

        searchInput.addEventListener("input", filtrerProjets);

        // Recherche avec la touche Entrée (sans alert)
        searchInput.addEventListener("keydown", function (event) {
            if (event.key === "Enter") {
                event.preventDefault(); // Empêche la soumission du form
                filtrerProjets();
                // Tu peux aussi fermer la barre ici si tu veux :
                // searchForm.classList.remove("active");
            }
        });

        // Empêche la soumission classique du form
        searchForm.addEventListener("submit", function (event) {
            event.preventDefault();
            filtrerProjets();
        });
    }

    // Sticky nav
    const nav = document.querySelector("header nav");
    window.addEventListener("scroll", function () {
        if (window.scrollY > 200) {
            nav.classList.add("sticky-nav");
        } else {
            nav.classList.remove("sticky-nav");
        }
    });

    // === SLIDER / GALLERY LOGIC ===

    // On ne lance le slider que si la page a un slider (projets, dessins, peintures)
    const mainImage = document.getElementById('mainImage');
    const thumbs = document.querySelectorAll('.thumb');
    const prevBtn = document.querySelector('.prev');
    const nextBtn = document.querySelector('.next');
    if (mainImage && thumbs.length && prevBtn && nextBtn) {
        // Détecte la page pour choisir les images à afficher
        const currentPage = window.location.pathname.split("/").pop();
        let imageList = [];
        switch (currentPage) {
            case 'projet1.html':
                imageList = [
                    '../images/projet1-1.jpg',
                    '../images/projet1-2.jpg',
                    '../images/projet1-3.jpg',
                    '../images/projet1-4.jpg',
                    '../images/projet1-5.jpg',
                    '../images/projet1-6.jpg',
                    '../images/projet1-7.jpg'
                ];
                break;
            case 'projet2.html':
                imageList = [
                    '../images/projet2-1.jpg',
                    '../images/projet2-2.jpg',
                    '../images/projet2-3.jpg'
                ];
                break;
            case 'projet3.html':
                imageList = [
                    '../images/projet3-1.jpg',
                    '../images/projet3-2.jpg',
                    '../images/projet3-3.jpg',
                    '../images/projet3-4.jpg',
                    '../images/projet3-5.jpg',
                    '../images/projet3-6.jpg'
                ];
                break;
            case 'projet4.html':
                imageList = [
                    '../images/projet4-1.jpg',
                    '../images/projet4-2.jpg',
                    '../images/projet4-3.jpg',
                    '../images/projet4-4.jpg',
                    '../images/projet4-5.jpg',
                    '../images/projet4-6.jpg'
                ];
                break;
            case 'projet5.html':
                imageList = [
                    '../images/projet5-1.jpg',
                    '../images/projet5-2.jpg',
                    '../images/projet5-3.jpg',
                    '../images/projet5-4.jpg',
                    '../images/projet5-5.jpg',
                    '../images/projet5-6.jpg',
                    '../images/projet5-7.jpg'
                ];
                break;
            case 'projet6.html':
                imageList = [
                    '../images/projet6-1.jpg',
                    '../images/projet6-2.jpg',
                    '../images/projet6-3.jpg',
                    '../images/projet6-4.jpg',
                    '../images/projet6-5.jpg',
                    '../images/projet6-6.jpg',
                    '../images/projet6-7.jpg',
                    '../images/projet6-8.jpg'
                ];
                break;
            default:
                imageList = ['../images/default.jpg'];
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

        // Initialisation
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
});

// Gestion du plein écran pour les vidéos

const video = document.querySelector('.video-wrapper.vertical video');

// Fonctions pour adapter l'affichage en plein écran
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