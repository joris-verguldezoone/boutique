<?php
// $tab = [$_SESSION['utilisateur'], __DIR__];
if (!isset($_SESSION)) {
    session_start();
}
$value = $_SESSION['utilisateur'];
echo json_encode($value, JSON_FORCE_OBJECT);
