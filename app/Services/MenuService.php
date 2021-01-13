<?php

namespace App\Services;

use App\Models\Menu;

class MenuService
{
    public function getMenuWithCategory($restoId)
    {
        return Menu::where('resto_id', $restoId)->orderBy('name', 'asc')->get()->groupBy('category.name');
    }
}