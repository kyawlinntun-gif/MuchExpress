<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use App\Services\MenuService;
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
    public function index(MenuService $service)
    {
        $resto_ids = [1];
        
        $categories = $service->getMenuWithCategory($resto_ids);

        // return ['categories' => $categories];
        // return compact($categories);

        return view('home', [
            'categories' => $categories
        ]);
    }
}
