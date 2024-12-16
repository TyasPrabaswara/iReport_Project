<?php
$pageTitle = 'Berita - iReport';
// $additionalCSS = ['berita.css'];
//include 'includes/header.php'
?>

<main>
    <section class="hero">
        <div class="hero-overlay"></div>
        <h1>NEWS</h1>
    </section>

    <section class="daily-news">
        <div class="container">
            <h2>DAILY NEWS</h2>
            
            <!-- Featured News -->
            <article class="featured-news">
                <div class="news-image">
                    <img src="images/luggage.jpg" alt="Transportation control during holiday">
                </div>
                <div class="news-content">
                    <div class="news-meta">
                        <span class="date">12 December 2023</span>
                        <span class="category">Transport</span>
                        <span class="comments">5 Comments</span>
                    </div>
                    <h3>Kemenhub siapkan pengendalian transportasi terkait larangan mudik lebaran</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                    <a href="#" class="read-more">Read more →</a>
                </div>
            </article>

            <!-- News Grid -->
            <div class="news-grid">
                <?php for($i = 0; $i < 3; $i++): ?>
                <article class="news-card">
                    <div class="news-image">
                        <img src="images/luggage.jpg" alt="Transportation news">
                    </div>
                    <div class="news-content">
                        <div class="news-meta">
                            <span class="date">12 December 2023</span>
                            <span class="category">Transport</span>
                        </div>
                        <h3>Kemenhub siapkan pengendalian transportasi terkait larangan mudik lebaran</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                        <a href="#" class="read-more">Read more →</a>
                    </div>
                </article>
                <?php endfor; ?>
            </div>
        </div>
    </section>
</main>

</body>
</html>

