<?php
session_start();

$sesnama = $_POST["txtNama"];
$sesemail = $_POST["txtEmail"];
$sespesan = $_POST["txtPesan"];

$_SESSION["txtNama"] = $sesnama;
$_SESSION["txtEmail"] = $sesemail;
$_SESSION["txtPesan"] = $sespesan;

header("Location: index.php");
?>