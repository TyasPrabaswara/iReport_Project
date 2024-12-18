document.addEventListener('DOMContentLoaded', function() {
  const settingsItems = document.querySelectorAll('.settings-item');
  
  // Add click handlers
  settingsItems.forEach(item => {
      item.addEventListener('click', function() {
          // Remove active class from all items
          settingsItems.forEach(i => i.classList.remove('active'));
          
          // Add active class to clicked item
          this.classList.add('active');
          
          // Get section name
          const section = this.dataset.section;
          
          // Here you can add logic to show different content based on section
          console.log(`Navigating to ${section} settings`);
      });
      
      // Add hover effect sound (optional)
      item.addEventListener('mouseenter', function() {
          playHoverSound();
      });
  });
});