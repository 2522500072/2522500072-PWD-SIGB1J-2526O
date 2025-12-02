<?php
session_start();
$arrcontact = [
    "nama" => $_POST["txtNama"] ?? "",
    "email" => $_POST["txtEmail"] ?? "",
    "pesan" => $_POST["txtPesan"] ?? "",  
];
$_SESSION["contact"] = $arrcontact;
$arrbiodata = [
    "nim" => $_POST["txtNim"] ?? "",
    "nama" => $_POST["txtNmLengkap"] ?? "",
    "tempat" => $_POST["txtT4Lhr"] ?? "",
    "tanggal" => $_POST["txtTglLhr"] ?? "",
    "hobi" => $_POST["txtHobi"] ?? "",
    "pasangan" => $_POST["txtPasangan"] ?? "",
    "pekerjaan" => $_POST["txtKerja"] ?? "",
    "ortu" => $_POST["txtNmOrtu"] ?? "",
    "kakak" => $_POST["txtNmKakak"] ?? "",
    "adik" => $_POST["txtNmAdik"] ?? "",
];

$_SESSION["biodata"] = $arrbiodata;
// print_r($arrbiodata);
// die();
header("location: index.php#about");
