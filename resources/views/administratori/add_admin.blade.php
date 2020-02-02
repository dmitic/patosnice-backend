@extends('layouts.app')

@section('title')
    {{'Dodavanje administratora'}}
@endsection

@section('active_dash')
{{'active'}}
@endsection

@section('podnaslov')
    {{ 'Dodavanje admina' }}
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
                <h3>Administratori</h3>
              </div>
              <!-- /widget-header -->
              <div class="widget-content">
                <legend>Dodaj</legend>
                <form action="{{ route('dodaj_admina') }}" method="post">
                  @csrf
                <div class="row">
                  <div class="span6">
                    <label for="name"><span class="required">* </span>Ime i prezime:</label>
                      <input id="name" type="text" name="name" class="span6" value="{{ old('name') }}" required>
                      @error('name')
                      <p class="greska"><small>{{ $message }}</small></p>
                      @enderror
                    <label for="username"><span class="required">* </span>Korisničko ime:</label>
                      <input id="username" type="text" name="username" class="span6" value="{{ old('username') }}" required>
                      @error('username')
                      <p class="greska"><small>{{ $message }}</small></p>
                      @enderror
                    <label for="password"><span class="required">* </span>Lozinka:</label>
                      <input id="password" type="text" name="password" class="span3" required>
                      @error('password')
                        <p class="greska"><small>{{ $message }}</small></p>
                      @enderror
                    <label for="email"><span class="required">* </span>Email:</label>
                      <input id="email" type="text" name="email" class="span5" value="{{ old('email') }}" required>
                      @error('email')
                      <p class="greska"><small>{{ $message }}</small></p>
                      @enderror
                  </div>

                  <div class="span4">
                    <label for="prioritet">Prioritet:</label>
                      <input id="prioritet" type="text" name="prioritet" class="span1" value="{{ old('prioritet') }}">
                      @error('prioritet')
                      <p class="greska"><small>{{ $message }}</small></p>
                      @enderror
                    <label for="">Aktivan</label>
                      <label class="radio"> 
                        <input type="radio" name="is_active" value="1" checked="checked"> Da </label> 
                      <label class="radio"> 
                        <input type="radio" name="is_active" value="0"> Ne </label>
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



  