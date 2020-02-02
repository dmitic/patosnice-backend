@extends('layouts.app')

@section('title')
    {{'Izmena Proizvođača'}}
@endsection

@section('active_proizvodjaci')
{{'active'}}
@endsection

@section('podnaslov')
    {{ 'Izmena proizvođača' }}
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
              <h3>Izmeni brend: {{ $proizvodjac->naziv }}</h3>
              </div>
              <!-- /widget-header -->
              <div class="widget-content">
                <legend>Izmeni</legend>
                <form action="{{ route('izmeni_proizvodjaca', ['proizvodjac' => $proizvodjac]) }}" method="post" enctype="multipart/form-data">
                  @csrf
                <div class="row">
                  <div class="span6">
                    <label for="naziv"><span class="required">* </span>Naziv:</label>
                      <input id="naziv" type="text" name="naziv" class="span6" value="{{ $proizvodjac->naziv ?? old('naziv') }}" required>
                      @error('naziv')
                        <p class="greska"><small>{{ $message }}</small></p>
                      @enderror
                    <label for="slug">Slug:</label>
                      <input id="slug" type="text" name="slug" class="span6" value="{{ $proizvodjac->slug ?? old('slug') }}">
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
                    <br>
                    @if ($proizvodjac->slika)
                      <img src="{{ asset('/storage/' . $proizvodjac->slika) }}" style="max-height:100px; max-width:100%;">
                    @endif
                    <label for="redosled"><span class="required">* </span>Redosled:</label>
                      <input id="redosled" type="text" name="redosled" class="span1" value="{{ $proizvodjac->redosled ?? old('redosled') }}">
                      @error('redosled')
                      <p class="greska"><small>{{ $message }}</small></p>
                      @enderror
                    <label for="">Aktivan</label>
                    <label class="radio"> 
                        <input type="radio" name="aktivan" value="1" {{$proizvodjac->aktivan ? 'checked' : ''}}> Da </label> 
                    <label class="radio"> 
                        <input type="radio" name="aktivan" value="0" {{!$proizvodjac->aktivan ? 'checked' : ''}}> Ne </label>
                    <p style="color:red;font-size:12px;" class="help-blok">Ukoliko proizvođač ima aktivne proizvode i deaktivirate ga, automatski deaktivirate sve njegove proizvode!</p>
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



  