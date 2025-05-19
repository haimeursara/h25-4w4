(function () {
    const radios = document.querySelectorAll(".hero__radio__input");
    const slides = document.querySelectorAll(".hero__slide");
    const contenu = document.querySelector(".hero__contenu");

    let index = 0;

    function activate(index) {
        radios.forEach((r, i) => r.checked = i === index);
        slides.forEach((slide, i) => {
            slide.classList.toggle("active", i === index);
        });

        // Animation du contenu
        if (contenu) {
            contenu.classList.remove("anim-in");
            void contenu.offsetWidth; // Force repaint
            contenu.classList.add("anim-in");
        }
    }

    activate(index);

    setInterval(() => {
        index = (index + 1) % slides.length;
        activate(index);
    }, 5000);
})();
