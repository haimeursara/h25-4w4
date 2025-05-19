document.addEventListener("DOMContentLoaded", () => {
  const boutons = document.querySelectorAll(".bouton-categorie");
  const zoneArticles = document.querySelector(".destination__list");

  // Fonction de chargement des articles d'une catégorie
  function chargerDestinations(catID) {
    zoneArticles.innerHTML = "<p>Chargement...</p>";

    fetch(`/wp-json/wp/v2/posts?categories=${catID}&_embed`)
      .then(response => response.json())
      .then(data => {
        if (data.length === 0) {
          zoneArticles.innerHTML = "<p>Aucune destination trouvée.</p>";
          return;
        }

        let html = "";

        data.forEach(article => {
          const titre = article.title.rendered;
          const lien = article.link;
          const excerpt = article.excerpt.rendered;
          const img = article._embedded?.["wp:featuredmedia"]?.[0]?.source_url || "/wp-content/themes/votre-theme/images/default.jpg";

          html += `
            <article class="accordeon">
              <div class="accordeon__header">
                <button class="accordeon__bouton">${titre}</button>
              </div>
              <div class="accordeon__contenu">
                <img src="${img}" alt="${titre}" />
                <div class="accordeon__texte">${excerpt}</div>
                <a href="${lien}" class="accordeon__lien">Voir plus</a>
              </div>
            </article>
          `;
        });

        zoneArticles.innerHTML = html;

        // Active accordéons
        document.querySelectorAll(".accordeon__bouton").forEach(button => {
          button.addEventListener("click", () => {
            const contenu = button.parentElement.nextElementSibling;
            button.classList.toggle("active");
            contenu.style.maxHeight = contenu.style.maxHeight ? null : contenu.scrollHeight + "px";
          });
        });
      })
      .catch(error => {
        zoneArticles.innerHTML = "<p>Erreur de chargement.</p>";
        console.error("Erreur API REST :", error);
      });
  }

  // Gérer les clics sur les boutons
  boutons.forEach(bouton => {
    bouton.addEventListener("click", e => {
      e.preventDefault();
      const catID = bouton.dataset.category_id;
      chargerDestinations(catID);
    });
  });
});
