<?php
include './includes/header.php';
?>

<main>
    <?php
    if($page->getPn()=='shop'){
        if(!isset($_COOKIE['username'])){
            echo "<div id=\"p{$page->getPn()}\">{$page->getPc()}</div>";
        } else{
            echo Product::display($products);
        }
        
    } 
    else {
        echo "<div id=\"p{$page->getPn()}\">{$page->getPc()}</div>";
    }
    ?>
</main>


<?php
include './includes/footer.php';
