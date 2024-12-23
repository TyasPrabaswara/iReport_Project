<?php
$pageTitle = 'Customer Service - iReport';
$paddingTop = 10; // You can dynamically set this based on conditions
echo "<style>main { padding-top: {$paddingTop}vh; }</style>";
// Koneksi database
include __DIR__ . '/../db/database.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$successMessage = '';
$errorMessage = 'gagal';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $tanggal = $_POST['tanggal'];
    $pesan = $_POST['pesan'];

    $sql = "INSERT INTO pengaduan (nama, email, tel, tanggal, pesan) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $nama, $email, $tel, $tanggal, $pesan);

    if ($stmt->execute()) {
        $successMessage = "Pengaduan berhasil dikirim!";
    } else {
        $errorMessage = "Gagal mengirim pengaduan: " . $stmt->error;
    }

    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <link href="../css/bootstrap.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5 card pt-4 pl-4 pr-4 pb-5">
        <div class="text-center mb-4">
            <h1>Welcome to Customer Service</h1>
            <p>We are here to assist you. Please feel free to contact us or check our FAQ section.</p>
        </div>

        <!-- <?php if (!empty($successMessage)) : ?>
            <div class="alert alert-success"> <?php echo $successMessage; ?> </div>
        <?php endif; ?>

        <?php if (!empty($errorMessage)) : ?>
            <div class="alert alert-danger"> <?php echo $errorMessage; ?> </div>
        <?php endif; ?> -->

        <div class="row">
            <div class="col-md-6">
                <h2>Contact Us</h2>
                <form id="contact" method="POST" action="">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="nama" placeholder="Your Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
                    </div>
                    <div class="mb-3">
                        <label for="telephone" class="form-label">Telephone</label>
                        <input type="tel" class="form-control" id="telephone" name="telephone" placeholder="Your Telephone" required>
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="5" placeholder="Your Message" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Send Message</button>
                </form>
            </div>

            <div class="col-md-6">
                <h2>Support</h2>
                <p>If you have any questions or need further assistance, please reach out to us through the following channels:</p>
                <ul>
                    <li>Email: <a href="mailto:support@example.com">support@ireport.com</a></li>
                    <li>Phone: <a href="tel:0274-1234567">0274-1234567</a></li>
                    <li>Service hours (8:00 AM - 8:00 PM).</li>
                </ul>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>