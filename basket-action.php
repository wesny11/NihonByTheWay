<?php

include('basket.class.php');
session_start();
$Cart = new Basket($_SESSION['user']);

if ( isset($_GET['id']) && isset($_GET['quantity']) ) {
    $quantity = $Cart->getItemQuantity($_GET['id']) + $_GET['quantity'];
    $Cart->setItemQuantity($_GET['id'], $quantity);
}

if (isset($_GET['remove'])) {
    foreach ($_GET['remove'] as $id) {
        $Cart->setItemQuantity($id, 0);
    }
}

$Cart->save();

header('Location: basket.php');

?>