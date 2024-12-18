document.addEventListener('DOMContentLoaded', function() {
  // Get all sidebar items
  const sidebarItems = document.querySelectorAll('.sidebar-item');
  
  // Add click event listener to each item
  sidebarItems.forEach(item => {
      item.addEventListener('click', function(e) {
          // Remove active class from all items
          sidebarItems.forEach(i => i.classList.remove('active'));
          
          // Add active class to clicked item
          this.classList.add('active');
          
          // Store active state in localStorage
          localStorage.setItem('activeMenuItem', this.querySelector('a').getAttribute('href'));
      });
  });
  
  // Restore active state on page load
  const activeMenuItem = localStorage.getItem('activeMenuItem');
  if (activeMenuItem) {
      const activeItem = document.querySelector(`.sidebar-item a[href="${activeMenuItem}"]`);
      if (activeItem) {
          activeItem.parentElement.classList.add('active');
      }
  }
});