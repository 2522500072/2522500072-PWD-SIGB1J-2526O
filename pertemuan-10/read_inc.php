<?php
require 'koneksi.php';

$fieldContact = [
    "nama"  => ["label" => "Nama:",       "suffix" => ""],
    "email" => ["label" => "Email:",      "suffix" => ""],
    "pesan" => ["label" => "Pesan Anda:", "suffix" => ""]
];

$sql = "SELECT * FROM tbl_tamu ORDER BY cid DESC";
$q   = mysqli_query($conn, $sql);
?>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Pesan</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($q)): ?>
    <tr>
        <td><?= $row['cid']; ?></td>
        <td><?= htmlspecialchars($row['cnama']); ?></td>
        <td><?= htmlspecialchars($row['cemail']); ?></td>
        <td><?= nl2br(htmlspecialchars($row['cpesan'])); ?></td>
    </tr>
    <?php endwhile; ?>
</table>