document.addEventListener("DOMContentLoaded", function () {

    const projects = document.querySelectorAll(".project");
    projects.forEach(project => {
        project.addEventListener("mouseenter", () => {
            project.style.transform = "scale(1.05)";
            project.style.transition = "0.3s ease-in-out";
        });
        project.addEventListener("mouseleave", () => {
            project.style.transform = "scale(1)";
        });
    });

    const drawings = document.querySelectorAll(".drawing");
    drawings.forEach(drawing => {
        drawing.addEventListener("mouseenter", () => {
            drawing.style.transform = "scale(1.05)";
            drawing.style.transition = "0.3s ease-in-out";
        });
        drawing.addEventListener("mouseleave", () => {
            drawing.style.transform = "scale(1)";
        });
    });

    const paintings = document.querySelectorAll(".painting");
    paintings.forEach(painting => {
        painting.addEventListener("mouseenter", () => {
            painting.style.transform = "scale(1.05)";
            painting.style.transition = "0.3s ease-in-out";
        });
        painting.addEventListener("mouseleave", () => {
            painting.style.transform = "scale(1)";
        });
    });

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
            }
        });

        searchInput.addEventListener("input", function () {
            const searchQuery = searchInput.value.toLowerCase().trim();
            const projects = document.querySelectorAll(".project");

            projects.forEach(project => {
                const projectText = project.textContent.toLowerCase();
                if (projectText.includes(searchQuery)) {
                    project.style.display = "block";
                } else {
                    project.style.display = "none";
                }
            });
        });

        searchInput.addEventListener("keypress", function (event) {
            if (event.key === "Enter") {
                const searchQuery = searchInput.value.toLowerCase().trim();
                if (searchQuery) {
                    alert(`Recherche pour : ${searchQuery}`);
                }
            }
        });
    }

    const nav = document.querySelector("header nav");
    const header = document.querySelector("header");

    window.addEventListener("scroll", function () {
        if (window.scrollY > 200) {
            nav.classList.add("sticky-nav");
        } else {
            nav.classList.remove("sticky-nav");
        }
    });
});

// Détection du fichier HTML courant
const currentPage = window.location.pathname.split("/").pop();

// Liste des images par projet
let imageList = [];

switch (currentPage) {
    case 'projet1.html':
        imageList = [
            '/public/images/projet1-1.jpg',
            '/public/images/projet1-2.jpg',
            '/public/images/projet1-3.jpg',
            '/public/images/projet1-4.jpg'
        ];
        break;
    case 'projet2.html':
        imageList = [
            '/public/images/projet2-1.jpg',
            '/public/images/projet2-2.jpg',
            '/public/images/projet2-3.jpg',
            '/public/images/projet2-4.jpg'
        ];
        break;
    case 'projet3.html':
        imageList = [
            '/public/images/projet3-1.jpg',
            '/public/images/projet3-2.jpg',
            '/public/images/projet3-3.jpg',
            '/public/images/projet3-4.jpg'
        ];
        break;
    case 'dessin1.html':
        imageList = [
            '/public/images/dessin1-1.jpg',
            '/public/images/dessin1-2.jpg',
            '/public/images/dessin1-3.jpg',
            '/public/images/dessin1-4.jpg'
        ];
        break;
    case 'dessin2.html':
        imageList = [
            '/public/images/dessin2-1.jpg',
            '/public/images/dessin2-2.jpg',
            '/public/images/dessin2-3.jpg',
            '/public/images/dessin2-4.jpg'
        ];
        break;
    case 'dessin3.html':
        imageList = [
            '/public/images/dessin3-1.jpg',
            '/public/images/dessin3-2.jpg',
            '/public/images/dessin3-3.jpg',
            '/public/images/dessin3-4.jpg'
        ];
        break;
    case 'peinture1.html':
        imageList = [
            '/public/images/peinture1-1.jpg',
            '/public/images/peinture1-2.jpg',
            '/public/images/peinture1-3.jpg',
            '/public/images/peinture1-4.jpg'
        ];
        break;
    case 'peinture2.html':
        imageList = [
            '/public/images/peinture2-1.jpg',
            '/public/images/peinture2-2.jpg',
            '/public/images/peinture2-3.jpg',
            '/public/images/peinture2-4.jpg'
        ];
        break;
    case 'peinture3.html':
        imageList = [
            '/public/images/peinture3-1.jpg',
            '/public/images/peinture3-2.jpg',
            '/public/images/peinture3-3.jpg',
            '/public/images/peinture3-4.jpg'
        ];
        break;
    default:
        imageList = ['/public/images/default.jpg'];
}

// Initialisation des variables
let currentIndex = 0;
const mainImage = document.getElementById('mainImage');
const thumbs = document.querySelectorAll('.thumb');
const prevBtn = document.querySelector('.prev');
const nextBtn = document.querySelector('.next');

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