@extends('layouts.app')

@section('title')
    {{'Dodavanje Proizvođača'}}
@endsection

@section('active_proizvodjaci')
{{'active'}}
@endsection

@section('podnaslov')
    {{ 'Dodavanje proizvođača' }}
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
                <h3>Dodaj proizvođača</h3>
              </div>
              <!-- /widget-header -->
              <div class="widget-content">
                <legend>Dodaj</legend>
                <form action="{{ route('dodaj_proizvodjaca') }}" method="post" enctype="multipart/form-data">
                  @csrf
                <div class="row">
                  <div class="span6">
                    <label for="naziv"><span class="required">* </span>Naziv:</label>
                      <input id="naziv" type="text" name="naziv" class="span6" value="{{ old('naziv') }}" required>
                      @error('naziv')
                      <p class="greska"><small>{{ $message }}</small></p>
                      @enderror
                    <label for="slug">Slug:</label>
                      <input id="slug" type="text" name="slug" class="span6" value="{{ old('slug') }}">
                      @error('slug')
                      <p class="greska"><small>{{ $message }}</small></p>
                      @enderror
                  </div>

                  <div class="span4">
                    <label for="slika">Slika <em>dimenzija 55x55px</em>:</label>
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



  