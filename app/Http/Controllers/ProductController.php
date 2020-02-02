<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $products = Product::all();
         return view('proizvodi.proizvodi', compact('products'));
    }

    public function status(Product $proizvod){

        if ($proizvod->proizvodjac_auta->aktivan){
            $proizvod->update(['aktivan' => ! $proizvod->aktivan]);
            return back()->withErrors(['poruka' => 'Proizvod je aktiviran/deaktiviran!']);
        } else {
            return back()->withErrors(['poruka' => 'Ne možete reaktivirati proizvod čiji je proizvođač neaktivan!']);
        }
    }

    public function destroy(Product $proizvod)
    {
        $proizvod->delete();
        return redirect('/proizvodi')
                    ->withErrors(['poruka' => 'Proizvod je obrisan!']);
    }
}
