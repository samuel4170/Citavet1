@extends('template')
@section('content-logged-in')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Inicio</h1>
        </section>
        <section class="content">
            <div class="box">
                <div class="box-body">
                    <form method="post" enctype="multipart/form-data">

                        @csrf
                        @method('put')

                        <div class="row">
                            <div class="col-md-6 col-xs-12">

                                <h2>Dias:</h2>
                                <input type="text" class="input-lg" name="dias" value="{{ $inicio->dias}}">
                                
                                <div class="form-group">
                                    <h2>Horarios:</h2>
                                    Desde: <input type="time" class="input-lg" name="horaInicio" value="{{ $inicio->horaInicio}}">
                                    Hasta: <input type="time" class="input-lg" name="horaFin" value="{{ $inicio->horaFin}}">
                                </div>

                                <h2>Direccion:</h2>
                                <input type="text" class="input-lg" name="direccion" value="{{ $inicio->direccion}}">

                                <h2>Telefono:</h2>
                                <input type="text" class="input-lg" name="telefono" value="{{ $inicio->telefono}}">

                                <h2>Correo:</h2>
                                <input type="text" class="input-lg" name="email" value="{{ $inicio->email}}">

                            </div>

                            <div class="col-md-6 col-xs-12">
                                <br><br>

                                <h2>Logo:</h2>
                                <input type="file" name="logoN">
                                
                                <br>
{{-- Deben de ejecutar lo siguiente para la img --}}
{{-- php artisan storage:link --}}
                                <img src="http://localhost/citagro_demo/public/storage/{{ $inicio->logo }}" width="200px">

                                <input type="hidden" name="logoActual" value="{{ $inicio->logo }}">
                                
                                <br><br>

                                <button type="submit" class="btn btn-success">Guardar Cambios</button>

                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
