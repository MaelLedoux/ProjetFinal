document.addEventListener("DOMContentLoaded", function () {
    // Effets de zoom sur les projets
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

    // Barre de recherche dynamique
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

    // Appliquer la classe sticky-nav uniquement au <nav>
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
