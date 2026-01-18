<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zembul Kafe | Menü Kategorileri</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="category-page">

    <div class="container">
        <header class="category-header">
            <div class="header-card">
                <h1 class="logo-text">Zembul Kafe</h1>
                <p class="subtitle">Kadın Emeği Kooperatifi</p>
                <div class="divider"></div>
                <h2 class="selection-title">Lütfen Bir Kategori Seçiniz</h2>
            </div>
        </header>

        <div class="category-grid">
            <?php
            // Veritabanından kategorileri çekiyoruz
            $result = $conn->query("SELECT * FROM categories");

            // Kategori ikon eşleşmeleri (Veritabanında yoksa buradan atayabiliriz)
            $icons = [
                'Tostlar' => 'fa-bread-slice',
                'Yöresel Yemekler' => 'fa-utensils',
                'Burgerler' => 'fa-hamburger',
                'İçecekler' => 'fa-mug-hot',
                'Salatalar' => 'fa-leaf',
                'Tatlılar' => 'fa-cookie'
            ];

            while ($row = $result->fetch_assoc()):
                $catName = $row['name'];
                $iconClass = isset($icons[$catName]) ? $icons[$catName] : 'fa-star';
            ?>
                <a href="category_detail.php?id=<?php echo $row['id']; ?>" class="category-card">
                    <div class="icon-box">
                        <i class="fas <?php echo $iconClass; ?>"></i>
                    </div>
                    <span class="category-name"><?php echo $catName; ?></span>
                    <i class="fas fa-chevron-right arrow"></i>
                </a>
            <?php endwhile; ?>
        </div>

        <footer class="menu-footer">
            <a href="index.html" class="back-link">
                <i class="fas fa-arrow-left"></i> Ana Sayfaya Dön
            </a>
        </footer>
    </div>

</body>

</html>