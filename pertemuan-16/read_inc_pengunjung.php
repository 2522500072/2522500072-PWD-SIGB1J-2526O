<?php
require 'koneksi.php';

$fieldConfig = [
  "kodepen" => ["label" => "Kode Pengunjung:", "suffix" => ""],
  "nama" => ["label" => "Nama Pengunjung:", "suffix" => " &#128526;"],
  "alamat" => ["label" => "Alamat Rumah:", "suffix" => ""],
  "tanggal" => ["label" => "Tanggal Kunjungan:", "suffix" => ""],
  "hobi" => ["label" => "Hobi:", "suffix" => " &#127926;"],
  "slta" => ["label" => "Asal SLTA:", "suffix" => " &hearts;"],
  "pekerjaan" => ["label" => "Pekerjaan:", "suffix" => " &copy; 2025"],
  "ortu" => ["label" => "Nama Orang Tua:", "suffix" => ""],
  "pacar" => ["label" => "Nama Pacar:", "suffix" => ""],
  "mantan" => ["label" => "Nama Mantan:", "suffix" => ""],
];

$sql = "SELECT * FROM tbl_biodata_pengunjung ORDER BY cid DESC";
$q = mysqli_query($conn, $sql);
if (!$q) {
  echo "<p>Gagal membaca data tamu: " . htmlspecialchars(mysqli_error($conn)) . "</p>";
} elseif (mysqli_num_rows($q) === 0) {
  echo "<p>Belum ada data tamu yang tersimpan.</p>";
} else {
  while ($row = mysqli_fetch_assoc($q)) {
    $arrBiodata = [
      "kodepen" => $row["nkode_pengunjung"],
      "nama" => $row["nnama_pengunjung"],
      "alamat" => $row["nalamat_pengunjung"],
      "tanggal" => $row["ctanggal_lahir"],
      "hobi" => $row["chobi"],
      "pasangan" => $row["cpasangan"],
      "pekerjaan" => $row["cpekerjaan"],
      "ortu" => $row["cnama_orang_tua"],
      "kakak" => $row["cnama_kakak"],
      "adik" => $row["cnama_adik"],
    ];
    echo tampilkanBiodata($fieldConfig, $arrBiodata);
  }
}
