<?php

class Page
{

    private $pageTitle;
    private $pageName;
    private $pageContent;

    public function __construct($pageTitle, $pageName, $pageContent)
    {
        $this->pageTitle = $pageTitle;
        $this->pageName = $pageName;
        $this->pageContent = $pageContent;
    }

    public function getPt()
    {
        return $this->pageTitle;
    }

    public function getPn()
    {
        return $this->pageName;
    }

    public function getPc()
    {
        return $this->pageContent;
    }
}
