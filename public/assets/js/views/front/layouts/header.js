(function () {
  const form = document.querySelector('form[role="search"]');
  if (form) {
    form.addEventListener('submit', function (e) {
      // Replace with your CI4 search route
      // e.preventDefault();
    });
  }
  const cart = document.querySelector('.cart-badge');
  if (cart) {
    cart.dataset.count = cart.textContent;
  }

  // Ahora catalogs es un array de objetos [{id, nombre}]
  const catalogs = window.catalogosData || [];

  function splitColumns(items, maxPerCol) {
    const cols = [];
    for (let i = 0; i < items.length; i += maxPerCol) {
      const slice = items.slice(i, i + maxPerCol);
      if (slice.length) cols.push(slice);
    }
    return cols;
  }

  const toggler = document.getElementById('catalog-toggler');
  const panel = document.getElementById('megaCatalogPanel');

  function openPanel() {
    const rect = toggler.getBoundingClientRect();
    panel.style.position = 'fixed';
    panel.style.top = (rect.bottom + window.pageYOffset) + 'px';
    panel.style.left = (rect.left + window.pageXOffset) + 'px';
    panel.classList.remove('d-none');
    toggler.setAttribute('aria-expanded', 'true');
  }

  function closePanel() {
    panel.classList.add('d-none');
  }

  if (toggler && panel) {
    const cols = splitColumns(catalogs, 8);

    const inner = document.createElement('div');
    inner.className = 'mega-panel';

    cols.forEach(col => {
      const colEl = document.createElement('div');
      colEl.className = 'mega-column';
      col.forEach(cat => {
        const a = document.createElement('a');
        a.href = window.baseUrl + 'catalogo/ver_catalogo/' + cat.id;
        a.textContent = cat.nombre;
        colEl.appendChild(a);
      });
      inner.appendChild(colEl);
    });

    panel.innerHTML = '';
    panel.appendChild(inner);

    const colWidth = 200;
    panel.style.width = (cols.length * colWidth) + 'px';

    toggler.addEventListener('click', function (e) {
      e.stopPropagation();
      if (panel.classList.contains('d-none')) openPanel(); else closePanel();
    });

    document.addEventListener('click', function (ev) {
      const t = ev.target;
      if (!panel.contains(t) && t !== toggler) {
        closePanel();
      }
    });

    document.addEventListener('keydown', function (ev) {
      if (ev.key === 'Escape') closePanel();
    });
  }
})();
