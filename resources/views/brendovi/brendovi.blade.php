@extends('layouts.app')

@section('title')
    {{'Brendovi'}}
@endsection

@section('active_brend')
    {{'active'}}
@endsection

@section('podnaslov')
    {{ 'Brendovi' }}
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
                <h3>Brendovi</h3>
              </div>
              <!-- /widget-header -->
              <div class="widget-content">
                <form class="form-horizontal">
                  <a href="{{ route('dodaj_admina') }}" class="btn btn-primary"> Dodaj</a>
                </form>
                <table class="table table-striped table-bordered table-responsive">
                  <thead>
                    <tr>
                      <th> NAZIV </th>
                      <th> SLIKA</th>
                      <th> REDOSLED</th>
                      <th> AKTIVAN</th>
                      <th class="td-actions"> </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($brands as $brand)
                    <tr>
                      <td> {{ $brand->naziv }} </td>
                      <td> <img src="/slike/brendovi/{{ $brand->slika }}" style="height:50px;"> </td>
                      <td> {{ $brand->redosled }} </td>
                      <td> 
                        {{-- <form action="#" method="post"> --}}
                        <form action="{{ route('statusBrenda', ['brand' => $brand->id]) }}" method="post">
                          @csrf
                          @method('PUT')
                          {{ $brand->aktivan ? 'Aktivan' : 'Neaktivan' }}
                          <button style="width:65px" class="btn btn-danger btn-small pull-right" onclick="return confirm('Da li si siguran da želiš da aktiviraš/deaktiviraš slajder?')" title="Promeni status slajdera">{{ $brand->aktivan == 1 ? 'Deaktiviraj' : 'Aktiviraj'}}</button>
                        </form> 
                      </td>
                      <td class="td-actions">
                        {{-- <form action="#" method="post"> --}}
                        <form action="{{route('obrisi_brend', ['brand' => $brand->id])}}" method="post">
                          @csrf
                          @method('delete')
                          <a href="#" class="btn btn-small btn-success" title="Izmeni"> <i class="btn-icon-only icon-pencil"> </i> </a>
                          {{-- <a href="{{route('izmeni_admina', ['user' => $user->id])}}" class="btn btn-small btn-success" title="Izmeni"> <i class="btn-icon-only icon-pencil"> </i> </a> --}}
                          <button type="submit" class="btn btn-danger btn-small" title="Obriši" onclick="return confirm('Da li ste sigurni?')" > <i class="btn-icon-only icon-remove"> </i> </button>
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