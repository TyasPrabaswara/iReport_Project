<!-- include navbarReports -->


<?php
$pageTitle = 'Report Location - iReport';
$additionalCSS = ['reportTransport.css'];
include 'includes/navbarReport.php';
?>

<main>
  <div class="container">

    <main class="main-content">
      <h1>Report Your Problem</h1>

      <form class="report-form" action="process_report.php" method="POST" enctype="multipart/form-data">
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
          <label for="lokasi">Lokasi</label>
          <select id="lokasi" name="lokasi" required>
            <option value="" disabled selected>Pilih lokasi</option>
            <option value="stasiunA">Stasiun A</option>
            <option value="stasiunB">Stasiun B</option>
            <option value="terminalC">Terminal C</option>
          </select>
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
            type="text"
            id="tanggal"
            name="tanggal"
            placeholder="DD/MM/YYYY"
            required>
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
<script src="../js/reportLocation.js"></script>