<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function create()
    {
        return view('slajder.add_slajder');
    }

    public function store(Request $request)
    {
        $slajder = Slider::create($this->validateRequest());
        $this->storeImage($slajder);
        return redirect('/slajder')->withInput()->withErrors(['poruka' => 'Slajder je uspešno dodat!']);
    }

    public function edit(Slider $slider){
        return view('slajder.edit_slajder', compact('slider'));
    }


    public function update(Request $request, Slider $slider)
    {

        $slider->update($this->validateRequest());

        if(request()->has('slika')){
            Storage::delete('public/' . $slider->slika);
        }
        $this->storeImage($slider);

        return redirect('/slajder')->withErrors(['poruka' => 'Slajder je uspešno izmenjen!']);
    }

    public function destroy(Slider $slider)
    {
        $slider->delete();
        if($slider->slika){
            Storage::delete('public/' . $slider->slika);
        }
        return redirect('/slajder')->withErrors(['poruka' => 'Slajder je obrisan!']);
    }

    public function status(Slider $slider)
    {
        $slider->update(['aktivan' => ! $slider->aktivan]);
        return back()->withErrors(['poruka' => 'Slajder je aktiviran/deaktiviran!']);
    }

    private function validateRequest(){
        return tap(request()->validate([
            'naziv' => 'required',
            'nad_naslov' => 'string|nullable',
            'naziv_linka' => 'string|nullable',
            'link' => 'string|nullable',
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

    private function storeImage($slajder){
        if(request()->has('slika')){
            
            $slajder->update([
                'slika' => request()->slika->store( '/slike/slajder', 'public'),
            ]);
        }
    }
}
