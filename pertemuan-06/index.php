<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuriza</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
  <h1>Ini adalah header</h1>
   <button class="menu-toggle" id="menu-toggle" aria-label="Toggle navigation">
    &#9776;
  </button>
        <nav>
            <ul>
            <li><a href="#Home">Beranda</a></li>
            <li><a href="#About">Tentang</a></li>
            <li><a href="#Contact">Kontak</a></li>
          </ul>
    </nav>
  </header>
  <main>
    <section id="Home">
        <h2>Selamat Datang</h2>
        <p>Ini contoh paragraf HTML secara simpel.</p>
    </section>
    <section id="About">
      <?php
      $NIM="2522500072";
      $Nama="Nuriza Rahmatullah";
      $Tempatlahir="Jebus";
      $Tanggallahir="09 September 2006";
      $Hobi="Memasak";
      $Pasangan="Lajang";
      $Programstudi="Sistem Informasi";
      $Pekerjaan="Mahasiswa";
      $Namaayah="Suwanto";
      $Namaibu="Samsuriana";
      $Namakakak="An Nisa Pratiwi";
      $Namaadik="-";
      ?>
    <h2>Tentang Kami</h2>
        <p><strong>Nim              : </strong><?php echo $NIM; ?></p>
        <p><strong>Nama             : </strong><?php echo $Nama; ?></p>
        <p><strong>Tempat Lahir     : </strong><?php echo $Tanggallahir; ?></p>
        <p><strong>Tanggal Lahir    : </strong><?php echo $Tanggallahir; ?></p>
        <p><strong>Hobi             : </strong><?php echo $Hobi; ?></p>
        <p><strong>Pasangan         : </strong><?php echo $Pasangan; ?></p>
        <p><strong>Program Studi    : </strong><?php echo $Programstudi; ?></p>
        <p><strong>Pekerjaan        : </strong><?php echo $Pekerjaan; ?></p>
        <p><strong>Nama Ayah        : </strong><?php echo $Namaayah; ?></p>
        <p><strong>Nama Ibu         : </strong><?php echo $Namaibu; ?></p>
        <p><strong>Nama Kakak       : </strong><?php echo $Namakakak; ?></p>
        <p><strong>Nama Adik        : </strong><?php echo $Namaadik; ?></p>
    </section>
     <section id="Contact">
        <h2>Kontak kami</h2>
        <form action="" method="get">
    <label for="txtNama"><span>Nama:</span>
    <input type="text" id="txtNama" name="txtNama" placeholder="Masukkan Nama" required autocomplete="name"></label>

    <label for="txtEmail"><span>Email:</span>
    <input type="text" id="txtEmail" name="txtEmail" placeholder="Masukkan Email" required autocomplete="email"></label>

    <label for="txtPesan"><span>Pesan:</span>
    <textarea id="txtPesan" name="txtPesan" rows="4" placeholder="Tulis Pesan Anda..." required></textarea></label>

    <button type="submit">Kirim</button>
    <button type="reset">Batal</button>
    </section>
  </main>  
  <footer>
    <p>&copy; 2025 Nuriza Rahmatullah [2522500072]</p>
  </footer>
      <script src="script.js"></script>
</body>
</html>  
    