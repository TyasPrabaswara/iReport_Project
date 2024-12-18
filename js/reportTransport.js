document.addEventListener('DOMContentLoaded', function () {
    // Initialize date picker
    flatpickr("#tanggal", {
        dateFormat: "d/m/Y",
        allowInput: true,
        altInput: true,
        altFormat: "d/m/Y",
        placeholder: "DD/MM/YYYY"
    });

    // Photo upload preview
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
    const formTransport = document.querySelector('.report-form');
    if (formTransport) {
        formTransport.addEventListener('submit', function (e) {
            e.preventDefault(); // Prevent default form submission

            // Gather form data
            const jenisKeluhan = document.getElementById('jenis-keluhan').value;
            const nomorKendaraan = document.getElementById('nomor-kendaraan').value;
            const deskripsi = document.getElementById('deskripsi').value;
            const tanggal = document.getElementById('tanggal').value;

            // Validate required fields
            if (!jenisKeluhan || !nomorKendaraan || !deskripsi || !tanggal) {
                alert('Mohon lengkapi semua field yang diperlukan');
                return;
            }

            // Create a FormData object to send the form data
            const formData = new FormData(formTransport);
            formData.append('submit', true); // Append submit flag

            // Send the form data using fetch
            fetch('reportFunctions.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                // Handle the response from the server
                if (data.includes('success')) {
                    alert('Report submitted successfully.');
                    document.location.href = 'index.php?page=home'; // Redirect on success
                } else {
                    alert('Report submission failed: ' + data);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while submitting the report.');
            });
        });
    }
});

// Function to remove photo
function removePhoto() {
    const photoInput = document.getElementById('photo-input');
    const photoPreview = document.getElementById('photo-preview');

    photoInput.value = '';
    photoPreview.innerHTML = '';
}