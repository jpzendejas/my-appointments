@extends('layouts.panel')
@section('content')

          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Nuevo paciente</h3>
                </div>
                <div class="col text-right">
                  <a href="{{url('patients')}}" class="btn btn-sm btn-default">Cancelar y volver</a>
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
              <form class="" action="{{url('patients')}}" method="post">
                @csrf
                <div class="form-group">
                  <label for="name">Nombre del paciente</label>
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

                <button type="submit" name="button" class="btn btn-primary">Guardar</button>
              </form>
            </div>

          </div>

@endsection
