<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Nilai</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container mt-5">
        <form action="" method="post">
            <div class="form-group row">
                <label for="nama" class="col-4 col-form-label">Nama Lengkap</label> 
                <div class="col-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa fa-address-card"></i>
                            </div>
                        </div> 
                        <input id="nama" name="nama" type="text" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="matkul" class="col-4 col-form-label">Mata Kuliah</label> 
                <div class="col-8">
                    <select id="matkul" name="matkul" class="custom-select" required>
                        <option value="Pemrograman Web">Pemrograman Web</option>
                        <option value="DDP">DDP</option>
                        <option value="Bahasa Inggris">Bahasa Inggris</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="uts" class="col-4 col-form-label">Nilai UTS</label> 
                <div class="col-8">
                    <input id="uts" name="uts" type="number" class="form-control" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="uas" class="col-4 col-form-label">Nilai UAS</label> 
                <div class="col-8">
                    <input id="uas" name="uas" type="number" class="form-control" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="tugas" class="col-4 col-form-label">Nilai Tugas</label> 
                <div class="col-8">
                    <input id="tugas" name="tugas" type="number" class="form-control" required>
                </div>
            </div> 
            <div class="form-group row">
                <div class="offset-4 col-8">
                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Mengambil data dari form
            $nama = $_POST['nama'];
            $matkul = $_POST['matkul'];
            $uts = $_POST['uts'];
            $uas = $_POST['uas'];
            $tugas = $_POST['tugas'];
            
            // Menghitung rata-rata nilai
            $rata_rata = ($uts * 0.3) + ($uas * 0.3) + ($tugas * 0.4);
            
            // Menentukan keterangan
            function getKeterangan($nilai) {
                if ($nilai >= 80) return "Lulus dengan sangat baik";
                if ($nilai >= 70) return "Lulus dengan baik";
                if ($nilai >= 60) return "Lulus dengan cukup";
                return "Tidak Lulus";
            }
            
            $keterangan = getKeterangan($rata_rata);
            
            // Menampilkan hasil
            echo "<div class='mt-4'>";
            echo "<h4>Hasil Nilai</h4>";
            echo "<p><strong>Nama:</strong> $nama</p>";
            echo "<p><strong>Mata Kuliah:</strong> $matkul</p>";
            echo "<p><strong>Nilai UTS:</strong> $uts</p>";
            echo "<p><strong>Nilai UAS:</strong> $uas</p>";
            echo "<p><strong>Nilai Tugas:</strong> $tugas</p>";
            echo "<p><strong>Nilai Rata-Rata:</strong> $rata_rata</p>";
            echo "<p><strong>Keterangan:</strong> $keterangan</p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
