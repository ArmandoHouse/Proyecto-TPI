function formatDate(date) {
  const d = new Date(date);
  const day = String(d.getDate()).padStart(2, '0');
  const month = String(d.getMonth() + 1).padStart(2, '0');
  const year = d.getFullYear();
  const hours = String(d.getHours()).padStart(2, '0');
  const minutes = String(d.getMinutes()).padStart(2, '0');
  return `${day}/${month}/${year} ${hours}:${minutes}`;
}

// Función para formatear moneda
function formatCurrency(amount) {
  return new Intl.NumberFormat("es-AR", {
    style: "currency",
    currency: "ARS",
    minimumFractionDigits: 2,
  }).format(amount);
}

// Función para renderizar la tabla de productos (desktop)
function renderProductsTable(products) {
  const tableBody = document.getElementById("productsTableBody");
  if (!tableBody) return;

  tableBody.innerHTML = "";

  products.forEach((product) => {
    const subtotal = product.subtotal;
    const row = document.createElement("tr");

    row.innerHTML = `
            <td class="fw-medium">${escapeHtml(product.name)}</td>
            <td class="text-center text-muted">${product.quantity}</td>
            <td class="text-end text-muted">${formatCurrency(product.unitPrice)}</td>
            <td class="text-end fw-semibold">${formatCurrency(subtotal)}</td>
        `;

    tableBody.appendChild(row);
  });
}

// Función para renderizar las cards de productos (mobile)
function renderProductsMobile(products) {
  const mobileContainer = document.getElementById("productsMobile");
  if (!mobileContainer) return;

  mobileContainer.innerHTML = "";

  products.forEach((product) => {
    const subtotal = product.subtotal;
    const cardDiv = document.createElement("div");
    cardDiv.className = "card product-card-mobile mb-3";

    cardDiv.innerHTML = `
            <div class="card-body">
                <h6 class="card-title fw-semibold text-dark">${escapeHtml(product.name)}</h6>
                <div class="row text-center g-2">
                    <div class="col-4">
                        <small class="text-muted d-block">Cantidad</small>
                        <span class="fw-medium">${product.quantity}</span>
                    </div>
                    <div class="col-4">
                        <small class="text-muted d-block">Precio Unit.</small>
                        <span class="fw-medium">${formatCurrency(product.unitPrice)}</span>
                    </div>
                    <div class="col-4">
                        <small class="text-muted d-block">Subtotal</small>
                        <span class="fw-semibold text-primary">${formatCurrency(subtotal)}</span>
                    </div>
                </div>
            </div>
        `;

    mobileContainer.appendChild(cardDiv);
  });
}

// Función para actualizar los totales en la UI
function updateTotalsDisplay(totals) {
  const subtotalElement = document.getElementById("subtotalAmount");
  const taxElement = document.getElementById("taxAmount");
  const finalElement = document.getElementById("finalAmount");

  if (subtotalElement)
    subtotalElement.textContent = formatCurrency(totals.subtotal);
  if (taxElement) taxElement.textContent = formatCurrency(totals.tax);
  if (finalElement) finalElement.textContent = formatCurrency(totals.total);
}
// Función para actualizar información básica
function updateInvoiceInfo(pedidoData) {
  // Fecha de factura
  const dateElement = document.getElementById("invoiceDate");
  if (dateElement) {
    dateElement.textContent = formatDate(new Date(pedidoData.invoice.date));
  }

  // Número de factura
  const numberElement = document.getElementById("invoiceNumber");
  if (numberElement) {
    numberElement.textContent = pedidoData.invoice.number;
  }

  // Información del cliente
  const clientFields = [
    { id: "clientName", value: pedidoData.client.name },
    { id: "clientEmail", value: pedidoData.client.email },
    { id: "clientDni", value: pedidoData.client.dni },
    { id: "clientPhone", value: pedidoData.client.phone },
    { id: "clientAddress", value: pedidoData.client.address },
  ];

  clientFields.forEach((field) => {
    const element = document.getElementById(field.id);
    if (element) {
      element.textContent = field.value;
    }
  });
}

// Función para escapar HTML (seguridad)
function escapeHtml(text) {
  const map = {
    "&": "&amp;",
    "<": "&lt;",
    ">": "&gt;",
    '"': "&quot;",
    "'": "&#039;",
  };
  return text.replace(/[&<>"']/g, function (m) {
    return map[m];
  });
}


// Función para imprimir la factura
function printInvoice() {
  // Crear toast de Bootstrap para feedback
  showToast("Preparando impresión...", "info");

  // Ocultar elementos que no se deben imprimir
  const actionButtons = document.querySelector(".d-grid");
  const originalDisplay = actionButtons ? actionButtons.style.display : "";

  if (actionButtons) {
    actionButtons.style.display = "none";
  }

  // Imprimir
  setTimeout(() => {
    window.print();

    // Restaurar elementos después de imprimir
    if (actionButtons) {
      actionButtons.style.display = originalDisplay;
    }

    showToast("Documento enviado a impresión", "success");
  }, 100);
}

