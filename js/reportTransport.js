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

    // Form validation Transport
    const formTransport = document.querySelector('.report-form');
    if (formTransport) {
        formTransport.addEventListener('submit', function (e) {
            e.preventDefault();

            const jenisKeluhan = document.getElementById('jenis-keluhan').value;
            const nomorKendaraan = document.getElementById('nomor-kendaraan').value;
            const deskripsi = document.getElementById('deskripsi').value;
            const tanggal = document.getElementById('tanggal').value;

            if (!jenisKeluhan || !nomorKendaraan || !deskripsi || !tanggal) {
                alert('Mohon lengkapi semua field yang diperlukan');
                return;
            }

            this.submit();
        });
    }
    // Form validation Location
    const formLocation = document.querySelector('.report-form');
    if (formLocation) {
        formLocation.addEventListener('submit', function (e) {
            e.preventDefault();

            const jenisKeluhan = document.getElementById('jenis-keluhan').value;
            const nomorKendaraan = document.getElementById('lokasi').value;
            const deskripsi = document.getElementById('deskripsi').value;
            const tanggal = document.getElementById('tanggal').value;

            if (!jenisKeluhan || !nomorKendaraan || !deskripsi || !tanggal) {
                alert('Mohon lengkapi semua field yang diperlukan');
                return;
            }

            this.submit();
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