<?php

include('basket.class.php');
session_start();
if (isset($_SESSION['user'])) {
    $Basket = new Basket($_SESSION['user']);

    if ( isset($_GET['id']) && isset($_GET['ime']) && isset($_GET['cena']) && isset($_GET['izbira']) ) {
        if ($_GET['izbira'] < 5) {
            $quantity = $Basket->getItemQuantity($_GET['id']) + 1;
            $Basket->setItem($_GET['id'], $_GET['ime'], 'hrana', $_GET['cena'], $quantity);
        } else {
            $quantity = $Basket->getItemQuantity('1000' + $_GET['id']) + 1;
            $Basket->setItem('1000' + $_GET['id'], $_GET['ime'], 'hrana', $_GET['cena'], $quantity);
        }
    } else {
        if (isset($_GET['quantity'])) {
            foreach ($_GET['quantity'] as $id => $quantity) {
                $Basket->setItemQuantity($id, $quantity);
            }            
        }

        if (isset($_GET['remove'])) {
            foreach ($_GET['remove'] as $id) {
                $Basket->setItemQuantity($id, 0);
            }            
        }
    }

    $Basket->save();

    header('Location: basket.php');
}

?>