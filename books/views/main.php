<?php
include "../database.php";
include "../filter.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Все товары</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <main class="main">

        <aside class="aside">
            <h2>Фильтрация</h2>

            <form id="filter-form">
                <div class="filter-group">
                    <label for="genre">Жанр:</label>
                    <select id="genre" name="genre">
                        <option value="">Все</option>
                        <option value="1">Фантастика</option>
                        <option value="2">Научная литература</option>
                        <option value="3">Детектив</option>
                    </select>
                </div>

                <div class="filter-group">
                    <label for="availability">Наличие:</label>
                    <select id="availability" name="availability">
                        <option value="">Все</option>
                        <option value="1">В наличии</option>
                        <option value="0">Нет в наличии</option>
                    </select>
                </div>

                <div class="filter-group">
                    <label for="discount">Скидка:</label>
                    <select id="discount" name="discount">
                        <option value="">Все</option>
                        <option value="1">Со скидкой</option>
                        <option value="0">Без скидки</option>
                    </select>
                </div>

                <button type="submit">Применить фильтры</button>
            </form>
        </aside>

        <div class="container__products">
            <h1 class="main__title">Каталог книг</h1>

            <div id="fon"></div>
            <div id="load"></div>

            <div class="block__cards">
                <?php foreach ($datas as $data): ?>
                    <article class="card__content">
                        <header>
                            <h2 class="card__title"><?= htmlspecialchars($data['name']); ?></h2>
                        </header>
                        <p class="card__notice">
                            <strong>Жанр:</strong> <?= htmlspecialchars($data['notice']); ?>
                        </p>
                        <p class="quantity"><strong>В наличии:</strong> <?= htmlspecialchars($data['quantity']); ?></p>
                        <div class="card__prices">
                            <?php if (htmlspecialchars($data['price_old']) != htmlspecialchars($data['price'])): ?>
                                <span class="card__oldprice"><?= htmlspecialchars($data['price_old']); ?></span>
                            <?php endif; ?>
                            <span class="card__price"><?= htmlspecialchars($data['price']); ?>&#8381;</span>
                        </div>
                        <footer>
                            <a class="card__btn" href="product.php?url=<?= htmlspecialchars($data['url']); ?>">Подробнее</a>
                        </footer>
                    </article>
                <?php endforeach; ?>
    
            </div>

        </div>

    </main>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/script.js"></script>
</body>
</html>