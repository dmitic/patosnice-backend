@extends('layouts.app')

@section('title')
    {{'Izmena administratora'}}
@endsection

@section('active_dash')
{{'active'}}
@endsection

@section('podnaslov')
    {{ 'Izmena admina' }}
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
                <legend>Izmeni administratora: {{ $user->name }}</legend>
                <form action="{{ route('izmeni_admina', ['user' => $user]) }}" method="post">
                  @csrf
                  @method('put')
                <div class="row">
                  <div class="span6">
                    <label for="name"><span class="required">* </span>Ime i prezime:</label>
                      <input id="name" type="text" name="name" class="span6" value="{{ $user->name ?? old('name') }}" required>
                      @error('name')
                      <p class="greska"><small>{{ $message }}</small></p>
                      @enderror
                    <label for="username"><span class="required">* </span>Korisničko ime:</label>
                      <input id="user_name" type="text" name="user_name" class="span6" value="{{ $user->username ?? old('username') }}" disabled>
                      <input id="username" type="hidden" name="username" class="span6" value="{{ $user->username ?? old('username') }}" >
                      @error('username')
                      <p class="greska"><small>{{ $message }}</small></p>
                      @enderror
                    <label for="password">Lozinka:</label>
                      <input id="password" type="text" name="password" class="span3">
                      @error('password')
                      <p class="greska"><small>{{ $message }}</small></p>
                      @enderror
                    <label for="email"><span class="required">* </span>Email:</label>
                      <input id="email" type="text" name="email" class="span5" value="{{ $user->email ?? old('email') }}" required>
                      @error('email')
                      <p class="greska"><small>{{ $message }}</small></p>
                      @enderror
                  </div>

                  <div class="span4">
                    <label for="prioritet"><span class="required">* </span>Prioritet:</label>
                      <input id="prioritet" type="text" name="prioritet" class="span1" value="{{ $user->prioritet ?? old('prioritet') }}">
                      @error('prioritet')
                      <p class="greska"><small>{{ $message }}</small></p>
                      @enderror
                    <label for="">Aktivan</label>
                      <label class="radio"> 
                        <input type="radio" name="is_active" value="1" {{$user->is_active ? 'checked' : ''}} > Da </label> 
                      <label class="radio"> 
                        <input type="radio" name="is_active" value="0" {{!$user->is_active ? 'checked' : ''}} {{ Auth::user()->id === $user->id ? 'disabled' : '' }}> Ne </label>
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



  