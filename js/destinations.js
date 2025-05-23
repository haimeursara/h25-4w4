document.addEventListener("DOMContentLoaded", () => {
  const pays = [
    "France", "États-Unis", "Canada", "Argentine", "Chili",
    "Belgique", "Maroc", "Mexique", "Japon", "Italie",
    "Islande", "Chine", "Grèce", "Suisse"
  ];

  const boutonContainer = document.querySelector(".pays__boutons");
  const resultatContainer = document.querySelector(".pays__resultats");

  pays.forEach(nom => {
    const bouton = document.createElement("button");
    bouton.textContent = nom;
    bouton.classList.add("bouton-categorie");
    bouton.dataset.nom = nom;

    bouton.addEventListener("click", e => {
      e.preventDefault();
      document.querySelectorAll(".bouton-categorie").forEach(b => b.classList.remove("active"));
      bouton.classList.add("active");
      chargerDestinations(nom);
    });

    boutonContainer.appendChild(bouton);
  });

  function chargerDestinations(nomPays) {
    resultatContainer.innerHTML = "<p>Chargement...</p>";

    fetch(`/wp-json/wp/v2/posts?search=${encodeURIComponent(nomPays)}&_embed`)
      .then(response => {
        if (!response.ok) throw new Error("API error");
        return response.json();
      })
      .then(data => {
        if (!data.length) {
          resultatContainer.innerHTML = "<p>Aucune destination trouvée.</p>";
          return;
        }

        resultatContainer.innerHTML = "";

        data.forEach(article => {
          const titre = article.title.rendered;
          const lien = article.link;
          const extrait = article.excerpt.rendered;
          const image = article._embedded?.["wp:featuredmedia"]?.[0]?.source_url || "/wp-content/themes/TONTHEME/images/hero.jpg";

          const bloc = document.createElement("article");
          bloc.className = "accordeon";

          const header = document.createElement("div");
          header.className = "accordeon__header";

          const bouton = document.createElement("button");
          bouton.className = "accordeon__bouton";
          bouton.textContent = titre;

          const contenu = document.createElement("div");
          contenu.className = "accordeon__contenu";
          contenu.style.maxHeight = null;

          const img = document.createElement("img");
          img.src = image;
          img.alt = titre;

          const texte = document.createElement("div");
          texte.className = "accordeon__texte";
          texte.innerHTML = extrait;

          const lienPlus = document.createElement("a");
          lienPlus.href = lien;
          lienPlus.textContent = "Voir plus";
          lienPlus.className = "accordeon__lien";

          contenu.appendChild(img);
          contenu.appendChild(texte);
          contenu.appendChild(lienPlus);

          header.appendChild(bouton);
          bloc.appendChild(header);
          bloc.appendChild(contenu);
          resultatContainer.appendChild(bloc);

          bouton.addEventListener("click", () => {
            bouton.classList.toggle("active");
            contenu.style.maxHeight = contenu.style.maxHeight ? null : contenu.scrollHeight + "px";
          });
        });
      })
      .catch(error => {
        console.error("Erreur API :", error);
        resultatContainer.innerHTML = "<p>Erreur lors du chargement des destinations.</p>";
      });
  }

  // Chargement initial de la France
  chargerDestinations("France");
});

document.querySelectorAll(".bouton-categorie").forEach(btn => {
  btn.classList.remove("active");
});
bouton.classList.add("active");

