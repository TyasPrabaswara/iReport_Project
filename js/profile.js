document.addEventListener('DOMContentLoaded', function() {
  // Profile photo upload handling
  const photoUpload = document.getElementById('photo-upload');
  const profileImage = document.getElementById('profile-image');
  const selectPhotoBtn = document.querySelector('.select-photo-btn');
  
  selectPhotoBtn.addEventListener('click', () => {
      photoUpload.click();
  });
  
  photoUpload.addEventListener('change', function(e) {
      if (this.files && this.files[0]) {
          const reader = new FileReader();
          
          reader.onload = function(e) {
              profileImage.src = e.target.result;
          }
          
          reader.readAsDataURL(this.files[0]);
          
          // Upload to server
          const formData = new FormData();
          formData.append('avatar', this.files[0]);
          
          fetch('update-avatar.php', {
              method: 'POST',
              body: formData
          })
          .then(response => response.json())
          .then(data => {
              if (!data.success) {
                  alert('Failed to upload image. Please try again.');
              }
          })
          .catch(error => {
              console.error('Error:', error);
              alert('An error occurred while uploading the image.');
          });
      }
  });
  
  // Phone number formatting
  const phoneInput = document.getElementById('phone');
  phoneInput.addEventListener('input', function(e) {
      let value = this.value.replace(/\D/g, '');
      if (value.length > 2) {
          value = value.substring(0, 2) + '********' + value.substring(value.length - 2);
      }
      this.value = value;
  });
  
  // Form submission handling
  const profileForm = document.getElementById('profile-form');
  
  profileForm.addEventListener('submit', function(e) {
      e.preventDefault();
      
      const formData = new FormData(this);
      
      fetch('update-profile.php', {
          method: 'POST',
          body: formData
      })
      .then(response => response.json())
      .then(data => {
          if (data.success) {
              alert('Profile updated successfully!');
          } else {
              alert(data.message || 'Failed to update profile. Please try again.');
          }
      })
      .catch(error => {
          console.error('Error:', error);
          alert('An error occurred while updating the profile.');
      });
  });
  
  // Change password handling
  const changePasswordBtn = document.querySelector('.change-password-btn');
  
  changePasswordBtn.addEventListener('click', function() {
      window.location.href = 'change-password.php';
  });
});