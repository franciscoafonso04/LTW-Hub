<?php
declare(strict_types = 1);

session_start();

require_once('../../database/connection.db.php');
require_once('../../database/users.class.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if (isset($_POST['name']) && !empty($_POST['name'])) {
        $name = filter_var(trim($_POST['name']), FILTER_UNSAFE_RAW);

        if ($name !== '') {
            try {
                $db = getDatabaseConnection();
                Users::removeAdmin($db, $name);
                $_SESSION['success_message'] = 'User demoted from admin successfully.';
            } catch (PDOException $e) {
                $_SESSION['error_message'] = 'Database error: ' . $e->getMessage();
            }
        } else {
            $_SESSION['error_message'] = 'Invalid username.';
        }
    } else {
        $_SESSION['error_message'] = 'Username is required.';
    }
} else {
    $_SESSION['error_message'] = 'Invalid request method.';
}

header('Location: ' . htmlspecialchars($_SERVER['HTTP_REFERER']));
exit;
?>
