document.addEventListener("DOMContentLoaded", () => {
  const pays = [
    { nom: "France", id: 16 },
    { nom: "États-Unis", id: 17 },
    { nom: "Canada", id: 18 },
    { nom: "Argentine", id: 19 },
    { nom: "Chili", id: 20 },
    { nom: "Belgique", id: 21 },
    { nom: "Maroc", id: 22 },
    { nom: "Mexique", id: 23 },
    { nom: "Japon", id: 24 },
    { nom: "Italie", id: 25 },
    { nom: "Islande", id: 26 },
    { nom: "Chine", id: 27 },
    { nom: "Grèce", id: 28 },
    { nom: "Suisse", id: 29 }
  ];

  const boutonContainer = document.querySelector(".pays__boutons");
  const resultatContainer = document.querySelector(".pays__resultats");

  pays.forEach(p => {
    const bouton = document.createElement("button");
    bouton.textContent = p.nom;
    bouton.classList.add("bouton-categorie");
    bouton.dataset.category_id = p.id;
    bouton.addEventListener("click", e => {
      e.preventDefault();
      chargerDestinations(p.id);
    });
    boutonContainer.appendChild(bouton);
  });

  function chargerDestinations(catID) {
    resultatContainer.innerHTML = "<p>Chargement...</p>";

    fetch(`/wp-json/wp/v2/posts?categories=${catID}&_embed`)
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
          const image = article._embedded?.["wp:featuredmedia"]?.[0]?.source_url || "/wp-content/themes/H25-4W4/images/hero.jpg";

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
        console.error("Erreur API REST :", error);
        resultatContainer.innerHTML = "<p>Erreur lors du chargement des destinations.</p>";
      });
  }

  // Charger la France (ID 16) par défaut
  chargerDestinations(16);
});
