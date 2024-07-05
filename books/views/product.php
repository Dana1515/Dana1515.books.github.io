<?php
include "../database.php";

$url = isset($_GET['url']) ? $_GET['url'] : '';
$url = htmlspecialchars($url);

if ($url) {
    $query = $pdo->prepare('SELECT * FROM product WHERE url = :url');
    $query->execute(['url' => $url]);
    $product = $query->fetch(PDO::FETCH_ASSOC);

    if ($product) {
?>
        <!DOCTYPE html>
        <html>
        <head>
            <title><?= htmlspecialchars($product['url']); ?></title>
            <link rel="stylesheet" href="../css/product.css">
        </head>
        <body>
            <button class="btnOnMain"><a href="main.php">Назад</a></button>
            <div class="book">
                <img alt='Картинка книги' src="<?= htmlspecialchars($product['image']); ?>">
                <div class="book__content">

                    <h1>Книга "<?= htmlspecialchars($product['name']); ?>"</h1>

                    <p><strong>Жанр:</strong> <?= htmlspecialchars($product['notice']); ?></p>
                    <p><strong>Описание:</strong> <?= htmlspecialchars($product['content']); ?></p>
                    <p><strong>Код товара:</strong> <?= htmlspecialchars($product['articul']); ?></p>
                    <p><strong>В наличии:</strong> <?= htmlspecialchars($product['quantity']); ?></p>
                    <p><strong>Цена:</strong> <?= htmlspecialchars($product['price']); ?> &#8381;</p>

                </div>
            </div>

        </body>
        </html>

<?php
    } else {
        echo "Товар не найден.";
    }
} else {
    echo "Неверный URL.";
}
?>