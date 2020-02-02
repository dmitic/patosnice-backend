@extends('layouts.app')

@section('title')
    {{'Admin panel'}}
@endsection

@section('active_dash')
    {{'active'}}
@endsection

@section('podnaslov')
    {{ 'Administratori' }}
@endsection

@section('content')
<body>
  @include('incs.subnavbar')
  <div class="main">
    <div class="main-inner">
      <div class="container">
        <div class="row">
          <div class="span12">

            @error('poruka')
            <div class="row  text-center">
              <div class="span12">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <div class="alert alert-success">{{ $message }}</div>
              </div>
            </div>
            @enderror

            <div class="widget widget-table action-table">
              <div class="widget-header"> <i class="icon-th-list"></i>
                <h3>Administratori</h3>
              </div>
              <!-- /widget-header -->
              <div class="widget-content">
                <form class="form-horizontal">
                  <a href="{{ route('dodaj_admina') }}" class="btn btn-primary"> Dodaj</a>
                </form>
                <table class="table table-striped table-bordered table-responsive">
                  <thead>
                    <tr>
                      <th> IME I PREZIME </th>
                      <th> PRIORITET</th>
                      <th> AKTIVAN</th>
                      <th class="td-actions"> </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                    <tr>
                      <td> {{ $user->name }} </td>
                      <td> {{ $user->prioritet }} </td>
                      {{-- <td> {{ $user->is_active ? 'Aktivan' : 'Neaktivan' }} </td> --}}
                      <td> 
                        <form action="{{ route('statusKorisnika', ['user' => $user->id]) }}" method="post">
                          @csrf
                          @method('PUT')
                          {{ $user->is_active ? 'Aktivan' : 'Neaktivan' }}
                          <button style="width:65px" class="btn btn-danger btn-small pull-right" onclick="return confirm('Da li si siguran da želiš da aktiviraš/deaktiviraš korisnika?')" title="Promeni status korisnika" {{ Auth::user()->id === $user->id ? 'disabled' : '' }}>{{ $user->is_active == 1 ? 'Deaktiviraj' : 'Aktiviraj'}}</button>
                        </form> 
                      </td>
                      <td class="td-actions">
                        <form action="{{route('obrisi_admina', ['user' => $user->id])}}" method="post">
                          @csrf
                          @method('delete')
                          <a href="{{route('izmeni_admina', ['user' => $user->id])}}" class="btn btn-small btn-success" title="Izmeni"> <i class="btn-icon-only icon-pencil"> </i> </a>
                          <button type="submit" class="btn btn-danger btn-small" title="Obriši" onclick="return confirm('Da li ste sigurni?')" {{ Auth::user()->id === $user->id ? 'disabled' : '' }}> <i class="btn-icon-only icon-remove"> </i> </button>
                        </form>
                      </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
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