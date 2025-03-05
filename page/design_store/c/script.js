document.addEventListener('DOMContentLoaded', function() {
  const searchBar = document.getElementById('search-bar');
  const categoryFilter = document.getElementById('category-filter');
  const statusFilter = document.getElementById('status-filter');
  const resetButton = document.getElementById('reset-button');
  const applyButton = document.getElementById('apply-button');
  const productsContainer = document.getElementById('products-container');

  function filterProducts() {
      const searchTerm = searchBar.value.toLowerCase();
      const selectedCategory = categoryFilter.value;
      const selectedStatus = statusFilter.value;

      const products = productsContainer.getElementsByClassName('products-row');
      for (let product of products) {
          const productName = product.querySelector('.product-cell.image span').textContent.toLowerCase();
          const productCategory = product.getAttribute('data-category');
          const productStatus = product.getAttribute('data-status');

          const matchesSearch = productName.includes(searchTerm);
          const matchesCategory = selectedCategory === 'all' || productCategory === selectedCategory;
          const matchesStatus = selectedStatus === 'all' || productStatus === selectedStatus;

          if (matchesSearch && matchesCategory && matchesStatus) {
              product.style.display = '';
          } else {
              product.style.display = 'none';
          }
      }
  }

  searchBar.addEventListener('input', filterProducts);
  applyButton.addEventListener('click', filterProducts);
  resetButton.addEventListener('click', function() {
      searchBar.value = '';
      categoryFilter.value = 'all';
      statusFilter.value = 'all';
      filterProducts();
  });

  filterProducts();
});

document.querySelector(".jsFilter").addEventListener("click", function () {
  document.querySelector(".filter-menu").classList.toggle("active");
});

document.querySelector(".grid").addEventListener("click", function () {
  document.querySelector(".list").classList.remove("active");
  document.querySelector(".grid").classList.add("active");
  document.querySelector(".products-area-wrapper").classList.add("gridView");
  document.querySelector(".products-area-wrapper").classList.remove("tableView");
});

document.querySelector(".list").addEventListener("click", function () {
  document.querySelector(".list").classList.add("active");
  document.querySelector(".grid").classList.remove("active");
  document.querySelector(".products-area-wrapper").classList.remove("gridView");
  document.querySelector(".products-area-wrapper").classList.add("tableView");
});

var modeSwitch = document.querySelector('.mode-switch');
modeSwitch.addEventListener('click', function () {
  document.documentElement.classList.toggle('light');
  modeSwitch.classList.toggle('active');
});
