(() => {
  const app = {
    initialize () {
      this.cacheElements();
      this.registerEventListeners();
    },
    cacheElements () {
      this.btnToTopElement = document.querySelector('.btn-to-top');
      this.$nav = document.querySelector('.nav__list');
      this.$burger = document.querySelector('.burger');
    },
    registerEventListeners () {
      // Burger icon
      this.$burger.addEventListener('click', () => {

        // toggle btn
        this.$nav.classList.toggle('open');

        // toggle icon
        this.$burger.classList.toggle('toggle');
      });
      
      // Back to top
       if (this.btnToTopElement !== null) {
        this.btnToTopElement.addEventListener('click', (ev) => {
          window.scrollTo({top: 0, behavior: 'smooth'});
        });
      }
    },
  };
  app.initialize();
})();
