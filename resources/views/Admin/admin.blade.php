@extends('layouts.app')

@section('content')
<div class="ui container">
    <h3>Zona de administrador</h3>
    <div class="ui cards">
        <div class="card">
            <div class="content">
                <div class="header">Modificar CV</div>
                <div class="description">
                    Puedes añadir nuevos trabajos, aptitudes... etc.
                </div>
            </div>
            <a href="/admin/cv" class="ui bottom attached button">
                <i class="add icon"></i>
                Administrar
            </a>
        </div>
        <div class="card">
            <div class="content">
                <div class="header">Crear trabajo</div>
                <div class="description">
                    Vista para crear un trabajo
                </div>
            </div>
            <a href="/admin/crearTrabajo" class="ui bottom attached button">
                <i class="add icon"></i>
                Administrar
            </a>
        </div>
        <div class="card">
            <div class="content">
                <div class="header">Listado trabajos</div>
                <div class="description">
                    Tabla con todos los trabajos realizados
                </div>
            </div>
            <a href="/admin/listadoTrabajos" class="ui bottom attached button">
                <i class="add icon"></i>
                Administrar
            </a>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('a[href="/admin"]').addClass("active");
    });
</script>
@endsection