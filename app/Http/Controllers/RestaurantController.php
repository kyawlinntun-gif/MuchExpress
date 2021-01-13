<?php

namespace App\Http\Controllers;

use App\Services\RestoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    public function index(RestoService $restoService)
    {
        $restos = $restoService->userRestoAndTables();

        return view('resto.resto-index', [
            'restos' => $restos
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'location' => 'required|min:3',
            'tables' => 'required|integer'
        ]);

        $resto = Auth::user()->restaurants()->create($request->all());

        return response([
            'resto' => $resto
        ]);
    }
}
