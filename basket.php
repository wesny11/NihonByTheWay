<?php
    ini_set('display_startup_errors',1);
    ini_set('display_errors',1);
    error_reporting(-1);
?>
<?php
    include('mysql-connection.php');
    include('basket.class.php');
    session_start();    

    if (isset($_GET['add'])) {
        $id = substr($_GET['add'], 1);
        $izbira = $_GET['add'][0];

        $Cart = new Basket('basket');

        if ($izbira < 5) {
            $result = mysqli_query($connection, 'SELECT * FROM Hrana WHERE HranaID='.$id);
            $item = mysqli_fetch_array($result);
            $Cart->setItem($item['HranaID'], $item['Ime'], 'hrana', $item['Cena'], 1);
        } else {
            $result = mysqli_query($connection, 'SELECT * FROM Pijaca WHERE PijacaID='.$id);
            $item = mysqli_fetch_array($result);
            $Cart->setItem($item['PijacaID'], $item['Ime'], 'pijaca', $item['Cena'], 1);
        }
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Košarica - 日本ByTheWay</title>
    <link rel="stylesheet" href="styles/normalize.css">
    <link rel="stylesheet" href="styles/main.css">
</head>
<body>
    <header class="main-header">
        <?php include('main-header.php'); ?>
    </header>

    <div class="main-content">
        <div class="row">
            <h1>Košarica</h1>
                <?php if ($Cart->hasItems()): ?>
                <form action="basket-action.php" method="get">
                    <table class="basket">
                        <tr>
                            <td>Količina</td>
                            <td>Izdelek</td>
                            <td>Cena</td>
                            <td>Skupaj</td>
                            <td>Izbriši</td>
                        </tr>
                        <?php
                            $total_price = 0;
                            echo $Cart->getItemName($id);
                            //$total_price += $Cart->getItemQuantity($id)*$Cart->getItemPrice($id);
                        ?>
                    </table>
                </form>
                <?php else: ?>
                    <p class="center">Vaša košarica je prazna.</p>
                <?php endif; ?>
        </div>      
    </div>

    <footer class="main-footer">
        <?php include('main-footer.php'); ?>
    </footer>
</body>
</html>
<?php mysqli_close($connection); ?>