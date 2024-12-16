document.addEventListener('DOMContentLoaded', function() {
  // Add active class to current sidebar item
  const currentLocation = window.location.pathname;
  const sidebarItems = document.querySelectorAll('.sidebar-item');
  
  sidebarItems.forEach(item => {
      const link = item.querySelector('a');
      if (currentLocation.includes(link.getAttribute('href'))) {
          item.classList.add('active');
      }
  });
});