<?php
session_start();

if (isset($_POST['name']) AND $_POST['name'] != "") {

    if (isset($_SESSION['array_users'])) {
        $user_names = array_keys($_SESSION['array_users']);
    } else {
        $_SESSION['array_users'] = [];
        $user_names = array_keys($_SESSION['array_users']);
    }

    if (!in_array($_POST['name'], $user_names)) {
        $_SESSION['current_user'] = $_POST['name'];
        $current_user = $_SESSION['current_user'];

        $_SESSION['array_users'][$current_user] = 0;

        header('Location: ./../geral/choose.php');
    } else {
        header('Location: ./../geral/login.php?error=2');
    }

} else {
    header('Location: ./../geral/login.php?error=1');
}
?>
