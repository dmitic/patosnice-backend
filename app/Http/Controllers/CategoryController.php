<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            return redirect('/proizvodjaci')
                        ->withErrors(['poruka' => 'Proizvođač je obrisan!']);
        } catch (\Exception $e){
            return back()->withErrors(['poruka' => 'Ne možete obrisati proizvođača dok postoje njegovi proizvodi na sajtu']);
        }
    }
}
