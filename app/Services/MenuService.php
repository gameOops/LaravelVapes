<?php


namespace App\Services;

use App\Menu;

class MenuService
{
    public function getMenu() {
        return Menu::with('childs')->get();
    }
}
