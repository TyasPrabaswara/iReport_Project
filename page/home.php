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
                document.querySelector('#report-option').scrollIntoView({ behavior: 'smooth' });
            });
        </script>
        </div>
    </section>

    <div id="report-option" >
        <p></p>
        <h1 style="text-align: center; margin-top: 70px; font-size: 2em; font-weight: bold;">Report Option</h1>
    </div>
    <section class="features" >
        <div class="features-container">
            <a href="index.php?page=reportTransport" class="feature-card">
                <div class="icon">
                    <svg viewBox="0 0 24 24" width="48" height="48">
                        <path d="M12 2c-4 0-8 .5-8 4v9.5C4 17.43 5.57 19 7.5 19L6 20.5v.5h2l2-2h4l2 2h2v-.5L16.5 19c1.93 0 3.5-1.57 3.5-3.5V6c0-3.5-4-4-8-4zM7.5 17c-.83 0-1.5-.67-1.5-1.5S6.67 14 7.5 14s1.5.67 1.5 1.5S8.33 17 7.5 17zm3.5-7H6V6h5v4zm2 0V6h5v4h-5zm3.5 7c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5z" />
                    </svg>
                </div>
                <h2>TRANSPORT</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste illum voluptas eveniet optio adipisci esse aliquid libero accusantium rerum delectus.</p>
            </a>

            <a href="index.php?page=reportLocation" class="feature-card">
                <div class="icon">
                    <svg viewBox="0 0 24 24" width="48" height="48">
                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zM7 9c0-2.76 2.24-5 5-5s5 2.24 5 5c0 2.88-2.88 7.19-5 9.88C9.92 16.21 7 11.85 7 9z" />
                        <circle cx="12" cy="9" r="2.5" />
                    </svg>
                </div>
                <h2>LOCATION</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste illum voluptas eveniet optio adipisci esse aliquid libero accusantium rerum delectus.</p>
            </a>
        </div>
    </section>
    <script src="script.js"></script>
</main>