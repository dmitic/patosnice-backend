<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $proizvodjaci = Category::all();
         return view('proizvodjaci.proizvodjaci', compact('proizvodjaci'));
    }

    public function create()
    {
        return view('proizvodjaci.add_proizvodjac');
    }

    public function store(Request $request)
    {
        $proizvodjac = Category::create($this->validateRequest());
        $this->storeImage($proizvodjac);
        return redirect('/proizvodjaci')->withInput()->withErrors(['poruka' => 'Proizvođač je uspešno dodat!']);
    }

    public function edit(Category $proizvodjac){
        return view('proizvodjaci.edit_proizvodjac', compact('proizvodjac'));
    }

    public function update(Request $request, Category $proizvodjac)
    {
        if(!$request->aktivan){
            try {
                DB::beginTransaction();
                foreach($proizvodjac->proizvodi as $proizvod){
                    $proizvod->update(['aktivan' => false]);
                }
                $proizvodjac->update($this->validateRequest());
                if(request()->has('slika')){
                    Storage::delete('public/' . $proizvodjac->slika);
                    $this->storeImage($proizvodjac);
                }
                DB::commit();
                return redirect('/proizvodjaci')->withErrors(['poruka' => 'Proizvođač je uspešno izmenjen!']);
            } catch(\Exception $e){
                DB::rollback();
                return back()->withErrors(['poruka' => 'Došlo je do greške, pokušajte ponovo!']);
            }
        }

        $proizvodjac->update($this->validateRequest());

        if(request()->has('slika')){
            Storage::delete('public/' . $proizvodjac->slika);
        }
        $this->storeImage($proizvodjac);

        return redirect('/proizvodjaci')->withErrors(['poruka' => 'Proizvođač je uspešno izmenjen!']);
    }


    public function status(Category $proizvodjac){

        try {
            DB::beginTransaction();
            foreach($proizvodjac->proizvodi as $proizvod){
                $proizvod->update(['aktivan' => false]);
                // automatski aktivira sve proizvode reaktivacijom proizvođača
                // $proizvod->update(['aktivan' => ! $proizvod->aktivan]);
            }
            $proizvodjac->update(['aktivan' => ! $proizvodjac->aktivan]);
            DB::commit();
            return back()->withErrors(['poruka' => 'Proizvođač je aktiviran/deaktiviran!']);
        } catch(\Exception $e){
            DB::rollback();
            return back()->withErrors(['poruka' => 'Došlo je do greške, pokušajte ponovo!']);
        }

        // samo zabranjuje deaktiviranje ako ima proizvoda
        // if(!count($proizvodjac->proizvodi) > 0){
        //     $proizvodjac->update(['aktivan' => ! $proizvodjac->aktivan]);
        //     return back()->withErrors(['poruka' => 'Proizvođač je aktiviran/deaktiviran!']);
        // } else {
        //     return back()->withErrors(['poruka' => 'Ne možete deaktivirati proizvođača dok ima proizvode!']);
        // }
    }

    public function destroy(Category $proizvodjac)
    { 
        try {
            $proizvodjac->delete();
            if($proizvodjac->slika){
                Storage::delete('public/' . $proizvodjac->slika);
            }
            return redirect('/proizvodjaci')
                        ->withErrors(['poruka' => 'Proizvođač je obrisan!']);
        } catch (\Exception $e){
            return back()->withErrors(['poruka' => 'Ne možete obrisati proizvođača dok postoje njegovi proizvodi na sajtu']);
        }
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

    private function storeImage($proizvodjac){
        if(request()->has('slika')){
            
            $proizvodjac->update([
                'slika' => request()->slika->store( '/slike/proizvodjaci', 'public'),
            ]);
        }
    }
}
