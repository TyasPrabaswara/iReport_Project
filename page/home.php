<?php
$pageTitle = 'Home - iReport';
//$additionalCSS = ['home.css'];
?>

<main>
    <section id="hero" class="hero">
        <div class="hero-content">
            <h1>REPORT YOUR PROBLEM</h1>
            <button class="here-link">HERE</button>
            <script>
                document.querySelector('.here-link').addEventListener('click', function(event) {
                    event.preventDefault();
                    document.querySelector('#report-option').scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            </script>
        </div>
    </section>

    <div id="report-option">
        <p></p>
        <h1 style="text-align: center; margin-top: 70px; font-size: 2em; font-weight: bold;">Report Option</h1>
    </div>
    <section class="features">
        <div class="features-container">
            <a href="index.php?page=reportTransport" class="feature-card">
                <div class="icon">
                    <svg viewBox="0 0 24 24" width="48" height="48">
                        <path d="M12 2c-4 0-8 .5-8 4v9.5C4 17.43 5.57 19 7.5 19L6 20.5v.5h2l2-2h4l2 2h2v-.5L16.5 19c1.93 0 3.5-1.57 3.5-3.5V6c0-3.5-4-4-8-4zM7.5 17c-.83 0-1.5-.67-1.5-1.5S6.67 14 7.5 14s1.5.67 1.5 1.5S8.33 17 7.5 17zm3.5-7H6V6h5v4zm2 0V6h5v4h-5zm3.5 7c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5z" />
                    </svg>
                </div>
                <h2>TRANSPORT</h2>
                <p>Laporkan permasalahan yang Anda temui pada transportasi umum (kereta dan bus), seperti fasilitas yang rusak, pelayanan yang kurang baik, atau masalah keamanan, secara mudah dan cepat.</p>
            </a>

            <a href="index.php?page=reportLocation" class="feature-card">
                <div class="icon">
                    <svg viewBox="0 0 24 24" width="48" height="48">
                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zM7 9c0-2.76 2.24-5 5-5s5 2.24 5 5c0 2.88-2.88 7.19-5 9.88C9.92 16.21 7 11.85 7 9z" />
                        <circle cx="12" cy="9" r="2.5" />
                    </svg>
                </div>
                <h2>LOCATION</h2>
                <p>Sampaikan laporan terkait kondisi atau permasalahan di lokasi tertentu, seperti fasilitas umum yang rusak, area yang kurang aman, atau gangguan lainnya, dengan cepat dan akurat.</p>
            </a>
        </div>
    </section>
    <?php
        $sql = 'SELECT * FROM berita';
        $result = $conn->query($sql);
        ?>
        <section class="daily-news">
            <div class="container">
                <h2><strong>Daily News</strong></h2>

                <!-- Featured News Carousel -->
                <?php if ($result->num_rows > 0): ?>
                    <div id="newsCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <?php
                            $isActive = true; // Menandai slide pertama sebagai aktif
                            while ($row = $result->fetch_assoc()):
                            ?>
                                <div class="carousel-item <?= $isActive ? 'active' : '' ?>">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            <img src="img/kereta.jpg" alt="News Image" class="d-block w-100">
                                        </div>
                                        <div class="col-md-6">
                                            <p><small>Ditulis oleh: <?= htmlspecialchars($row['penulis']) ?> | Tanggal: <?= htmlspecialchars($row['tanggal_publikasi']) ?></small></p>
                                            <h3><?= htmlspecialchars($row['judul']) ?></h3>
                                            <p><?= nl2br(htmlspecialchars(substr($row['isi_berita'], 0, 300))) ?>...</p>
                                            <a href="detail.php?id=<?= $row['id_berita'] ?>" class="btn btn-primary">Read more →</a>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                $isActive = false; // Setelah slide pertama, ubah status aktif
                            endwhile;
                            ?>
                        </div>
                        <!-- Carousel Controls -->
                        <button class="carousel-control-prev custom-carousel-btn" type="button" data-bs-target="#newsCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next custom-carousel-btn" type="button" data-bs-target="#newsCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>

                        <style>
                            .carousel-control-prev:hover,
                            .carousel-control-next:hover {
                                background-color: rgba(0, 0, 0, 0.5);
                            }
                        </style>
                    </div>
                <?php else: ?>
                    <p>Tidak ada berita tersedia.</p>
                <?php endif; ?>
            </div>
        </section>
        <main>
        <h2 style="text-align: center;"><strong>Daily Schedule</strong></h2>

        <section class="daily-news">
            <?php
            $sql = 'SELECT * FROM keretaApi LIMIT 5';
            $result = $conn->query($sql); ?>
            <div class="container">
                <h2 class="text-start">Kereta Api</h2>


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
            $sql = 'SELECT * FROM KRL LIMIT 5';
            $result = $conn->query($sql); ?>
            <div class="container">
                <h2 class="text-start">KRL</h2>


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
        <section class="daily-news mb-5">
            <?php
            $sql = 'SELECT * FROM Bus LIMIT 5';
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
    </main>
    </main>