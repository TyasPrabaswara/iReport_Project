document.addEventListener('DOMContentLoaded', function () {
    // Initialize date picker using Flatpickr
    flatpickr("#tanggal", {
        dateFormat: "d/m/Y", // Expected format
        allowInput: true,     // Allow manual input
        altInput: true,       // Display alternative input
        altFormat: "d/m/Y",   // Alternative format for display
        placeholder: "DD/MM/YYYY"
    });

    // Photo upload preview functionality
    const photoInput = document.getElementById('photo-input');
    const photoPreview = document.getElementById('photo-preview');

    if (photoInput) {
        photoInput.addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    photoPreview.innerHTML = `
                      <div class="preview-container">
                          <img src="${e.target.result}" alt="Selected photo">
                          <button type="button" class="remove-photo" onclick="removePhoto()">×</button>
                      </div>
                  `;
                }

                reader.readAsDataURL(file);
            }
        });
    }

    // Form validation and submission
    const formLocation = document.querySelector('.report-form');
    if (formLocation) {
        formLocation.addEventListener('submit', function (e) {
            e.preventDefault(); // Prevent default form submission

            // Gather form data
            const complaintType = document.getElementById('jenis-keluhan').value; // Complaint type
            const location = document.getElementById('lokasi').value; // Location ID
            const description = document.getElementById('deskripsi').value; // Description
            const reportDate = document.getElementById('tanggal').value; // Date of the report

            // Validate required fields
            if (!complaintType || !location || !description || !reportDate) {
                alert('Mohon lengkapi semua field yang diperlukan');
                return;
            }

            // Create a FormData object to send the form data
            const formData = new FormData(formLocation);
            console.log("Form data being sent: ", Array.from(formData.entries()));
            formData.append('submit', true); // Append submit flag

            // Send the form data using fetch
            fetch('db/reportFunctions.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                console.log(data); // Log the response data for debugging
                if (data.includes('success')) {
                    alert('Report submitted successfully.'); // Alert for successful submission
                    document.location.href = 'index.php?page=home'; // Redirect on success
                } else {
                    alert('Report submission failed: ' + data); // Show error message
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while submitting the report.');
            });
        });
    }
});

// Function to remove photo preview
function removePhoto() {
    const photoInput = document.getElementById('photo-input');
    const photoPreview = document.getElementById('photo-preview');

    photoInput.value = '';  // Reset file input
    photoPreview.innerHTML = ''; // Clear the preview
}

// Function to submit report (for manual media upload handling)
function submitReport() {
    const formData = new FormData();
    const mediaFile = document.getElementById('media').files[0];
    const description = document.getElementById('description').value;

    formData.append('media', mediaFile);
    formData.append('description', description);

    fetch('reportFunctions.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log('Response:', data);
        if (data.includes('has been uploaded')) {
            alert('Report submitted successfully!');
        } else {
            alert('Failed to submit report: ' + data);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while submitting the report.');
    });
}

// Event listener for submit button (if needed)
document.getElementById('submitReportButton').addEventListener('click', submitReport);
