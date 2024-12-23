<?php
$pageTitle = 'About Us - iReport';
$paddingTop = 10; // You can dynamically set this based on conditions
echo "<style>main { padding-top: {$paddingTop}vh; }</style>";

// Koneksi database
require 'db/database.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle); ?></title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            margin: auto;
        }

        h2,
        h3 {
            color: #343a40;
        }

        .section-title {
            margin-bottom: 20px;
        }

        .about-image {
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <h1>About Us</h1>
        <p class="lead">Learn more about our mission, vision, and values.</p>
        <section class="py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h2 class="section-title">Who We Are</h2>
                        <p>We are a dedicated team committed to providing exceptional services and products. Our mission is to deliver quality and innovation that exceeds our clients' expectations.</p>
                    </div>
                    <div class="col-md-6">
                        <img src="https://via.placeholder.com/500x300" alt="About Us" class="img-fluid about-image">
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



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>