<?php
include "../database.php";
include "../filter.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Таблица всех товаров</title>
    
    <link rel="stylesheet" href="../css/table.css">
</head>
<body>
    <main>
        <h1 class="main__title">Таблица со всеми товарами</h1>

        <table class="table mt-3" id="dataTable"> 
            <thead class="thead"> 
                <tr> 
                    <th>id</th> 
                    <th>Название</th>  
                    <th>Артикул</th> 
                    <th>Старая цена</th> 
                    <th>Цена</th> 
                    <th>Справка</th> 
                    <th>Описание</th> 
                    <th>Количество</th> 
                </tr> 
            </thead> 
            <tbody> 
            <?php foreach ($datas as $data): ?>
                <tr class="tr">
                    <td><?= htmlspecialchars($data['id']); ?></td>
                    <td><?= htmlspecialchars($data['name']); ?></td>
                    <td><?= htmlspecialchars($data['articul']); ?></td>
                    <td><?= htmlspecialchars($data['price_old']); ?></td>
                    <td><?= htmlspecialchars($data['price']); ?></td>
                    <td><?= htmlspecialchars($data['notice']); ?></td>
                    <td><?= htmlspecialchars($data['content']); ?></td>
                    <td><?= htmlspecialchars($data['quantity']); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody> 
        </table> 
    </main>

    
</body>
</html>