@extends('layouts.app')

@section('content')
<div class="ui container">
    <h3>Crea un trabajo</h3>
    <div style="width: 70%; margin:auto; border:1px solid black; padding:10px; border-radius: 4px;">
        <form class="ui form">
            <div class="field">
                <label>Nombre</label>
                <input type="text" id="name" name="name" placeholder="Juego nuevo">
            </div>
            <div class="field">
                <label>lenguaje</label>
                <input type="text" id="lenguaje" name="lenguaje" placeholder="C#">
            </div>
            <div class="field">
                <label>Descripción</label>
                <textarea id="descr" name="descr"
                    placeholder="juego basado en ..."></textarea>
            </div>
            <button class="ui button blue enviar" type="submit">Crear</button>
        </form>
    </div>

</div>
<script>

    $(document).ready(function () {
        $('a[href="/admin"]').addClass("active");
        $(".enviar").click(function (e) {
            e.preventDefault();
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: "{{ url('/admin/crearTrabajo/add')}}",
                type: 'POST',
                data: {
                    'name':$('#name').val(),
                    'descr':$('#descr').val(),
                    'lenguaje':$('#lenguaje').val()
                },
                success: function(msg) {
                    toastr.success('Se ha creado correctamente');                    
                },
                error: function(error) {
                    toastr.error('Ha ocurrido un error');
                    
                },
            });
        });

    });
</script>
@endsection