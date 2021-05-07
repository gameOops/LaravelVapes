<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Services\MenuService;

class MenuController extends Controller
{
    /**
     * @var MenuService
     */
    private $menuService;

    public function __construct(MenuService $menuService)
    {

        $this->menuService = $menuService;
    }

    public function getMenu()
    {
        return $this->menuService->getMenu();
    }
}
