<?php
declare(strict_types=1);

session_start();

require_once('../database/connection.db.php');
require_once('../database/baskets.class.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['productID'])) {
    $productID = filter_var($_POST['productID'], FILTER_VALIDATE_INT);

    if ($productID !== false && $productID > 0) {
        $db = getDatabaseConnection();

        Baskets::saveCart($db, $_SESSION['user_id'], $productID);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        $_SESSION['error_message'] = 'Invalid product ID.';
    }
}

header("Location: ../code/home.php");
exit();
?>
