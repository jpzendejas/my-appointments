@extends('layouts.panel')
@section('content')
@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
@endsection
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Nuevo médico</h3>
                </div>
                <div class="col text-right">
                  <a href="{{url('doctors')}}" class="btn btn-sm btn-default">Cancelar y volver</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              @if($errors->any())
              <ul>
                <div class="alert alert-danger" role="alert">
                  @foreach($errors->all() as $error)

                  <li>{{$error}}</li>
                  @endforeach
                </div>

              </ul>
              @endif
              <form class="" action="{{url('doctors')}}" method="post">
                @csrf
                <div class="form-group">
                  <label for="name">Nombre del médico</label>
                  <input type="text" name="name" value="{{old('name')}}" class="form-control" required>

                </div>
                <div class="form-group">
                  <label for="email">E-mail</label>
                  <input type="text" name="email" value="{{old('email')}}" class="form-control">

                </div>

                <div class="form-group">
                  <label for="curp">CURP</label>
                  <input type="text" name="curp" value="{{old('curp')}}" class="form-control">

                </div>
                <div class="form-group">
                  <label for="address">Dirección</label>
                  <input type="text" name="address" value="{{old('address')}}" class="form-control">

                </div>

                <div class="form-group">
                  <label for="phone">Teléfono / móvil </label>
                  <input type="text" name="phone" value="{{old('phone')}}" class="form-control">

                </div>

                <div class="form-group">
                  <label for="password">Contraseña </label>
                  <input type="text" name="password" value="{{str_random(6)}}" class="form-control">

                </div>
                <div class="form-group">
                  <label for="specialties">Especialidades </label>
                  <select class="form-control selectpicker" name="specialties[]" data-style="btn-primary" multiple title="Seleccione una o varias">
                    @foreach($specialties as $specialty)
                    <option value="{{$specialty->id}}">{{$specialty->name}}</option>
                    @endforeach
                  </select>
                </div>
                <button type="submit" name="button" class="btn btn-primary">Guardar</button>
              </form>
            </div>

          </div>

@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/i18n/defaults-*.min.js"></script> -->
@endsection
