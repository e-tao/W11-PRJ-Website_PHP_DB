<?php
include './includes/header.php';
?>

<main>
    <?php
    if($page->getPn()=='shop'){
        echo Product::display($products);
    } else {
        echo "<div id=\"p{$page->getPn()}\">{$page->getPc()}</div>";
    }
    
    ?>
</main>


<?php
include './includes/footer.php';
