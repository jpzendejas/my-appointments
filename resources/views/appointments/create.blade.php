@extends('layouts.panel')
@section('content')

          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Registrar nueva Cita</h3>
                </div>
                <div class="col text-right">
                  <a href="{{url('appointments')}}" class="btn btn-sm btn-default">Cancelar y volver</a>
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
              <form class="" action="{{url('appointments')}}" method="post">
                @csrf

                <div class="form-group">
                  <label for="description">Descripción</label>
                  <input type="text" id="description" name="description" value="{{old('description')}}" class="form-control" placeholder="Describe brevemente la consulta" required>
                </div>
                <div class="form-row">

                  <div class="form-group col-md-6">
                    <label for="specialty">Especialidad</label>
                    <select class="form-control" id="specialty" name="specialty_id" required>
                      <option value="">Seleccionar especialidad</option>
                      @foreach($specialties as $specialty)
                      <option value="{{$specialty->id}}" @if(old('specialty_id') == $specialty->id) selected @endif>{{$specialty->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="doctor">Médico</label>
                    <select class="form-control" id="doctor" name="doctor_id" required>
                      @foreach($doctors as $doctor)
                      <option value="{{$doctor->id}}" @if(old('doctor_id') == $doctor->id) selected @endif>{{$doctor->name}}</option>
                      @endforeach
                    </select>

                  </div>
                </div>

                <div class="form-group">
                  <label for="curp">Fecha</label>
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                    </div>
                    <input class="form-control datepicker" type="text" placeholder="Seleccionar Fecha"
                    id="date" name="scheduled_date" value="{{old('scheduled_date', date('Y-m-d'))}}" data-date-format="yyyy-mm-dd" data-date-start-date="{{date('Y-m-d')}}" data-date-end-date="+30d">

                  </div>
                </div>
                <div class="form-group">
                  <label for="address">Hora de Atención</label>
                  <div class="" id="hours">
                    @if($intervals)
                      @foreach($intervals['morning'] as $key => $interval)
                      <div class="custom-control custom-radio mb-3">
                          <input name="scheduled_time" class="custom-control-input" id="intervalMorning{{$key}}" type="radio" value="{{$interval['start']}}" >
                          <label class="custom-control-label" for="intervalMorning{{$key}}">{{$interval['start']}} - {{$interval['end']}}</label>
                      </div>
                      @endforeach
                      @foreach($intervals['afternoon'] as $key => $interval)
                      <div class="custom-control custom-radio mb-3">
                          <input name="scheduled_time" class="custom-control-input" id="intervalAfternoon{{$key}}" type="radio" value="{{$interval['start']}}" >
                          <label class="custom-control-label" for="intervalAfternoon{{$key}}">{{$interval['start']}} - {{$interval['end']}}</label>
                      </div>

                      @endforeach
                    @else
                    <div class="alert alert-info" role="alert">
                      Seleccione un médico y una fecha, para ver sus horas disponibles.
                    </div>
                    @endif
                  </div>
                </div>

                <div class="form-group">
                  <label for="type">Tipo de consulta</label>
                  <div class="custom-control custom-radio mb-3">
                    <input type="radio" name="type" class="custom-control-input" id="type1" @if(old('type', 'Consulta') == 'Consulta') checked @endif value="Consulta">
                    <label for="type1" class="custom-control-label">Consulta</label>
                  </div>
                  <div class="custom-control custom-radio mb-3">
                    <input type="radio" name="type" class="custom-control-input" id="type2" @if(old('type') == 'Examen') checked @endif value="Examen">
                    <label for="type2" class="custom-control-label">Examen</label>
                  </div>
                  <div class="custom-control custom-radio mb-3">
                    <input type="radio" name="type" class="custom-control-input" id="type3" @if(old('type') == 'Operación') checked @endif value="Operación">
                    <label for="type3" class="custom-control-label">Operación</label>
                  </div>
                </div>

                <!-- <div class="form-group">
                  <label for="password">Contraseña </label>
                  <input type="text" name="password" value="{{str_random(6)}}" class="form-control">
                </div> -->

                <button type="submit" name="button" class="btn btn-primary">Guardar</button>
              </form>
            </div>

          </div>

@endsection
@section('scripts')
<script src="{{asset('/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('/js/appointments/create.js')}}"></script>
@endsection
