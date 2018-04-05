<?php
declare(strict_types=1);

class Breadcrumb
{
    private $menu;

    public function setMenu($menu)
    {
        $this->menu = $menu;
    }

    public function getBreadcrumb($currentPage)
    {
        return [];
    }
}
