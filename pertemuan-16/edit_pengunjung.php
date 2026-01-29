<?php
  session_start();
  require 'koneksi.php';
  require 'fungsi.php';

  /*
    Ambil nilai cid dari GET dan lakukan validasi untuk 
    mengecek cid harus angka dan lebih besar dari 0 (> 0).
    'options' => ['min_range' => 1] artinya cid harus ≥ 1 
    (bukan 0, bahkan bukan negatif, bukan huruf, bukan HTML).
  */
  $cid = filter_input(INPUT_GET, 'cid', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
  ]);
  /*
    Skrip di atas cara penulisan lamanya adalah:
    $cid = $_GET['cid'] ?? '';
    $cid = (int)$cid;

    Cara lama seperti di atas akan mengambil data mentah 
    kemudian validasi dilakukan secara terpisah, sehingga 
    rawan lupa validasi. Untuk input dari GET atau POST, 
    filter_input() lebih disarankan daripada $_GET atau $_POST.
  */

  /*
    Cek apakah $cid bernilai valid:
    Kalau $cid tidak valid, maka jangan lanjutkan proses, 
    kembalikan pengguna ke halaman awal (read.php) sembari 
    mengirim penanda error.
  */
  if (!$cid) {
    $_SESSION['flash_error'] = 'Query tidak benar.';
    redirect_ke('read_pengunjung.php');
  }

  /*
    Ambil data lama dari DB menggunakan prepared statement, 
    jika ada kesalahan, tampilkan penanda error.
  */
  $stmt = mysqli_prepare($conn, "SELECT cid, nkode_pengunjung, nnama_pengunjung, nalamat_rumah,	ntanggal_kunjungan,	nhobi, nasal_SLTA,	npekerjaan,	nnama_orang_tua, nnama_pacar, nnama_mantan	

                                    FROM tbl_biodata_pengunjung WHERE cid = ? LIMIT 1");
  if (!$stmt) {
    $_SESSION['flash_error'] = 'Query tidak benar.';
    redirect_ke('read_pengunjung.php');
  }

  mysqli_stmt_bind_param($stmt, "i", $cid);
  mysqli_stmt_execute($stmt);
  $res = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_assoc($res);
  mysqli_stmt_close($stmt);

  if (!$row) {
    $_SESSION['flash_error'] = 'Record tidak ditemukan.';
    redirect_ke('read_pengunjung.php');
  }

  #Nilai awal (prefill form)
  $kodepen  = $row['nkode_pengunjung'] ?? '';
  $nama = $row['nnama_pengunjung'] ?? '';
  $alamat = $row['nalamat_pengunjung'] ?? '';
  $tanggal = $row['ntanggal_kunjungan'] ?? '';
  $hobi = $row['nhobi'] ?? '';
  $slta = $row['nasal_SLTA'] ?? '';
  $pekerjaan = $row['npekerjaan'] ?? '';
  $ortu = $row['nnama_orang_tua'] ?? '';
  $pacar = $row['nnama_pacar'] ?? '';
  $mantan = $row['nnama_mantan'] ?? '';

  #Ambil error dan nilai old input kalau ada
  $flash_error = $_SESSION['flash_error'] ?? '';
  $old_pengunjung = $_SESSION['old_pengunjung'] ?? [];
  unset($_SESSION['flash_error'], $_SESSION['old_pengunjung']);
  if (!empty($old_pengunjung)) {

    $kodepen = $old_pengunjung['kodepen']?? $kodepen;
    $nama = $old_pengunjung['nama']?? $nama;
    $tempat = $old_pengunjung['alamat']?? $alamat;
    $tanggal = $old_pengunjung['tanggal']?? $tanggal;
    $hobi = $old_pengunjung['hobi']?? $hobi;
    $slta = $old_pengunjung['slta']?? $slta;
    $pekerjaan = $old_pengunjung['pekerjaan']?? $pekerjaan;
    $ortu = $old_pengunjung['ortu']?? $ortu;
    $pacar = $old_pengunjung['pacar']?? $pacar;
    $mantan = $old_pengunjung['mantan']?? $mantan;
  }
?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Judul Halaman</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <header>
      <h1>Ini Header</h1>
      <button class="menu-toggle" id="menuToggle" aria-label="Toggle Navigation">
        &#9776;
      </button>
      <nav>
        <ul>
          <li><a href="#home">Beranda</a></li>
          <li><a href="#about">Tentang</a></li>
          <li><a href="#contact">Kontak</a></li>
        </ul>
      </nav>
    </header>

    <main>
      <section id="pengunjung">
        <h2>Edit Buku Tamu</h2>
        <?php if (!empty($flash_error)): ?>
          <div style="padding:10px; margin-bottom:10px; 
            background:#f8d7da; color:#721c24; border-radius:6px;">
            <?= $flash_error; ?>
          </div>
        <?php endif; ?>
        <form action="proses_update_pengunjung.php" method="POST">

          <input type="hidden" name="cid" value="<?= (int)$cid; ?>">

          <span>Kode Pengunjung</span>
            <input type="text" name="txtKodePen" 
              placeholder="Masukkan kode pengunjung"
              value="<?= htmlspecialchars($KodePen); ?>"
              required>
          </label>

          <label>
        <span>Nama Pengunjung:</span>
            <input type="text" name="txtNmPengunjung" 
              placeholder="Masukkan nama pengunjung" 
              value="<?= htmlspecialchars($nama);?>"
              required>
          </label>

          <label>
          <span>Alamat pengunjung</span>
            <input type="text" name="txtAlRmh" 
              placeholder="Masukkan alamat" 
              value="<?= htmlspecialchars($alamat);?>"
              required>
          </label>
         
         <label>
          <span>Tanggal</span>
            <input type="text" name="txtTglKunjungan" 
              placeholder="Masukkan tanggal kunjungan" 
              value="<?= htmlspecialchars($tanggal);?>"
              required>
        </label>

     <label>
          <span>Asal sekolah</span>
            <input type="text" name="txtAsalSMA" 
              placeholder="Masukkan asal sekolah" 
              value="<?= htmlspecialchars($slta);?>"
              required>
        </label>
         
          <label>
          <span>Pekerjaan</span>
            <input type="text" name="txtKerja" 
              placeholder="Masukkan pekerjaan" 
              value="<?= htmlspecialchars($pekerjaan);?>"
              required>
        </label>

        <label>
          <span>Nama Orang Tua</span>
            <input type="text" name="txtNmOrtu" 
              placeholder="Masukkan nama orang tua" 
              value="<?= htmlspecialchars($ortu);?>"
              required>
        </label>
          
       <label>
          <span>Nama Pacar</span>
            <input type="text" name="txtNmPacar" 
              placeholder="Masukkan nama pacar" 
              value="<?= htmlspecialchars($pacar);?>"
              required>
        </label>

          <label>
          <span>Nama Mantan</span>
            <input type="text" name="txtNmMantan" 
              placeholder="Masukkan nama mantan" 
              value="<?= htmlspecialchars($mantan);?>"
              required>
        </label>

         

          <button type="submit">Kirim</button>
          <button type="reset">Batal</button>
          <a href="read_biodata.php" class="reset">Kembali</a>
        </form>
      </section>
    </main>

    <script src="script.js"></script>
  </body>
</html>