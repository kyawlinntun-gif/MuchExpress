<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use App\Rules\RestoCategoryValidate;
use App\Services\MenuService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    public function index($id)
    {
        $restoId = $id;
        $menusService = new MenuService;
        $menus = $menusService->getMenuWithCategory($restoId);

        return view('menu.menu-index', [
            'resto_id' => $restoId,
            'menus' => $menus
        ]);

    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'resto_id' => 'required|numeric',
            'item' => 'required',
            'price' => 'required|numeric',
            'category' => ['required', new RestoCategoryValidate(request('resto_id'))],
            'description' => 'required|min:3'
        ]);

        $category = Category::where('resto_id', $request->resto_id)->where('name', $request->category)->first();

        $menus = Menu::create([
            'name' => $request->item,
            'description' => $request->description,
            'price' => $request->price,
            'resto_id' => $request->resto_id,
            'category_id' => $category->id
        ]);

        return $menus;
    }
}
