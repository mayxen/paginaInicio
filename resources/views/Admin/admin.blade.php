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
            <div class="ui bottom attached button">
                <i class="add icon"></i>
                Administrar
            </div>
        </div>
        <div class="card">
            <div class="content">
                <div class="header">Modificar trabajos</div>
                <div class="description">
                    Crud de trabajos
                </div>
            </div>
            <div class="ui bottom attached button">
                <i class="add icon"></i>
                Administrar
            </div>
        </div>
    </div>
</div>
@endsection