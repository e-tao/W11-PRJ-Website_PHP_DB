<?php
require_once './includes/dbConn.php';

require_once './includes/model/menu_query.php';
require_once './includes/model/page_query.php';
require_once './includes/model/product_query.php';
require_once './includes/model/user_query.php';
require_once './includes/model/login_query.php';

require_once './includes/menu.php';
require_once './includes/page.php';
require_once './includes/product.php';

$connect = new DbConn();
$pdo = $connect->getPDO();
// $login = new LoginQuery();

$pageName = isset($_GET['p']) ? $_GET['p'] : 'home';
$page = PageQuery::getPageIfExists($pageName, $pdo);
if ($page == null) {
    $pageName = '404';
    $page = PageQuery::getPageIfExists($pageName, $pdo);
}

$products = ProductQuery::getProducts($pdo);
//var_dump($products);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page->getPt() ?></title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <header>
        <p>(Itsy Bitsy Baby Nutrition)</p>
    </header>
    <nav>
        <?php
        echo "<div>";
        $topNav = MenuQuery::getMenuItems('top', $pdo);
        echo Menu::display($topNav);
        echo "</div>";
        echo "<div>";
        $loginNav = MenuQuery::getMenuItems('login', $pdo);
        //$logoutNav = MenuQuery::getMenuItems('logout',$pdo);
        
        if(isset($_COOKIE['username'])){
            $loginUser = $_COOKIE['username'];
            echo "<div id=\"welcome\">";
            echo "Welcome {$loginUser}";
            echo "</div>";  
        }
        else{
            echo Menu::display($loginNav);
        }
        ?>
    </nav>