<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengolahan Nama Keluarga</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; }
        form { margin: 20px; }
        input, button { padding: 10px; margin: 5px; }
        .result { margin-top: 20px; font-weight: bold; }
    </style>
</head>
<body>

    <h2>Pengolahan Nama</h2>
    
    <form method="POST">
        <input type="text" name="nama" placeholder="Masukkan Nama" required>
        <button type="submit">Proses</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST["nama"];
        
        // Daftar nama
        $namaArray = [
            "Jisoo", "Jennie", "Rose", "Lisa", 
            "Mingyu", 
            "Carmello Berandra Jasintha Patianom", "Carmello" 
        ];

        // 1. Cek apakah nama ada di dalam array
        if (in_array($nama, $namaArray)) {
            echo "<div class='result'>Nama '$nama' ditemukan dalam daftar.</div>";
        } else {
            echo "<div class='result'>Nama '$nama' tidak ditemukan dalam daftar.</div>";
        }

        // 2. Jumlah kata dan jumlah huruf
        $jumlahKata = str_word_count($nama);
        $jumlahHuruf = strlen(str_replace(' ', '', $nama));

        // 3. Nama kebalikan
        $namaTerbalik = strrev($nama);

        // 4. Jumlah vokal dan konsonan
        $vokal = preg_match_all('/[aeiouAEIOU]/', $nama);
        $konsonan = $jumlahHuruf - $vokal;

        echo "<div class='result'>Jumlah kata: $jumlahKata</div>";
        echo "<div class='result'>Jumlah huruf (tanpa spasi): $jumlahHuruf</div>";
        echo "<div class='result'>Nama terbalik: $namaTerbalik</div>";
        echo "<div class='result'>Jumlah vokal: $vokal</div>";
        echo "<div class='result'>Jumlah konsonan: $konsonan</div>";
    }
    ?>

</body>
</html>
