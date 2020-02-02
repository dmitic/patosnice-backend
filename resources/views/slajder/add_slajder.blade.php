@extends('layouts.app')

@section('title')
    {{'Dodavanje Slajdera'}}
@endsection

@section('active_slajder')
{{'active'}}
@endsection

@section('podnaslov')
    {{ 'Dodavanje slajdera' }}
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
                <legend>Dodaj</legend>
                <form action="{{ route('dodaj_slajder') }}" method="post" enctype="multipart/form-data">
                  @csrf
                <div class="row">
                  <div class="span6">
                    <label for="naziv"><span class="required">* </span>Naziv:</label>
                      <input id="naziv" type="text" name="naziv" class="span6" value="{{ old('naziv') }}" required>
                      @error('naziv')
                      <p class="greska"><small>{{ $message }}</small></p>
                      @enderror
                    <label for="nad_naslov">Nadnaslov:</label>
                      <input id="nad_naslov" type="text" name="nad_naslov" class="span6" value="{{ old('nad_naslov') }}">
                      @error('nad_naslov')
                      <p class="greska"><small>{{ $message }}</small></p>
                      @enderror
                    <label for="naziv_linka">Naziv linka:</label>
                      <input id="naziv_linka" type="text" name="naziv_linka" value="{{ old('naziv_linka') }}" class="span3">
                      @error('naziv_linka')
                        <p class="greska"><small>{{ $message }}</small></p>
                      @enderror
                    <label for="link">link:</label>
                      <input id="link" type="text" name="link" class="span5" value="{{ old('link') }}">
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
                    <label for="redosled"><span class="required">* </span>Redosled:</label>
                      <input id="redosled" type="text" name="redosled" class="span1" value="{{ old('redosled') }}">
                      @error('redosled')
                      <p class="greska"><small>{{ $message }}</small></p>
                      @enderror
                    <label for="">Aktivan</label>
                      <label class="radio"> 
                        <input type="radio" name="aktivan" value="1" checked="checked"> Da </label> 
                      <label class="radio"> 
                        <input type="radio" name="aktivan" value="0"> Ne </label>
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



  