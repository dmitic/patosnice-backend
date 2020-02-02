@extends('layouts.app')

@section('title')
    {{'Izmena Slajdera'}}
@endsection

@section('active_slajder')
{{'active'}}
@endsection

@section('podnaslov')
    {{ 'Izmena slajdera' }}
@endsection

@section('content')

<body>
  @include('incs.subnavbar')
  <div class="main">
    <div class="main-inner">
      <div class="container">
        <div class="row">

          <div class="span12">

            <div class="widget widget-table action-table">
              <div class="widget-header"> <i class="icon-th-list"></i>
                <h3>Slajderi</h3>
              </div>
              <!-- /widget-header -->
              <div class="widget-content">
                <legend>Izmeni slajder: {{ $slider->naziv }}</legend>
                <form action="{{ route('izmeni_slajder', ['slider' => $slider]) }}" method="post" enctype="multipart/form-data">
                  @csrf
                <div class="row">
                  <div class="span6">
                    <label for="naziv"><span class="required">* </span>Naziv:</label>
                      <input id="naziv" type="text" name="naziv" class="span6" value="{{ $slider->naziv ?? old('naziv') }}" required>
                      @error('naziv')
                      <p class="greska"><small>{{ $message }}</small></p>
                      @enderror
                    <label for="nad_naslov">Nadnaslov:</label>
                      <input id="nad_naslov" type="text" name="nad_naslov" class="span6" value="{{ $slider->nad_naslov ?? old('nad_naslov') }}">
                      @error('nad_naslov')
                      <p class="greska"><small>{{ $message }}</small></p>
                      @enderror
                    <label for="naziv_linka">Naziv linka:</label>
                      <input id="naziv_linka" type="text" name="naziv_linka" value="{{ $slider->naziv_linka ?? old('naziv_linka') }}" class="span3">
                      @error('naziv_linka')
                        <p class="greska"><small>{{ $message }}</small></p>
                      @enderror
                    <label for="link">link:</label>
                      <input id="link" type="text" name="link" class="span5" value="{{ $slider->link ?? old('link') }}">
                      @error('link')
                      <p class="greska"><small>{{ $message }}</small></p>
                      @enderror
                  </div>

                  <div class="span4">
                    <label for="slika">Slika <em>dimenzija 870x380px</em>:</label>
                    <input type="file" name="slika" id="slika">
                    @error('slika')
                      <p class="greska"><small>{{ $message }}</small></p>
                    @enderror
                    @if ($slider->slika)
                      <img src="{{ asset('/storage/' . $slider->slika) }}" style="max-height:100px; max-width:100%;">
                    @endif
                    <label for="redosled"><span class="required">* </span>Redosled:</label>
                      <input id="redosled" type="text" name="redosled" class="span1" value="{{ $slider->redosled ?? old('redosled') }}">
                      @error('redosled')
                      <p class="greska"><small>{{ $message }}</small></p>
                      @enderror
                    <label for="">Aktivan</label>
                      <label class="radio"> 
                        <input type="radio" name="aktivan" value="1" {{$slider->aktivan ? 'checked' : ''}}> Da </label> 
                      <label class="radio"> 
                        <input type="radio" name="aktivan" value="0" {{!$slider->aktivan ? 'checked' : ''}}> Ne </label>
                  </div>

                </div>
                <div class="form-actions">
                  <input type="submit" value="Potvrdi" name="" class="btn btn-primary">
                </div>
              </form>
              </div>
              <!-- /widget-content -->
            </div>

          </div>
          <!-- /span6 -->
        </div>
        <!-- /row -->
      </div>
      <!-- /container -->
    </div>
    <!-- /main-inner -->
  </div>
  <!-- /main -->
  @endsection



  