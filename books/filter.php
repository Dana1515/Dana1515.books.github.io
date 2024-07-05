<?php
include "../database.php";

function getFilteredProducts($filters) {
    global $pdo;

    $conditions = [];
    $params = [];

    if (isset($filters['discount'])) {
        if ($filters['discount'] == '1') {
            $conditions[] = "price_old != price";
        } elseif ($filters['discount'] == '0') {
            $conditions[] = "price_old = price";
        }
    }

    if (isset($filters['availability'])) {
        if ($filters['availability'] == '1') {
            $conditions[] = "quantity != 0";
        } elseif ($filters['availability'] == '0') {
            $conditions[] = "quantity = 0";
        }
    }

    if (isset($filters['genre']) && in_array($filters['genre'], ['1', '2', '3'])) {
        $conditions[] = "position = :position";
        $params[':position'] = $filters['genre'];
    }

    $sql = "SELECT * FROM product";
    if (!empty($conditions)) {
        $sql .= " WHERE " . implode(" AND ", $conditions);
    }

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll();
}

$filters = [
    'discount' => $_GET['discount'] ?? null,
    'availability' => $_GET['availability'] ?? null,
    'genre' => $_GET['genre'] ?? null
];

$datas=getFilteredProducts($filters);


?>
