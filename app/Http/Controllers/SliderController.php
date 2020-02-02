<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $slajderi = Slider::all();
         return view('slajder.slajder', compact('slajderi'));
    }



    public function status(Slider $slider){
        $slider->update(['aktivan' => ! $slider->aktivan]);
        return back()->withErrors(['poruka' => 'Slajder je aktiviran/deaktiviran!']);
    }

    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect('/slajder')
                    ->withErrors(['poruka' => 'Slajder je obrisan!']);
    }
}
