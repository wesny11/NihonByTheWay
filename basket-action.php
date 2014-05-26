<?php

include('basket.class.php');
session_start();
if (isset($_SESSION['user'])) {
    $Cart = new Basket($_SESSION['user']);

    if ( isset($_GET['id']) && isset($_GET['ime']) && isset($_GET['cena']) && isset($_GET['izbira']) ) {
        $quantity = $Cart->getItemQuantity($_GET['id']) + 1;
        $Cart->setItem($_GET['id'], $_GET['ime'], ($_GET['izbira']<5?'hrana':'pijaca'), $_GET['cena'], $quantity);
    } else {
        if ( isset($_GET['id']) && isset($_GET['quantity']) ) {
            $Cart-setItemQuantity($_GET['id'], $_GET['quantity']);
        }

        if (isset($_GET['remove'])) {
            $Cart->setItemQuantity($_GET['remove'], 0);
        }
    }

    $Cart->save();

    header('Location: basket.php');
}

?>