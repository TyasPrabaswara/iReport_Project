<?php
include __DIR__ . '/../db/database.php';


// Mengatur padding dinamis jika diperlukan
$paddingTop = 0;
echo "<style>main { padding-top: {$paddingTop}vh; }</style>";

// Proses pengajuan keluhan
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajukankeluhan'])) {
    $nama = trim($_POST['nama']);
    $email = trim($_POST['email']);
    $tel = trim($_POST['telephone']);
    $pesan = trim($_POST['pesan']);
    $tanggal = trim($_POST['tanggal']);

    if (!empty($nama) && !empty($email) && !empty($tel) && !empty($pesan) && !empty($tanggal)) {
        $sql = "INSERT INTO pengaduan (nama, email, tel, tanggal, pesan) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("sssss", $nama, $email, $tel, $tanggal, $pesan);
            if ($stmt->execute()) {
                $message = "Keluhan berhasil dikirimkan!";
                $feedbackType = "success";
            } else {
                $message = "Gagal mengajukan keluhan: " . $stmt->error;
                $feedbackType = "danger";
            }
            $stmt->close();
        } else {
            $message = "Kesalahan pada pernyataan SQL: " . $conn->error;
            $feedbackType = "danger";
        }
    } else {
        $message = "Semua kolom wajib diisi.";
        $feedbackType = "danger";
    }
}

// Pesan umpan balik
$feedbackMessage = isset($message) ? "<div class='alert alert-$feedbackType text-center'>$message</div>" : "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Service</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>
    <div class="container my-5">


        <!-- Pesan Umpan Balik -->
        <?= isset($feedbackMessage) ? $feedbackMessage : '' ?>

        <div class="row">
            <div class="text-center mb-4">
                <h1 class="display-5">Customer Service</h1>
                <p class="lead">Kami siap membantu Anda. Silakan ajukan pertanyaan atau keluhan Anda melalui formulir di bawah.</p>
            </div>
            <!-- Formulir Pengaduan -->
            <div class="col-md-6 mb-4">
                <h3 class="mb-4">Ajukan Keluhan</h3>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama Anda" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email Anda" required>
                    </div>
                    <div class="mb-3">
                        <label for="telephone" class="form-label">Nomor Telepon</label>
                        <input type="tel" class="form-control" id="telephone" name="telephone" placeholder="Masukkan nomor telepon Anda" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>
                    <div class="mb-3">
                        <label for="pesan" class="form-label">Pesan</label>
                        <textarea class="form-control" id="pesan" name="pesan" rows="5" placeholder="Tulis keluhan Anda di sini" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="ajukankeluhan">Ajukan Keluhan</button>
                </form>
            </div>

            <!-- FAQ -->
            <div class="col-md-6">
                <h3 class="mb-4">FAQ</h3>
                <div class="accordion mb-4" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq1Header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" aria-expanded="true" aria-controls="faq1">
                                Bagaimana cara mengajukan keluhan?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse show" aria-labelledby="faq1Header">
                            <div class="accordion-body">
                                Anda dapat mengisi formulir keluhan di sebelah kiri dan mengirimkannya. Tim kami akan meninjau dan menghubungi Anda.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq2Header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2" aria-expanded="false" aria-controls="faq2">
                                Berapa lama waktu tanggapan?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" aria-labelledby="faq2Header">
                            <div class="accordion-body">
                                Kami biasanya memberikan tanggapan dalam waktu 1-2 hari kerja.
                            </div>
                        </div>
                    </div>
                </div>

                <h3>Kontak Kami</h3>
                <ul class="list-unstyled">
                    <li>Email: <a href="mailto:customer@example.com">customer@example.com</a></li>
                    < li>Telepon: <a href="tel:+6201234567890">+62 012 3456 7890</a></li>
                        <li>Live Chat: Tersedia 24/7 di website ini</li>
                </ul>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>