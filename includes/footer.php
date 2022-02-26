<footer>
    <div>
        <?php
        $footerNav = MenuQuery::getMenuItems('footer', $pdo);
        echo Menu::display($footerNav);
        ?>
    </div>
    <div>&copy; 2022 All rights reserved.</div>
</footer>
</body>

</html>