@extends('layouts.panel')
@section('content')

          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Editar paciente</h3>
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
              <form class="" action="{{url('patients/'.$patient->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label for="name">Nombre del paciente</label>
                  <input type="text" name="name" value="{{old('name',$patient->name)}}" class="form-control" required>

                </div>
                <div class="form-group">
                  <label for="email">E-mail</label>
                  <input type="text" name="email" value="{{old('email',$patient->email)}}" class="form-control">

                </div>

                <div class="form-group">
                  <label for="curp">CURP</label>
                  <input type="text" name="curp" value="{{old('curp',$patient->curp)}}" class="form-control">

                </div>
                <div class="form-group">
                  <label for="address">Dirección</label>
                  <input type="text" name="address" value="{{old('address',$patient->address)}}" class="form-control">

                </div>

                <div class="form-group">
                  <label for="phone">Teléfono / móvil </label>
                  <input type="text" name="phone" value="{{old('phone',$patient->phone)}}" class="form-control">

                </div>

                <div class="form-group">
                  <label for="password">Contraseña </label>
                  <input type="text" name="password" value="" class="form-control">
                  <p>Ingrese un valor sòlo si desea modificar la contraseña.</p>
                </div>

                <button type="submit" name="button" class="btn btn-primary">Guardar</button>
              </form>
            </div>

          </div>

@endsection
