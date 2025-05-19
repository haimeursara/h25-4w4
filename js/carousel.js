(function () {
    const radios = document.querySelectorAll(".hero__radio__input");
    const slides = document.querySelectorAll(".hero__slide");

    let index = 0;

    function activate(index) {
        radios.forEach((r, i) => r.checked = i === index);
        slides.forEach((slide, i) => {
            slide.classList.toggle("active", i === index);
        });
    }

    activate(index);

    setInterval(() => {
        index = (index + 1) % slides.length;
        activate(index);
    }, 5000);
})();
