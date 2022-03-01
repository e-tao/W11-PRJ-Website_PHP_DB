<?php

class MenuQuery
{
    public static function getMenuItems($menuLocation, $pdo)
    {
        $q = $pdo->prepare("SELECT menuText, pageName FROM `menuItem` JOIN page ON page.pageId = menuItem.pageId WHERE menuLocation=:menuLocation ORDER BY menuOrder");
        $q->execute(["menuLocation" => $menuLocation]);

        $menuItems = array();

        while ($row = $q->fetch()) {
            $menuItems[] = new Menu($row['menuText'], $row['pageName']);
        }

        return $menuItems;
    }
}
