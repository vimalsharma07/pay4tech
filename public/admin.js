(() => {
  const toggle = document.querySelector('[data-admin-toggle]');
  const sidebar = document.querySelector('[data-admin-sidebar]');
  toggle?.addEventListener('click', () => {
    sidebar?.classList.toggle('is-open');
  });
})();

