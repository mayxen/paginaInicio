@extends('layouts.app')

@section('content')
<div class="ui container">  
    <table class="ui celled table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Lenguaje</th>
                <th>descripción</th>
                <th>Añadir</th>
                <th>Editar</th>
                <th>Borrar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trabajos as $trabajo)
                <tr>
                    <td>{{$trabajo->name}}</td>
                    <td>{{$trabajo->lenguaje}}</td>
                    <td>{{$trabajo->description}}</td>
                    <td><button data-id="{{$trabajo->id}}" class="ui button green edit" style="display: block; margin: auto;"><i class="ui add icon white"></i></button></td>
                    <td><button data-id="{{$trabajo->id}}" class="ui button orange edit" style="display: block; margin: auto;"><i class="ui edit icon white"></i></button></td>
                    <td><button data-id="{{$trabajo->id}}" class="ui button red delete" style="display: block; margin: auto;"><i class="ui trash icon white"></i></button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="ui modal">
        <i class="close icon"></i>
        <div class="header" id="cabecera">
            Editar datos trabajo
        </div>
        <div class="image content">
            
            <div class="description">
                <div class="ui header editables">
                    Datos editables   
                </div>
                <form method="post" action="/" class="ui form">
                    <div class="field">
                        <label for="nombre" >Nombre</label>
                        <input type="text" id="nombre" name="nombre">
                    </div>
                    <div class="field">
                        <label for="lenguaje">Lenguaje</label>
                        <input type="text" id="lenguaje" name="lenguaje">
                    </div>
                    <div class="field">
                        <label for="descr">descripción</label>
                        <textarea id="descr" name="descr"></textarea>
                    </div>
                </form>
            </div>
        </div>

        <div class="actions">
            <div class="ui red deny button">
                Cancelar
            </div>
            <div class="ui positive right labeled icon button actualizar">
                Modificar
                <i class="checkmark icon"></i>
            </div>
        </div>
    </div>
        
    <script>
        $(document).ready(function(){
            $('a[href="/admin"]').addClass("active");   
            var id = -1;         
            $(".edit").click(function(){
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: "/admin/getDatosTrabajo",
                    type: "post",
                    data: {
                        'id':$(this).attr("data-id"),
                    },
                    success: function(e) {
                        var datos = JSON.parse(e);
                        if(datos !=null) {
                            $("#nombre").val(datos.name);
                            $("#lenguaje").val(datos.lenguaje);
                            $("#descr").val(datos.description);
                            id = datos.id;
                            $('.ui.modal').modal('show');
                        }
                    },
                    error: function () { 
                        toastr.error('Ha ocurrido un error');
                    }
                });
            });

            $(".actualizar").click(function(){
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: "/admin/updateDatosTrabajo",
                    type: "put",
                    data: {
                        'id':id,
                        'lenguaje':$("#lenguaje").val(),
                        'name':$("#nombre").val(),
                        'descr':$("#descr").val(),
                    },
                    success: function(e) {
                        toastr.success('el trabajo ha sido modificado');
                        location.reload();
                    },
                    error: function () { 
                        toastr.error('Ha ocurrido un error');
                    }
                });
            });

            $(".delete").click(function(e) {
                e.preventDefault();
                swal({
                    title: "¿Estas seguro?",
                    text: "Estas apunto de eliminar un trabajo",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $(this).closest("fieldset").closest("form").fadeOut();
                        $.ajax({
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            url: "/admin/deleteTrabajo",
                            type: "delete",
                            data: {
                                'id':$(this).attr("data-id"),
                            },
                            success: function(e) {     
                                toastr.success('El trabajo ha sido eliminado');
                                location.reload();
                            },
                            error: function () { 
                                toastr.error('Ha ocurrido un error');
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection