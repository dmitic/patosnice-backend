<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function create()
    {
        return view('brendovi.add_brend');
    }

    public function edit(Brand $brand){
        return view('brendovi.edit_brend', compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {

        $brand->update($this->validateRequest());

        if(request()->has('slika')){
            Storage::delete('public/' . $brand->slika);
        }
        $this->storeImage($brand);

        return redirect('/brendovi')->withErrors(['poruka' => 'Brend je uspešno izmenjen!']);
    }

    public function store(Request $request)
    {
        $brend = Brand::create($this->validateRequest());
        $this->storeImage($brend);
        return redirect('/brendovi')->withInput()->withErrors(['poruka' => 'Brend je uspešno dodat!']);
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();
        if($brand->slika){
            Storage::delete('public/' . $brand->slika);
        }
        return redirect('/brendovi')
                    ->withErrors(['poruka' => 'Brend je obrisan!']);
    }

    public function status(Brand $brand){
        $brand->update(['aktivan' => ! $brand->aktivan]);
        return back()->withErrors(['poruka' => 'Brend je aktiviran/deaktiviran!']);
    }

    private function validateRequest(){
        return tap(request()->validate([
            'naziv' => 'required',
            'slug' => 'string|nullable',
            'redosled' => 'numeric',
            'aktivan' => 'required|max:1',
        ]), function(){

            if(request()->hasFile('slika')){
                request()->validate([
                    'slika' => 'file|image|max:2048',
                    // 'slika' => 'file|image|max:2048|dimensions:max_width=870,max_height=380',
                ]);
            }
        });
    }

    private function storeImage($brend){
        if(request()->has('slika')){
            
            $brend->update([
                'slika' => request()->slika->store( '/slike/brendovi', 'public'),
            ]);
        }
    }
}
