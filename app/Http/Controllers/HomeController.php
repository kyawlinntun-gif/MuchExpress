<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use App\Services\MenuService;
use App\Services\RestoService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(MenuService $service, RestoService $restoService)
    {
        $resto_id = 1;
        
        $menus = $service->getMenuWithCategory($resto_id);

        // return ['menus' => $menus];
        // return compact($menus);

        $restos = $restoService->userRestoAndTables();

        // dd($resto);

        return view('home', [
            'menus' => $menus,
            'resto_id' => $resto_id,
            'restos' => $restos
        ]);
    }
}
