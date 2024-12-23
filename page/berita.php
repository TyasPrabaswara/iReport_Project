<?php
$pageTitle = 'Berita - iReport';
$additionalCSS = ['berita.css'];
include 'includes/header.php';

include __DIR__ . '/../db/database.php';

$sql = 'SELECT * FROM berita';
$result = $conn->query($sql);
?>
<main>
    <section class="hero">
        <div class="hero-overlay"></div>
        <h1><b>NEWS</b></h1>
    </section>

    <section class="daily-news">
        <div class="container">
            <h2><b>DAILY NEWS</b></h2>

            <!-- Featured News (Headline) -->
            <article class="featured-news">
                <div class="news-image">
                    <img src="/iReport_Project/img/41832-bus-trans-jogja-suaraeleonora-pew.jpg" alt="Transportation control during holiday">
                </div>
                <div class="news-content">
                    <?php
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        // echo "<img src='img/kereta.jpg' alt=''>";
                    }
                    ?>
                </div>
                <div class="news-content">
                    <!-- Konten berita ditampilkan di sini -->
                    <?php
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo "<p><small>Ditulis oleh: " . htmlspecialchars($row['penulis']) . " | Tanggal: " . htmlspecialchars($row['tanggal_publikasi']) . "</small></p>";
                        echo "<h3>" . htmlspecialchars($row['judul']) . "</h3>";
                        echo "<p>" . nl2br(htmlspecialchars(substr($row['isi_berita'], 0, 700))) . "...</p>";
                        echo "<a href='detail.php?id=" . $row['id_berita'] . "' class='read-more'>Read more →</a>";
                    } else {
                        echo "<p>Tidak ada berita tersedia.</p>";
                    }

                    ?>
                </div>
            </article>

            <!-- News Grid for remaining news items -->
            <div class="news-grid d-flex flex-wrap justify-content-center">
                <?php
                if ($result->num_rows > 1) {
                    $result->fetch_assoc(); // Skip the first news featured above
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <article class="news-card col-12 col-md-6 col-lg-4 mb-5">
                            <div class="news-content p-4 shadow-lg">
                                <div class="news-meta d-flex justify-content-between text-muted mb-3">
                                    <span class="date"><?= htmlspecialchars($row["tanggal_publikasi"]) ?></span>
                                    <span class="category"><?= htmlspecialchars($row["penulis"]) ?></span>
                                </div>
                                <h3 class="h4"><?= htmlspecialchars($row["judul"]) ?></h3>
                                <p class="font-weight-light"><?= nl2br(htmlspecialchars(substr($row["isi_berita"], 0, 250))) ?>...</p>
                                <a href="detail.php?id=<?= $row['id_berita'] ?>" class="read-more text-primary font-weight-bold">Read more →</a>
                            </div>
                        </article>
                <?php
                    }
                } else {
                    echo "<p>No additional news available.</p>";
                }
                ?>
            </div>
        </div>
    </section>
</main>