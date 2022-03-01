<?php

class Menu
{
    private $lp;
    private $isActive;
    private $menuText;

    public function __construct($menuText, $lp)
    {
        $this->lp = $lp;
        $this->menuText = $menuText;
        $this->isActive = false;
    }

    public function __toString()
    {
        $class = $this->isActive ? 'active' : 'inactive';
        return "<li class=\"$class\"><a href=\"?p=$this->lp\">$this->menuText</a></li>";
    }

    public static function display($menuItems)
    {
        $currentPage = $_GET['p'];
        $nav = '<ul>';
        foreach ($menuItems as $item) {
            if ($item->lp == $currentPage) {
                $item->isActive = true;
            }
            $nav .= $item;
        }
        $nav .= "</ul>";
        return $nav;
    }
}
