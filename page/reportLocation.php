<!-- include navbarReports -->

<?php
$pageTitle = 'Report Location - iReport';
// $additionalCSS = ['reportTransport.css'];
//require __DIR__ . 'reportFunctionLoc.php';


if (isset($_POST['submit'])) {
  if (addReportLoc($_POST) > 0) {
    echo "<script>
    alert('Report submitted successfully.');
    document.location.href = 'index.php?page=home';
    </script>";
  } else {
    echo "<script>
    alert('Report submission failed.');
    </script>";
    header("Location: index.php?page=reportLocation");
  }
}

?>

<main>
  <div class="container">

    <main class="main-content">
      <h1>Report Your Problem</h1>

      <form class="report-form" action="db/reportFunctions.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="form_id" value="form2">
        <div class="form-group">
          <label for="jenis_keluhan">Jenis Keluhan</label>
          <select id="jenis_keluhan" name="jenis_keluhan" required>
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
            <?php
            // require 'db/database.php';
            $result = mysqli_query($conn, "SELECT * FROM lokasi");
            $option = '';
            while ($row = mysqli_fetch_assoc($result)) {
              $option .= '<option value="' . $row['id_lokasi'] . '">' . $row['nama_lokasi'] . '</option>';
            }
            echo $option;
            ?>
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
            type="date"
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
          <button id="submitReportButton" type="submit" class="submit-btn" name="submit">Submit Report</button>
        </div>
      </form>
    </main>
  </div>

</main>
<script src="js/reportLocation.js"></script>