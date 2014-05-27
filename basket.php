<?php
    ini_set('display_startup_errors',1);
    ini_set('display_errors',1);
    error_reporting(-1);
?>
<?php
    include('mysql-connection.php');
    include('basket.class.php');
    session_start();

    if (isset($_SESSION['user'])) {
        $Basket = new Basket($_SESSION['user']);
    } else {
        $Basket = new Basket('temp');
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Košarica - 日本ByTheWay</title>
    <link rel="stylesheet" href="styles/normalize.css">
    <link rel="stylesheet" href="styles/main.css">
    <script src="scripts/jquery-1.11.1.min.js"></script>
    <script src="scripts/basket.js"></script>
</head>
<body>
    <header class="main-header">
        <?php include('main-header.php'); ?>
    </header>

    <div class="main-content">
        <div class="row">
            <h1>Košarica</h1>
                <?php if ($Basket->hasItems()): ?>
                <form action="basket-action.php" method="get">
                    <table class="basket">
                        <tr>
                            <th>Količina</th>
                            <th>Izdelek</th>
                            <th>Cena</th>
                            <th>Skupaj</th>
                            <th>Izbriši</th>
                        </tr>
                        <?php
                            $total_price = $i = 0;
                            foreach ($Basket->getItems() as $id => $item):
                                $total_price += $item['quantity']*$item['price'];
                        ?>
                        <?php echo $i++%2==0 ? '<tr>' : '<tr class="odd">'; ?>
                            <td class="quantity"><input type="text" name="quantity[<?php echo $id; ?>]" size="1" value="<?php echo $item['quantity']; ?>" tabindex="<?php echo $i; ?>" /></td>
                            <td class="item-name"><?php echo $item['name']; ?></td>
                            <td class="price"><?php echo $item['price'].'€'; ?></td>
                            <td class="extended-price"><?php echo $item['price']*$item['quantity'].'€'; ?></td>
                            <td class="remove"><input type="checkbox" name="remove[]" value="<?php echo $id; ?>"></td>
                        </tr>
                        <?php endforeach; ?>
                        <tr><td colspan="4"></td><td id="total-price"><?php echo $total_price." €"; ?></td></tr>
                    </table>
                    <input class="big-red" type="submit" name="update" value="Posodobi košarico">
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