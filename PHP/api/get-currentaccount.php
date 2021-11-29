<?php
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['id'])) {
    die (json_encode(array('username' => $_SESSION['username'], 'id' => $_SESSION['id'])));
}
else {
    die ('null');
}
?>