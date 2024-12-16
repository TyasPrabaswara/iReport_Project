document.addEventListener('DOMContentLoaded', function() {
  // Filter buttons
  const filterButtons = document.querySelectorAll('.filter-btn');
  filterButtons.forEach(button => {
      button.addEventListener('click', function() {
          // Remove active class from all buttons
          filterButtons.forEach(btn => btn.classList.remove('active'));
          // Add active class to clicked button
          this.classList.add('active');
          
          // Here you would typically add filtering logic
          const filter = this.textContent.toLowerCase();
          filterReports(filter);
      });
  });

  // Function to filter reports (example implementation)
  function filterReports(filter) {
      const reports = document.querySelectorAll('.report-item');
      reports.forEach(report => {
          if (filter === 'all') {
              report.style.display = 'flex';
          } else {
              // Add your filtering logic here
              // This is just an example:
              const category = report.dataset.category;
              report.style.display = category === filter ? 'flex' : 'none';
          }
      });
  }

  // User profile dropdown (if needed)
  const userProfile = document.querySelector('.user-profile');
  if (userProfile) {
      userProfile.addEventListener('click', function() {
          // Add your dropdown logic here
      });
  }
});