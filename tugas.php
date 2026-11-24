<?php
// Kelas Induk (Parent Class)
class AkunSim {
    public $username;
    public $namaLengkap;

    public function __construct($username, $namaLengkap) {
        $this->username = $username;
        $this->namaLengkap = $namaLengkap;
    }

    public function getHeaderInfo() {
        return "ID: " . $this->username . " | " . $this->namaLengkap;
    }
}

// Kelas Anak Pertama (Child Class 1)
class SimMahasiswa extends AkunSim {
    public $sksDiambil;
    public $ipk;

    public function __construct($nim, $namaLengkap, $sksDiambil, $ipk) {
        parent::__construct($nim, $namaLengkap);
        $this->sksDiambil = $sksDiambil;
        $this->ipk = $ipk;
    }

    public function renderCard() {
        return '
        <div class="col-md-6 mb-4">
            <div class="card shadow border-primary h-100">
                <div class="card-header bg-primary text-white d-flex align-items-center">
                    <span class="fs-4 me-2">🎓</span>
                    <h5 class="mb-0">Portal Mahasiswa</h5>
                </div>
                <div class="card-body">
                    <h6 class="text-muted mb-3">' . $this->getHeaderInfo() . '</h6>
                    <hr>
                    <p class="card-text">Total SKS Semester Ini: <strong>' . $this->sksDiambil . ' SKS</strong></p>
                    <p class="card-text">IPK Terakhir: <span class="badge bg-success fs-6">' . $this->ipk . '</span></p>
                </div>
                <div class="card-footer bg-light">
                    <button class="btn btn-outline-primary btn-sm w-100">Cetak KRS</button>
                </div>
            </div>
        </div>';
    }
}

// Kelas Anak Kedua (Child Class 2)
class SimDosen extends AkunSim {
    public $kelasDiampu;
    public $fakultas;

    public function __construct($nidn, $namaLengkap, $kelasDiampu, $fakultas) {
        parent::__construct($nidn, $namaLengkap);
        $this->kelasDiampu = $kelasDiampu;
        $this->fakultas = $fakultas;
    }

    public function renderCard() {
        return '
        <div class="col-md-6 mb-4">
            <div class="card shadow border-success h-100">
                <div class="card-header bg-success text-white d-flex align-items-center">
                    <span class="fs-4 me-2">👨‍🏫</span>
                    <h5 class="mb-0">Portal Dosen</h5>
                </div>
                <div class="card-body">
                    <h6 class="text-muted mb-3">' . $this->getHeaderInfo() . '</h6>
                    <hr>
                    <p class="card-text">Mata Kuliah Diampu: <strong>' . $this->kelasDiampu . '</strong></p>
                    <p class="card-text">Fakultas: <span class="badge bg-secondary fs-6">' . $this->fakultas . '</span></p>
                </div>
                <div class="card-footer bg-light">
                    <button class="btn btn-outline-success btn-sm w-100">Input Nilai Mahasiswa</button>
                </div>
            </div>
        </div>';
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIM Kampus - Dashboard</title>
    <!-- Menggunakan Bootstrap 5 untuk tampilan modern -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
        <div class="text-center mb-5">
            <h1 class="fw-bold text-dark">Sistem Informasi Manajemen Kampus</h1>
            <p class="text-muted">Contoh Implementasi Objek (OOP) PHP dengan Desain Antarmuka Modern</p>
        </div>

        <div class="row">
            <?php
            // Membuat objek Mahasiswa
            $mhs = new SimMahasiswa("202610112", "adudu", 22, 3.75);
            echo $mhs->renderCard();

            // Membuat objek Dosen
            $dosen = new SimDosen("0015048802", "Ir.h.mukidi, M.Kom.", "Pemrograman Web Lanjut", "Teknologi Informasi");
            echo $dosen->renderCard();
            ?>
        </div>
    </div>

</body>
</html>
