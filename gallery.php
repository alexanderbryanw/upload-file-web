<?php

//1. Koneksi DB
$dsn = "mysql:host=localhost;dbname=unimedia_senin";
$pdo = new PDO($dsn, 'root', '');

//2. SQL
$sql = "SELECT * FROM gallery";

//3. Execute
$hasil = $pdo->query($sql);


//4. Hasil query
?>

<table border="1">
    <tr>
        <th>No.</th>
        <th>Judul</th>
        <th>Foto</th>
    </tr>
    <?php
        $i = 0;
        while($row = $hasil->fetch()):
        $i++;
    ?>
    <tr>
        <td><?= $i; ?></td>
        <td><?= $row['judul']; ?></td>
        <td><img src="<?= $row['foto']; ?>" alt="foto"></td>
    <?php endwhile; ?>
    </tr>
</table>