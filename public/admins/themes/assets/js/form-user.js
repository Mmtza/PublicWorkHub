document.addEventListener('DOMContentLoaded', function () {
    // Activate tooltip
    var tooltips = document.querySelectorAll('[data-toggle="tooltip"]');
    tooltips.forEach(function (tooltip) {
      new bootstrap.Tooltip(tooltip);
    });
  
    // Select/Deselect checkboxes
    var selectAll = document.getElementById('selectAll');
    var checkboxes = document.querySelectorAll('table tbody input[type="checkbox"]');
  
    selectAll.addEventListener('click', function () {
      checkboxes.forEach(function (checkbox) {
        checkbox.checked = selectAll.checked;
      });
    });
  
    checkboxes.forEach(function (checkbox) {
      checkbox.addEventListener('click', function () {
        if (!this.checked) {
          selectAll.checked = false;
        }
      });
    });
  });
