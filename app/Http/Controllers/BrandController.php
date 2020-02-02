<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $brands = Brand::all();
         return view('brendovi.brendovi', compact('brands'));
    }

    public function status(Brand $brand){
        $brand->update(['aktivan' => ! $brand->aktivan]);
        return back()->withErrors(['poruka' => 'Brend je aktiviran/deaktiviran!']);
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect('/brendovi')
                    ->withErrors(['poruka' => 'Brend je obrisan!']);
    }
}