// Función para continuar comprando
function continueShopping() {
  // Mostrar modal de confirmación usando Bootstrap
  showConfirmModal(
    "Continuar Comprando",
    "¿Desea regresar a la tienda para continuar comprando?",
    function () {
      // En CodeIgniter, esto redirigiría a la página de la tienda
      showToast("Redirigiendo al inicio", "info");

      // Ejemplo de redirección después de 1 segundo
      setTimeout(() => {
        window.location.href = BASE_URL;
        console.log("Redirección a la tienda");
      }, 1000);
    },
  );
}

// Función para mostrar toast de Bootstrap
function showToast(message, type = "info") {
  // Crear el toast dinámicamente
  const toastContainer = getOrCreateToastContainer();

  const toastId = "toast-" + Date.now();
  const bgClass =
    type === "success"
      ? "bg-success"
      : type === "info"
        ? "bg-info"
        : "bg-warning";

  const toastHTML = `
        <div id="${toastId}" class="toast align-items-center text-white ${bgClass} border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    ${escapeHtml(message)}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    `;

  toastContainer.insertAdjacentHTML("beforeend", toastHTML);

  const toastElement = document.getElementById(toastId);
  const toast = new bootstrap.Toast(toastElement);
  toast.show();

  // Limpiar el toast después de que se oculte
  toastElement.addEventListener("hidden.bs.toast", () => {
    toastElement.remove();
  });
}

// Función para obtener o crear el contenedor de toasts
function getOrCreateToastContainer() {
  let container = document.querySelector(".toast-container");
  if (!container) {
    container = document.createElement("div");
    container.className = "toast-container position-fixed top-0 end-0 p-3";
    container.style.zIndex = "1055";
    document.body.appendChild(container);
  }
  return container;
}

// Función para mostrar modal de confirmación
function showConfirmModal(title, message, onConfirm) {
  // Crear modal dinámicamente
  const modalId = "confirmModal-" + Date.now();

  const modalHTML = `
        <div class="modal fade" id="${modalId}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">${escapeHtml(title)}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>${escapeHtml(message)}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" id="confirmBtn-${modalId}">Confirmar</button>
                    </div>
                </div>
            </div>
        </div>
    `;

  document.body.insertAdjacentHTML("beforeend", modalHTML);

  const modalElement = document.getElementById(modalId);
  const modal = new bootstrap.Modal(modalElement);

  // Event listener para el botón de confirmación
  document
    .getElementById(`confirmBtn-${modalId}`)
    .addEventListener("click", () => {
      modal.hide();
      if (onConfirm) onConfirm();
    });

  // Limpiar el modal después de que se oculte
  modalElement.addEventListener("hidden.bs.modal", () => {
    modalElement.remove();
  });

  modal.show();
}

// Función para añadir un nuevo producto
function addProduct(product) {
  pedidoData.products.push(product);
  renderInvoice();
  showToast("Producto agregado correctamente", "success");
}

// Función para remover un producto
function removeProduct(productId) {
  const productIndex = pedidoData.products.findIndex(
    (p) => p.id === productId,
  );
  if (productIndex > -1) {
    pedidoData.products.splice(productIndex, 1);
    renderInvoice();
    showToast("Producto eliminado", "info");
  }
}

// Función para actualizar la cantidad de un producto
function updateProductQuantity(productId, newQuantity) {
  const product = pedidoData.products.find((p) => p.id === productId);
  if (product && newQuantity > 0) {
    product.quantity = newQuantity;
    renderInvoice();
    showToast("Cantidad actualizada", "info");
  }
}

// Función principal para renderizar toda la factura
function renderInvoice() {
  updateInvoiceInfo(pedidoData);
  renderProductsTable(pedidoData.products);
  renderProductsMobile(pedidoData.products);

  // Usa los totales ya calculados desde PHP
  updateTotalsDisplay(pedidoData.totals);
}

// Event listeners
function initializeEventListeners() {
  // Botón de imprimir
  const printBtn = document.getElementById("printBtn");
  if (printBtn) {
    printBtn.addEventListener("click", printInvoice);
  }

  // Botón de continuar comprando
  const continueBtn = document.getElementById("continueBtn");
  if (continueBtn) {
    continueBtn.addEventListener("click", continueShopping);
  }

  // Listener para cambios de orientación (responsive)
  window.addEventListener("orientationchange", function () {
    setTimeout(renderInvoice, 100);
  });
}

// Función de inicialización
function initializeInvoice(customData = null) {
  // Si se pasan datos personalizados, usarlos
  if (customData) {
    Object.assign(pedidoData, customData);
  }

  // Renderizar la factura
  renderInvoice();

  // Inicializar event listeners
  initializeEventListeners();

  console.log("Factura con Bootstrap 5 inicializada correctamente");
}

// API pública para usar desde CodeIgniter
window.InvoiceApp = {
  init: initializeInvoice,
  addProduct: addProduct,
  removeProduct: removeProduct,
  updateQuantity: updateProductQuantity,
  print: printInvoice,
  continueShopping: continueShopping,
  formatCurrency: formatCurrency,
  showToast: showToast,
  showConfirmModal: showConfirmModal,
};

// Inicialización automática cuando el DOM esté listo
document.addEventListener("DOMContentLoaded", function () {
  if (typeof pedidoData !== "undefined") {
    InvoiceApp.init(pedidoData);
  }
});

