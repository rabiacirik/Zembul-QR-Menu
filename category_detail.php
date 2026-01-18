<?php
include 'db.php';

// URL'den kategori ID'sini alıyoruz
$category_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Kategori adını çekiyoruz
$cat_query = $conn->query("SELECT name FROM categories WHERE id = $category_id");
$category = $cat_query->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $category['name']; ?> | Zembul Kafe</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="detail-page">

    <div class="container">
        <header class="category-header">
            <div class="header-card">
                <a href="menu.php" class="back-btn-top"><i class="fas fa-chevron-left"></i></a>

                <h1 class="logo-text">Zembul Kafe</h1>
                <p class="subtitle">Kadın Emeği Kooperatifi</p>

                <h2 class="selection-title"><?php echo $category['name']; ?></h2>
            </div>
        </header>

        <div class="product-list">
            <?php
            // Sadece seçili kategoriye ait ürünleri çekiyoruz
            $products = $conn->query("SELECT * FROM menu_items WHERE category_id = $category_id");

            if ($products->num_rows > 0):
                while ($item = $products->fetch_assoc()): ?>
                    <div class="product-card">
                        <div class="product-img">
                            <img src="images/<?php echo $item['image_url']; ?>" alt="<?php echo $item['title']; ?>" onerror="this.src='https://via.placeholder.com/150'">
                        </div>
                        <div class="product-info">
                            <h3><?php echo $item['title']; ?></h3>
                            <p><?php echo $item['description']; ?></p>
                            <span class="price"><?php echo number_format($item['price'], 0, ',', '.'); ?> TL</span>
                        </div>
                    </div>
                <?php endwhile;
            else: ?>
                <p class="no-item">Bu kategoride henüz ürün bulunmuyor.</p>
            <?php endif; ?>
        </div>

        <footer class="menu-footer">
            <a href="menu.php" class="back-link">
                <i class="fas fa-arrow-left"></i> Kategorilere Dön
            </a>
        </footer>
    </div>

</body>

</html>