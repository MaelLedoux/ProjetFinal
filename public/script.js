document.addEventListener("DOMContentLoaded", function () {
    // Gérer le formulaire de contact
    const form = document.querySelector("form");
    form.addEventListener("submit", function (event) {
        event.preventDefault();
        alert("Votre message a été envoyé avec succès !");
        form.reset();
    });

    // Effets sur les projets
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

    // Fonction de recherche
    const searchToggle = document.getElementById("searchToggle");
    const searchForm = document.getElementById("searchForm");
    const searchInput = document.getElementById("searchInput");
    
    searchToggle.addEventListener("click", function () {
        searchForm.classList.toggle("active");
        if (searchForm.classList.contains("active")) {
            searchInput.focus();
        } else {
            searchInput.value = "";
        }
    });
    

    // Réagir à la saisie et filtrer les projets
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


    // Réagir à "Entrée"
    searchInput.addEventListener("keypress", function (event) {
        if (event.key === "Enter") {
            const searchQuery = searchInput.value.toLowerCase().trim();
            if (searchQuery) {
                alert(`Recherche pour : ${searchQuery}`);
            }
        }
    });
});