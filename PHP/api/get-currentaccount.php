<?php
session_start();
if(isset($_SESSION['email'])) {
    die (json_encode(array('email' => $_SESSION['email'], 'id' => $_SESSION['id'])));
}
else {
    die ('null');
}
?>