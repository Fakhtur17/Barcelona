<?php include('koneksi.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud GC</title>
    <style type="text/css">
        * {
            font-family: "Trebuchet MS";
        }
        body {
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-transform: uppercase;
            color: salmon;
            text-align: center;
            margin: 20px 0;
        }
        .container {
            width: 90%;
            margin: 0 auto;
        }
        .add-product {
            display: block;
            width: 200px;
            margin: 20px auto;
            background-color: salmon;
            color: white;
            text-align: center;
            padding: 10px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }
        .add-product:hover {
            background-color: #e57373;
        }
        .products {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            gap: 20px;
            margin-top: 20px;
        }
        .product-card {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 10px;
            width: 22%;
            text-align: center;
            padding: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .product-card img {
        width: 100%;
        height: 300px; /* Atur tinggi tetap */
        object-fit: cover; /* Agar gambar tetap proporsional dan terpotong jika perlu */
        border-radius: 5px;
        }
        .product-card h3 {
            font-size: 18px;
            margin: 10px 0;
            color: #333;
        }
        .product-card p {
            font-size: 14px;
            color: #666;
            margin: 5px 0;
        }
        .product-card .price {
            font-size: 16px;
            font-weight: bold;
            color: #e57373;
            margin: 10px 0;
        }
        .product-card .action {
            display: flex;
            justify-content: space-around;
            margin-top: 15px;
        }
        .product-card a {
            background-color: salmon;
            color: white;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
        }
        .product-card a:hover {
            background-color: #e57373;
        }
    </style>
</head>
<body>
    <h1>Data Produk</h1>
    <a href="tambah_produk.php" class="add-product">+ Tambah Produk</a>
    <div class="container">
        <div class="products">
            <?php
                $query = "SELECT * FROM produk ORDER BY id ASC";
                $result = mysqli_query($koneksi, $query);

                if (!$result) {
                    die("Query Error: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
                }

                while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="product-card">
                <img src="gambar/<?php echo $row['gambar_produk']; ?>" alt="<?php echo $row['nama_produk']; ?>">
                <h3><?php echo $row['nama_produk']; ?></h3>
                <p><?php echo substr($row['deskripsi'], 0, 50); ?>...</p>
                <p class="price">Rp <?php echo number_format($row['harga_jual'], 0, ',', '.'); ?></p>
                <div class="action">
                    <a href="edit_produk.php?id=<?php echo $row['id']; ?>">Edit</a>
                    <a href="proses_hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin ingin menghapus produk ini?')">Hapus</a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>
