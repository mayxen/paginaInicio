@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="ui grid">
        <div class="twelve wide column">
            <div style="color: #5571ec" class="ui horizontal divider">
                Aptitudes
            </div>
            @foreach ($user->aptitudes as $aptitud)
                <p>{{$aptitud->description}}<i data-where="apt" data-id="{{$aptitud->id}}" class="trash red icon eliminar"></i></p>
            @endforeach
            
            <button class="ui button green fluid openModal" data-where="apt">Añadir <i class="add icon"></i></button>
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
            <h2>{{$formacion->name}}<i data-where="for" data-id="{{$formacion->id}}" class="trash red icon eliminar"></i></h2>
            <p>{{$formacion->description}}</p>
        @endforeach
        <button class="ui button green fluid openModal"  data-where="for">Añadir <i class="add icon"></i></button>
            <!-- <h2><b>IES Arrecife- </b><i>Bachillerato</i></h2> -->
    </div>
    <div>
        <div style="color: #5571ec" class="ui horizontal divider">
            Experiencia profesional
        </div>
        <div>
        @foreach ($user->experiencias as $experiencia)
            <h2><b>{{$experiencia->name}}</b><i data-where="exp" data-id="{{$experiencia->id}}" class="trash red icon eliminar"></i></h2>
            <p>{{$experiencia->description}}</p>
        @endforeach
            <button class="ui button green fluid openModal"  data-where="exp">Añadir <i class="add icon"></i></button>
        </div>
    </div>
    <div>
        <div style="color: #5571ec" class="ui horizontal divider">
            Detalles
        </div>
        <div>
        @foreach ($user->otros as $otro)
            <h2><b>{{$otro->name}}</b><i data-where="otro" data-id="{{$otro->id}}" class="trash red icon eliminar"></i></h2>
            <p>{{$otro->description}}</p>
        @endforeach
            <button class="ui button green fluid openModal"  data-where="otro">Añadir <i class="add icon"></i></button>
        </div>
    </div>
</div>
<div class="ui modal">
    <i class="close icon"></i>
    <div class="header">
        Añadir a curriculum
    </div>
    <div class="image content">
        <div class="description">
            <div class="ui header">Rellena estos campos</div>
            <form class="ui form">
                <div class="field">
                    <label>Nombre</label>
                    <input id="name" type="text" name="first-name" placeholder="ejemplo">
                </div>
                <div class="field">
                    <label>Descripción</label>
                    <input id="descr" type="text" name="last-name" placeholder="es un ejemplo">
                </div>
            </form>
        </div>
    </div>
    <div class="actions">
        <div class="ui red deny button">
            Cancelar
        </div>
        <div class="ui positive right labeled icon button uploadData">
            Subir
            <i class="checkmark icon"></i>
        </div>
    </div>
</div>
<script>
    var whereTo= "";
    $(".openModal").click(function(e){
        e.preventDefault();
        whereTo = $(this).attr("data-where");
        $('.ui.modal').modal('show');
    });

    $(".uploadData").click(function(e){
        e.preventDefault();
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "{{ url('/admin/')}}"+"/"+whereTo,
            type: 'POST',
            data: {
                'name':$('#name').val(),
                'descr':$('#descr').val()
            },
            success: function(msg) {
                location.reload();
            },
            error: function(error) {
                
                
            },
        });
    });

    $(".eliminar").click(function(e) {
        whereTo = $(this).attr("data-where");
        e.preventDefault();
        swal({
            title: "¿Estas seguro?",
            text: "Estás apunto de borrar un dato de tu CV",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: "{{url('/admin/delete')}}"+"/"+whereTo,
                    type: "DELETE",
                    data: {
                        'id': $(this).attr("data-id")
                    },
                    success: function(e) {
                        location.reload();
                    },
                    error: function () {
                        
                    }
                });
            }
        });
    });
</script>
@endsection