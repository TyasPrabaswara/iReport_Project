document.addEventListener('DOMContentLoaded', function() {
  // Get current page URL
  const currentPage = window.location.pathname.split('/').pop();
  
  // Get all navigation links
  const navLinks = document.querySelectorAll('.nav-links a');
  
  // Update active state based on current page
  navLinks.forEach(link => {
      if (link.getAttribute('href') === currentPage) {
          link.classList.add('active');
      }
  });

  // Sign up button click handler
  const signUpBtn = document.querySelector('.sign-up-btn');
  signUpBtn.addEventListener('click', () => {
      // Add your sign up logic here
      console.log('Sign up clicked');
  });

  // Add smooth transition when clicking navigation links
  navLinks.forEach(link => {
      link.addEventListener('click', function(e) {
          // Remove active class from all links
          navLinks.forEach(l => l.classList.remove('active'));
          // Add active class to clicked link
          this.classList.add('active');
      });
  });
});