<?php
session_start();

function setSessionMessage($type, $message) {
    $_SESSION['message'] = $message;
    $_SESSION['type'] = $type;
}

function displaySessionMessage() {
    if (isset($_SESSION['message'])) {
        echo "<div class='{$_SESSION['type']}'>{$_SESSION['message']}</div>";
        unset($_SESSION['message']);
        unset($_SESSION['type']);
    }
}
?>
