<!-- include navbarMenuItems -->
<!-- include navbarReports -->

<?php
$pageTitle = 'Report Transport - iReport';

if (isset($_POST['submit'])) {
  if (addReportTrans($_POST) > 0) {
    echo "success";
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}
?>

<main>
  <div class="container">

    <main class="main-content">
      <h1>Report Your Problem</h1>

      <form class="report-form" action="" method="POST" enctype="multipart/form-data">
        <div class="isi-form">
          <div class="form-group">
            <label for="jenis-keluhan">Jenis Keluhan</label>
            <select id="jenis-keluhan" name="jenis_keluhan" required>
              <option value="" disabled selected>Pilih jenis keluhan</option>
              <option value="kerusakan">Kerusakan</option>
              <option value="kebersihan">Kebersihan</option>
              <option value="pelayanan">Pelayanan</option>
            </select>
          </div>

          <div class="form-group">
            <label for="no_kendaraan">Nomor Kendaraan</label>
            <input
              type="text"
              id="no_kendaraan"
              name="no_kendaraan"
              placeholder="Masukkan nomor kendaraan (plat)"
              required>
          </div>

          <div class="form-group">
            <label for="deskripsi">Deskripsi Keluhan</label>
            <textarea
              id="deskripsi"
              name="deskripsi"
              placeholder="Masukkan deskripsi keluhan"
              required></textarea>
          </div>

          <div class="form-group">
            <label for="tanggal">Tanggal Laporan</label>
            <input
              type="date"
              id="tanggal"
              name="tanggal"
              placeholder="DD/MM/YYYY"
              required>
          </div>
        </div>

        <div class="form-group photo-upload">
          <button type="button" class="select-photo-btn" onclick="document.getElementById('photo-input').click()">
            Select Photo
          </button>
          <input
            type="file"
            id="photo-input"
            name="photo"
            accept="image/*"
            hidden>
          <p class="helper-text">Sertakan bukti (terkait fasilitas kendaraan)</p>
          <div id="photo-preview" class="photo-preview"></div>
        </div>

        <div class="form-group">
          <button type="submit" class="submit-btn">Submit Report</button>
        </div>
      </form>
    </main>
  </div>

</main>
<script src="js/reportTransport.js"></script>