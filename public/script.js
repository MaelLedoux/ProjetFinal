document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("form");
    form.addEventListener("submit", function(event) {
        event.preventDefault();
        alert("Votre message a été envoyé avec succès !");
        form.reset();
    });

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
});

document.addEventListener("DOMContentLoaded", function() {
    const searchToggle = document.getElementById("searchToggle");
    const header = document.querySelector("header");
    const searchInput = document.getElementById("searchInput");

    // Ajouter un événement de clic pour afficher/masquer le champ de recherche
    searchToggle.addEventListener("click", function() {
        header.classList.toggle("search-active"); // Ajoute une classe pour activer l'état de recherche
        searchInput.style.display = "block"; // Afficher le champ de recherche
        searchInput.focus(); // Focalise sur le champ de recherche
    });

    // Ajouter un événement pour écouter quand l'utilisateur tape dans le champ de recherche
    searchInput.addEventListener("input", function() {
        const searchQuery = searchInput.value.toLowerCase().trim(); // Récupérer la valeur entrée et la rendre insensible à la casse
        if (searchQuery) {
            console.log(`Recherche : ${searchQuery}`);
        }
    });

    // Exécuter la recherche lorsque l'utilisateur appuie sur "Entrée"
    searchInput.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            const searchQuery = searchInput.value.toLowerCase().trim();
            if (searchQuery) {
                alert(`Recherche pour : ${searchQuery}`);
            }
        }
    });
});
