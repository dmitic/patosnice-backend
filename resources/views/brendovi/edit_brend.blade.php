@extends('layouts.app')

@section('title')
    {{'Izmena Brenda'}}
@endsection

@section('active_brend')
{{'active'}}
@endsection

@section('podnaslov')
    {{ 'Izmena brenda' }}
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
              <h3>Izmeni brend: {{ $brand->naziv }}</h3>
              </div>
              <!-- /widget-header -->
              <div class="widget-content">
                <legend>Izmeni</legend>
                <form action="{{ route('izmeni_brend', ['brand' => $brand]) }}" method="post" enctype="multipart/form-data">
                  @csrf
                <div class="row">
                  <div class="span6">
                    <label for="naziv"><span class="required">* </span>Naziv:</label>
                      <input id="naziv" type="text" name="naziv" class="span6" value="{{ $brand->naziv ?? old('naziv') }}" required>
                      @error('naziv')
                        <p class="greska"><small>{{ $message }}</small></p>
                      @enderror
                    <label for="slug">Slug:</label>
                      <input id="slug" type="text" name="slug" class="span6" value="{{ $brand->slug ?? old('slug') }}">
                      @error('slug')
                        <p class="greska"><small>{{ $message }}</small></p>
                      @enderror
                  </div>

                  <div class="span4">
                    <label for="slika">Slika <em>dimenzija 165x30px</em>:</label>
                    <input type="file" name="slika" id="slika">
                    @error('slika')
                      <p class="greska"><small>{{ $message }}</small></p>
                    @enderror
                    @if ($brand->slika)
                      <img src="{{ asset('/storage/' . $brand->slika) }}" style="max-height:100px; max-width:100%;">
                    @endif
                    <label for="redosled"><span class="required">* </span>Redosled:</label>
                      <input id="redosled" type="text" name="redosled" class="span1" value="{{ $brand->redosled ?? old('redosled') }}">
                      @error('redosled')
                      <p class="greska"><small>{{ $message }}</small></p>
                      @enderror
                    <label for="">Aktivan</label>
                      <label class="radio"> 
                        <input type="radio" name="aktivan" value="1" {{$brand->aktivan ? 'checked' : ''}}> Da </label> 
                      <label class="radio"> 
                        <input type="radio" name="aktivan" value="0" {{!$brand->aktivan ? 'checked' : ''}}> Ne </label>
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



  