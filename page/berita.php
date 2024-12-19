<?php
$pageTitle = 'Berita - iReport';
// $additionalCSS = ['berita.css'];
//include 'includes/header.php'

$host = 'localhost';
$db = 'ireport';
$user = 'root';
$pass = '';
$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

$connect = mysqli_connect($host, $user, $pass, $db);

$sql = 'SELECT * FROM berita';
$result = $connect->query($sql);
?>

<main>
    <section class="hero">
        <div class="hero-overlay"></div>
        <h1>NEWS</h1>
    </section>

    <section class="daily-news">
        <div class="container">
            <h2>DAILY NEWS</h2>

            <!-- Featured News (Headline) -->
            <article class="featured-news">
                <div class="news-image">
                    <img src="img/berita.jpeg" alt="Transportation control during holiday">
                </div>
                <div class="news-content">
                    <div class="news-image">
                        <?php
                        if ($result->num_rows > 0) {
                            // Fetch the first news item for the headline
                            $row = $result->fetch_assoc();
                            // Display author and date
                            echo "<p><small>Ditulis oleh: " . htmlspecialchars($row['penulis']) . " | Tanggal: " . htmlspecialchars($row['tanggal_publikasi']) . "</small></p>";
                            
                            // Display title
                            echo "<h3>" .($row['judul']) . "</h3>";
                            
                            // Display news content (excerpt)
                            echo "<p>" . nl2br(htmlspecialchars(substr($row['isi_berita'], 0, 700))) . "...</p>";
                            
                            // Button to read more
                            echo "<a href='detailBerita.php?id=" . $row['id_berita'] . "' class='read-more'>Read more →</a>";
                        } else {
                            echo "<p>Tidak ada berita tersedia.</p>";
                        } 
                        ?>
                    </div>
                </div>
            </article>

            <!-- News Grid for remaining news items -->
            <div class="news-grid">
                <?php
                // Fetch and display the remaining news items
                if ($result->num_rows > 1) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<article class="news-card">
                            <div class="news-image">
                                <img src="img/berita.jpeg" alt="Transportation news">
                            </div>
                            <div class="news-content">
                                <div class="news-meta">
                                    <span class="date">' . htmlspecialchars($row["tanggal_publikasi"]) . '</span>
                                    <span class="category">' . htmlspecialchars($row["penulis"]) . '</span>
                                </div>
                                <h3>' . htmlspecialchars($row["judul"]) . '</h3>
                                <p>' . nl2br(htmlspecialchars(substr($row["isi_berita"], 0, 200))) . '...</p>
                                <a href="detail.php?id=' . $row['id_berita'] . '" class="read-more">Read more →</a>
                            </div>
                        </article>';
                    }
                }
                ?>
            </div>
        </div>
    </section>
</main>
</html>

