<?php
// Koneksi ke database
$host = 'localhost'; // Sesuaikan dengan host database Anda
$user = 'root'; // Sesuaikan dengan username database Anda
$password = ''; // Sesuaikan dengan password database Anda
$database = 'slb_registration'; // Nama database

$conn = new mysqli($host, $user, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$nama_siswa = $_POST['namaSiswa'];
$nama_ortu = $_POST['namaOrtu'];
$nomor_whatsapp = $_POST['nomorWhatsapp'];
$jenjang = $_POST['jenjang'];

// Buat query untuk menyimpan data ke tabel pendaftaran
$sql = "INSERT INTO pendaftaran (nama_siswa, nama_ortu, nomor_whatsapp, jenjang) 
        VALUES ('$nama_siswa', '$nama_ortu', '$nomor_whatsapp', '$jenjang')";

if ($conn->query($sql) === TRUE) {
    echo "Pendaftaran berhasil! Tanggal Pendaftaran: " . date('Y-m-d H:i:s');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi
$conn->close();
?>
