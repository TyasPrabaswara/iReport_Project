<?php
$pageTitle = 'Jadwal - iReport';

include __DIR__ . '/../db/database.php';



?>


<main>
  <section class="hero">
    <div class="hero-overlay"></div>
    <h1>Jadwal</h1>
  </section>

  <section class="daily-news">
    <?php
    $sql = 'SELECT * FROM keretaApi';
    $result = $conn->query($sql); ?>
    <div class="container">
      <h2 class="text-start">Kereta Bandara</h2>


      <table class="table table-hover">
        <thead class="table table-primary">
          <tr>
            <th scope="col">Nomor Seri</th>
            <th scope="col">Nama</th>
            <th scope="col">Asal</th>
            <th scope="col">Tujuan</th>
            <th scope="col">Keberangkatan</th>
            <th scope="col">Kedatangan</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . htmlspecialchars($row['noSeri']) . "</td>";
              echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
              echo "<td>" . htmlspecialchars($row['asal']) . "</td>";
              echo "<td>" . htmlspecialchars($row['tujuan']) . "</td>";
              echo "<td>" . htmlspecialchars($row['keberangkatan']) . "</td>";
              echo "<td>" . htmlspecialchars($row['kedatangan']) . "</td>";
              echo "</tr>";
            }
          }
          ?>
        </tbody>
      </table>
  </section>
  <section class="daily-news">
    <?php
    $sql = 'SELECT * FROM KRL';
    $result = $conn->query($sql); ?>
    <div class="container">
      <h2 class="text-start">Kereta Lokal</h2>


      <table class="table table-hover">
        <thead class="table table-primary">
          <tr>
            <th scope="col">Nomor Seri</th>
            <th scope="col">Nama</th>
            <th scope="col">Asal</th>
            <th scope="col">Tujuan</th>
            <th scope="col">Keberangkatan</th>
            <th scope="col">Kedatangan</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . htmlspecialchars($row['noSeri']) . "</td>";
              echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
              echo "<td>" . htmlspecialchars($row['asal']) . "</td>";
              echo "<td>" . htmlspecialchars($row['tujuan']) . "</td>";
              echo "<td>" . htmlspecialchars($row['keberangkatan']) . "</td>";
              echo "<td>" . htmlspecialchars($row['kedatangan']) . "</td>";
              echo "</tr>";
            }
          } else {
            echo "<tr><td colspan='6'>Tidak ada jadwal tersedia.</td></tr>";
          }
          ?>
        </tbody>
      </table>
  </section>
  <section class="daily-news">
    <?php
    $sql = 'SELECT * FROM Bus';
    $result = $conn->query($sql); ?>
    <div class="container">
      <h2 class="text-start">Bus</h2>


      <table class="table table-hover">
        <thead class="table table-primary">
          <tr>
            <th scope="col">Nomor Plat</th>
            <th scope="col">Nama</th>
            <th scope="col">Asal</th>
            <th scope="col">Tujuan</th>
            <th scope="col">Keberangkatan</th>
            <th scope="col">Kedatangan</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . htmlspecialchars($row['noPlat']) . "</td>";
              echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
              echo "<td>" . htmlspecialchars($row['asal']) . "</td>";
              echo "<td>" . htmlspecialchars($row['tujuan']) . "</td>";
              echo "<td>" . htmlspecialchars($row['keberangkatan']) . "</td>";
              echo "<td>" . htmlspecialchars($row['kedatangan']) . "</td>";
              echo "</tr>";
            }
          } else {
            echo "<tr><td colspan='6'>Tidak ada jadwal tersedia.</td></tr>";
          }
          ?>
        </tbody>
      </table>
  </section>
</main>

</html>