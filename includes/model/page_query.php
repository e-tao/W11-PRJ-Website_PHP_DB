<?php

class PageQuery
{
    public static function getPageIfExists($pageName, $pdo)
    {
        $q = $pdo->prepare("SELECT `pageTitle`, `pageName`, `pageContent` FROM `page` WHERE `pageName`= :pageName;");
        $q->execute(["pageName" => $pageName]);
        
        if ($row = $q->fetch()) {
            //var_dump($row);
            return new Page($row['pageTitle'], $row['pageName'], $row['pageContent']);
        }
        return null;
    }
}
