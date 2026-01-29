<?php
  session_start();
  require __DIR__ . '/koneksi.php';
  require_once __DIR__ . '/fungsi.php';

  #cek method form, hanya izinkan POST
  if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['flash_error'] = 'Akses tidak valid.';
    redirect_ke('read_pengunjung.php');
  }

  #validasi cid wajib angka dan > 0
  $cid = filter_input(INPUT_POST, 'cid', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
  ]);

  if (!$cid) {
    $_SESSION['flash_error'] = 'CID Tidak Valid.';
   redirect_ke('edit_pengunjung.php?cid='. (int)$cid);
  }

  #ambil dan bersihkan (sanitasi) nilai dari form
$kodepen = bersihkan($_POST["txtKodePen"] ?? '');
$nama = bersihkan($_POST["txtNmPengunjung"] ?? '');
$alamat = bersihkan($_POST["txtAlRmh"] ?? '');
$tanggal = bersihkan($_POST["txtTglKunjungan"] ?? '');
$hobi = bersihkan($_POST["txtHobi"] ?? '');
$slta = bersihkan($_POST["txtAsalSMA"] ?? '');
$pekerjaan = bersihkan($_POST["txtKerja"] ?? '');
$ortu = bersihkan($_POST["txtNmOrtu"] ?? '');
$pacar = bersihkan($_POST["txtNmPacar"] ?? '');
$mantan = bersihkan($_POST["txtNmMantan"] ?? '');



  #Validasi sederhana
  $errors = []; #ini array untuk menampung semua error yang ada

 if ($kodepen === '') {
  $errors[] = 'Kode Pengunjung wajib diisi.';
}
if ($nama === '') {
  $errors[] = 'Nama Pengunjung wajib diisi.';
}
if ($alamat === '') {
  $errors[] = 'Alamat wajib diisi.';
}
if ($tanggal === '') {
  $errors[] = 'Tanggal wajib diisi.';
}
if ($hobi === '') {
  $errors[] = 'Hobi wajib diisi.';
}
if ($slta === '') {
  $errors[] = 'Asal SLTA wajib diisi.';
}
if ($pekerjaan === '') {
  $errors[] = 'Pekerjaan wajib diisi.';
}
if ($ortu === '') {
  $errors[] = 'Nama Ortu wajib diisi.';
}
if ($pacar === '') {
  $errors[] = 'Nama Pacar wajib diisi.';
}
if ($mantan === '') {
  $errors[] = 'Nama Mantan wajib diisi.';
}

  /*
  kondisi di bawah ini hanya dikerjakan jika ada error, 
  simpan nilai lama dan pesan error, lalu redirect (konsep PRG)
  */
  if (!empty($errors)) {
    $_SESSION['old_pengunjung'] = [
    'kodepen'  => $kodepen,
    'nama'  => $nama,
    'alamat'  => $alamat,
    'tanggal'  => $tanggal,
    'hobi'  => $hobi,
    'slta'  => $slta,
    'pekerjaan'  => $pekerjaan,
    'ortu'  => $ortu,
    'pacar'  => $kakak,
    'mantan'  => $adik
    
  ];
    $_SESSION['flash_error'] = implode('<br>', $errors);
    redirect_ke('edit_pengunjung.php?cid='. (int)$cid);
  }

  /*
    Prepared statement untuk anti SQL injection.
    menyiapkan query UPDATE dengan prepared statement 
    (WAJIB WHERE cid = ?)
  */
  $stmt = mysqli_prepare($conn, "UPDATE tbl_biodata_pengunjung
                                SET nkode_pengunjung = ?, nnama_pengunjung = ?, nalamat_rumah = ?,	ntanggal_kunjungan = ?,	nhobi, nasal_SLTA = ?,	npekerjaan = ?,	nnama_orang_tua = ?, nnama_pacar = ?, nnama_mantan =
                            WHERE cid = ?");
  if (!$stmt) {
    #jika gagal prepare, kirim pesan error (tanpa detail sensitif)
    $_SESSION['flash_error'] = 'Terjadi kesalahan sistem (prepare gagal).';
    redirect_ke('edit_biodata.php?cid='. (int)$cid);
  }

  #bind parameter dan eksekusi (s = string, i = integer)
  mysqli_stmt_bind_param($stmt, "sssssssssssi",$kodepen, $nama, $alamat, $tanggal, $hobi, $slta, $pekerjaan, $ortu, $pacar, $mantan, $cid);

  if (mysqli_stmt_execute($stmt)) { #jika berhasil, kosongkan old value
    unset($_SESSION['old_pengunjung']);
    /*
      Redirect balik ke read.php dan tampilkan info sukses.
    */
    $_SESSION['flash_sukses'] = 'Terima kasih, data Anda sudah diperbaharui.';
    redirect_ke('read_pengunjung.php'); #pola PRG: kembali ke data dan exit()
  } else { #jika gagal, simpan kembali old value dan tampilkan error umum
    $_SESSION['old_pengunjung'] = [
    'kodepen'  => $kodepen,
    'nama' => $nama,
    'alamat' => $alamat,
    'tanggal' => $tanggal,
    'hobi' => $hobi,
    'slta' => $pasangan,
    'pekerjaan' => $pekerjaan,
    'ortu' => $ortu,
    'pacar' => $pacar,
    'mantan' => $mantan
    ];
    $_SESSION['flash_error'] = 'Data gagal diperbaharui. Silakan coba lagi.';
    redirect_ke('edit_pengunjung.php?cid='. (int)$cid);
  }
  #tutup statement
  mysqli_stmt_close($stmt);

  redirect_ke('edit_pengunjung.php?cid='. (int)$cid);