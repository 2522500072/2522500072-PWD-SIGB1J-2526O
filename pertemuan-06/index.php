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
    <section id="ipk">
      <?php
         $namamatkul1='Aplikasi Perkantoran';
        $sksmatkul1='3';
        $nilaihadir1='90';
        $nilaitugas1='60';
        $nilaiuts1='80';
        $nilaiuas1='70';
            $namamatkul2='Logika Informatika';
        $sksmatkul2='3';
        $nilaihadir2='70';
        $nilaitugas2='50';
        $nilaiuts2='60';
        $nilaiuas2='80';
            $namamatkul3='Pengantar Basis Data';
        $sksmatkul3='3';
        $nilaihadir3='80';
        $nilaitugas3='70';
        $nilaiuts3='70';
        $nilaiuas3='90';
            $namamatkul4='Pengantar Teknologi';
        $sksmatkul4='3';
        $nilaihadir4='90';
        $nilaitugas4='90';
        $nilaiuts4='90';
        $nilaiuas4='90';
         $namamatkul5='Pemrograman Web Dasar';
        $sksmatkul5='3';
        $nilaihadir5='80';
        $nilaitugas5='80';
        $nilaiuts5='80';
        $nilaiuas5='80';

        $nilaiAkhir1 = (0.1 * $nilaihadir1) + (0.2 * $nilaitugas1) + (0.3 * $nilaiuts1) + (0.4 * $nilaiuas1);
        $nilaiAkhir2 = (0.1 * $nilaihadir2) + (0.2 * $nilaitugas2) + (0.3 * $nilaiuts2) + (0.4 * $nilaiuas2);
        $nilaiAkhir3 = (0.1 * $nilaihadir3) + (0.2 * $nilaitugas3) + (0.3 * $nilaiuts3) + (0.4 * $nilaiuas3);
        $nilaiAkhir4 = (0.1 * $nilaihadir4) + (0.2 * $nilaitugas4) + (0.3 * $nilaiuts4) + (0.4 * $nilaiuas4);
        $nilaiAkhir5 = (0.1 * $nilaihadir5) + (0.2 * $nilaitugas5) + (0.3 * $nilaiuts5) + (0.4 * $nilaiuas5);


        
      
        if ($nilaihadir1 < 70){ 
                    $grade1="E";
                    $mutu1="0.00";
                    $status1="Gagal";
                } else {
                    if ($nilaiAkhir1>=91){
                $grade1="A";
                $mutu1=4.00;
                $status1="Lulus";
            } elseif 
                ($nilaiAkhir1>=81){
                $grade1="A-";
                $mutu1=3.70;
                $status1="Lulus";
            } elseif 
                ($nilaiAkhir1>=76){
                $grade1="B+";
                $mutu1=3.30;
                $status1="Lulus";
            } elseif 
                ($nilaiAkhir1>=71){
                $grade1="B";
                $mutu1=3.00;
                $status1="Lulus";
            } elseif 
                ($nilaiAkhir1>=66){
                $grade1="B-";
                $mutu1=2.70;
                $status1="Lulus";
            } elseif 
                ($nilaiAkhir1>=61){
                $grade1="C+";
                $mutu1=2.30;
                $status1="Lulus";
            } elseif 
                ($nilaiAkhir1>=56){
                $grade1="C";
                $mutu1=2.00;
                $status1="Lulus";
            } elseif 
                ($nilaiAkhir1>=51){
                $grade1="C-";
                $mutu1=1.70;
                $status1="Lulus";
            } elseif 
                ($nilaiAkhir1>=36){
                $grade1="D";
                $mutu1=1.00;
                $status1="Gagal";
            } elseif
                ($nilaiAkhir1>=0){
                $grade1="E";
                $mutu1=0.00;
                $status1="Gagal";
            }
        }

        if ($nilaihadir2 < 70){ 
            $grade2="E";
            $mutu2="0.00";
            $status2="Gagal";
        } else {
            if ($nilaiAkhir2>=91){
                $grade2="A";
                $mutu2=4.00;
                $status2="Lulus";
            } elseif 
                ($nilaiAkhir2>=81){
                $grade2="A-";
                $mutu2=3.70;
                $status2="Lulus";
            } elseif 
                ($nilaiAkhir2>=76){
                $grade2="B+";
                $mutu2=3.30;
                $status2="Lulus";
            } elseif 
                ($nilaiAkhir2>=71){
                $grade2="B";
                $mutu2=3.00;
                $status2="Lulus";
            } elseif 
                ($nilaiAkhir2>=66){
                $grade2="B-";
                $mutu2=2.70;
                $status2="Lulus";
            } elseif 
                ($nilaiAkhir2>=61){
                $grade2="C+";
                $mutu2=2.30;
                $status2="Lulus";
            } elseif 
                ($nilaiAkhir2>=56){
                $grade2="C";
                $mutu2=2.00;
                $status2="Lulus";
            } elseif 
                ($nilaiAkhir2>=51){
                $grade2="C-";
                $mutu2=1.70;
                $status2="Lulus";
            } elseif 
                ($nilaiAkhir2>=36){
                $grade2="D";
                $mutu2=1.00;
                $status2="Gagal";
            } elseif 
                ($nilaiAkhir2>=0){
                $grade2="E";
                $mutu2=0.00;
                $status2="Gagal";
            }
        }

        if ($nilaihadir3 < 70){ 
            $grade3 = "E";
            $mutu3 = 0.00;
            $status3 = "Gagal";
        } else {
            if ($nilaiAkhir3 >= 91) {
                $grade3 = "A"; $mutu3 = 4.00; $status3 = "Lulus";
            } elseif ($nilaiAkhir3 >= 81) {
                $grade3 = "A-"; $mutu3 = 3.70; $status3 = "Lulus";
            } elseif ($nilaiAkhir3 >= 76) {
                $grade3 = "B+"; $mutu3 = 3.30; $status3 = "Lulus";
            } elseif ($nilaiAkhir3 >= 71) {
                $grade3 = "B"; $mutu3 = 3.00; $status3 = "Lulus";
            } elseif ($nilaiAkhir3 >= 66) {
                $grade3 = "B-"; $mutu3 = 2.70; $status3 = "Lulus";
            } elseif ($nilaiAkhir3 >= 61) {
                $grade3 = "C+"; $mutu3 = 2.30; $status3 = "Lulus";
            } elseif ($nilaiAkhir3 >= 56) {
                $grade3 = "C"; $mutu3 = 2.00; $status3 = "Lulus";
            } elseif ($nilaiAkhir3 >= 51) {
                $grade3 = "C-"; $mutu3 = 1.70; $status3 = "Lulus";
            } elseif ($nilaiAkhir3 >= 36) {
                $grade3 = "D"; $mutu3 = 1.00; $status3 = "Gagal";
            } elseif 
                    ($nilaiAkhir3>= 0) { $grade3 = "E"; $mutu3 = 0.00; $status3 = "Gagal";
            }
        }


         if ($nilaihadir4 < 70){ 
            $grade4 = "E";
            $mutu4 = 0.00;
            $status4 = "Gagal";
        } else {
            if ($nilaiAkhir4 >= 91) {
                $grade4 = "A"; $mutu4 = 4.00; $status4 = "Lulus";
            } elseif ($nilaiAkhir4 >= 81) {
                $grade4 = "A-"; $mutu4 = 3.70; $status4 = "Lulus";
            } elseif ($nilaiAkhir4 >= 76) {
                $grade4 = "B+"; $mutu4 = 3.30; $status4 = "Lulus";
            } elseif ($nilaiAkhir4 >= 71) {
                $grade4 = "B"; $mutu4 = 3.00; $status4 = "Lulus";
            } elseif ($nilaiAkhir4 >= 66) {
                $grade4 = "B-"; $mutu4 = 2.70; $status4 = "Lulus";
            } elseif ($nilaiAkhir4 >= 61) {
                $grade4 = "C+"; $mutu4 = 2.30; $status4 = "Lulus";
            } elseif ($nilaiAkhir4 >= 56) {
                $grade4 = "C"; $mutu4 = 2.00; $status4 = "Lulus";
            } elseif ($nilaiAkhir4 >= 51) {
                $grade4 = "C-"; $mutu4 = 1.70; $status4 = "Lulus";
            } elseif ($nilaiAkhir4 >= 36) {
                $grade4 = "D"; $mutu4 = 1.00; $status4 = "Gagal";
            } elseif ($nilaiAkhir4>=0) {
                $grade4 = "E"; $mutu4 = 0.00; $status4 = "Gagal";
            }
        }


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
    