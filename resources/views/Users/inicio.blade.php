@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="ui grid">
        <div class="twelve wide column">
            <div style="color: #5571ec" class="ui horizontal divider">
                Aptitudes
            </div>
            @foreach ($user->aptitudes as $aptitud)
                <p>{{$aptitud->description}}</p>
            @endforeach
            
            
        </div>
        <div class="four wide column">
            <div class="ui card">
                <div class="image">
                    <img src="user-male-icon.png">
                </div>
                <div class="content">
                    <a class="header">Iván Curbelo Fernández</a>
                    <div class="meta">
                        <span class="date">Programador</span>
                    </div>
                    <div class="description">
                        Programador full stack de páginas web y de videojuegos.
                    </div>
                </div>
                <div class="extra content">
                    <a href="https://github.com/mayxen" target="_blanck">
                        <i class="github icon"></i>
                        Trabajos realizados por mi
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div style="color: #5571ec" class="ui horizontal divider">
            Formación
        </div>
        @foreach ($user->formaciones as $formacion)
            <h2>{{$formacion->name}}</h2>
            <p>{{$formacion->description}}</p>
        @endforeach
        
    </div>
    <div>
        <div style="color: #5571ec" class="ui horizontal divider">
            Experiencia profesional
        </div>
        <div>
        @foreach ($user->experiencias as $experiencia)
            <h2><b>{{$experiencia->name}}</b></h2>
            <p>{{$experiencia->description}}</p>
        @endforeach
            
        </div>
    </div>
    <div>
        <div style="color: #5571ec" class="ui horizontal divider">
            Detalles
        </div>
        <div>
        @foreach ($user->otros as $otro)
            <h2><b>{{$otro->name}}</b></h2>
            <p>{{$otro->description}}</p>
        @endforeach
        </div>
    </div>
</div>
@endsection
