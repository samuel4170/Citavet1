@extends('template')
@section('content')
<section class="content" style="background-color: #acbd99;">
<style>
    h1 {
        font-weight: bold;
        margin: 0; /* Esto quita el margen superior e inferior */
    }
</style>

<center>
    <h1>BIENVENIDO</h1>
    <h1>Seleccione cómo desea Ingresar al Sistema</h1>
</center>
    <div class="row">
        <div class="col-md-6 col-xs-12 text-center">
            <br><br><br><br><br>
            <div class="small-box" style="background-color: #71873f; color:white; width: 500px; height: 150px;">
                <div class="inner">
                    <h3>Secretaria</h3>
                    <p>Iniciar Sesión</p>
                </div>
                <div class="icon">
                    <i class="fa fa-female"></i>
                </div>
                <a href="Login" class="small-box-footer">
                    Ingresar <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
            

            <div class="small-box" style="background-color: #a36627; color:white; width: 500px; height: 150px;">
                <div class="inner">
                    <h3>Administrador</h3>
                    <p>Iniciar Sesión</p>
                </div>
                <div class="icon">
                    <i class="fa fa-male"></i>
                </div>
                <a href="Login" class="small-box-footer">
                    Ingresar <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-md-6 col-xs-12">
            <br><br><br>
            <img src="http://localhost/citagro_demo/public/storage/log.png" width="400px">
        </div> 
    </div>
    <br><br><br><br><br><br><br><br><br><br>
</section>
@endsection
