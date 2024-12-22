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
                        // Fetch the first news item for the headline
                        $row = $result->fetch_assoc();
                        // Display author and date
                        echo "<p><small>Ditulis oleh: " . htmlspecialchars($row['penulis']) . " | Tanggal: " . htmlspecialchars($row['tanggal_publikasi']) . "</small></p>";

                        // Display title
                        echo "<h3>" . htmlspecialchars($row['judul']) . "</h3>";

                        // Display news content (excerpt)
                        echo "<p>" . nl2br(htmlspecialchars(substr($row['isi_berita'], 0, 700))) . "...</p>";

                        // Button to read more
                        echo "<a href='detail.php?id=" . $row['id_berita'] . "' class='read-more'>Read more →</a>";
                    } else {
                        echo "<p>Tidak ada berita tersedia.</p>";
                    }
                    ?>
                </div>
            </article>

            <!-- News Grid for remaining news items -->
            <div class="news-grid d-flex flex-wrap  d-flex justify-content-center">
    <?php
    // Fetch and display the news items
    if ($result->num_rows > 1) {
        // Skip the first item (headline)
        $result->fetch_assoc();

        while ($row = $result->fetch_assoc()) {
            echo '<article class="news-card col-12 col-md-6 col-lg-5 mb-4">
                <div class="news-image">
                    <img src="/iReport_Project/img/kereta.jpeg" alt="Transportation news" class="img-fluid">
                </div>
                <div class="news-content p-3 shadow-sm">
                    <div class="news-meta d-flex justify-content-between text-muted mb-2">
                        <span class="date">' . htmlspecialchars($row["tanggal_publikasi"]) . '</span>
                        <span class="category">' . htmlspecialchars($row["penulis"]) . '</span>
                    </div>
                    <h3 class="h5">' . htmlspecialchars($row["judul"]) . '</h3>
                    <p>' . nl2br(htmlspecialchars(substr($row["isi_berita"], 0, 150))) . '...</p>
                    <a href="detail.php?id=' . $row['id_berita'] . '" class="read-more text-primary">Read more →</a>
                </div>
            </article>';
        }
    }
    ?>
</div>


        </div>
    </section>
</main>

