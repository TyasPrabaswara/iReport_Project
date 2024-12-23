<?php
$pageTitle = 'About Us - iReport';
$paddingTop = 10; // You can dynamically set this based on conditions
echo "<style>main { padding-top: {$paddingTop}vh; }</style>";

// Koneksi database
require 'db/database.php';
?>

    <div class="container-fluid">
        <h1 class="text-center">About Us</h1>
        <p class="lead text-center">Learn more about our mission, vision, and values.</p>
        <section class="py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h2 class="section-title">Who We Are</h2>
                        <p>We are a dedicated team committed to providing exceptional services and products. Our mission is to deliver quality and innovation that exceeds our clients' expectations.</p>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-4">
                        <h3>Our Mission</h3>
                        <p>To create value and make a difference in the lives of our customers and community.</p>
                    </div>
                    <div class="col-md-4">
                        <h3>Our Vision</h3>
                        <p>To be a leader in our industry and set the standard for excellence.</p>
                    </div>
                    <div class="col-md-4">
                        <h3>Our Values</h3>
                        <p>Integrity, innovation, and customer satisfaction drive everything we do.</p>
                    </div>
                </div>
            </div>
        </section>
    </div>



