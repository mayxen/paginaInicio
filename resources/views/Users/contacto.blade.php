@extends('layouts.app')

@section('content')
<div class="ui container">
    <h3>Si tienes alguna duda o estás interesado en contactar conmigo</h3>
    <div style="width: 70%; margin:auto; border:1px solid black; padding:10px; border-radius: 4px;">
        <form class="ui form">
            <div class="field">
                <label>Email</label>
                <input type="text" id="email" name="email" placeholder="example@gmail.com">
            </div>
            <div class="field">
                <label>Nombre</label>
                <input type="text" id="name" name="last-name" placeholder="Iván curbelo">
            </div>
            <div class="field">
                <label>Asunto</label>
                <input type="text" id="subject" name="subject" placeholder="Trabajo">
            </div>
            <div class="field">
                <label>Mensaje</label>
                <textarea id="message" name="message"
                    placeholder="Quería contactarte para ver si te interesaba..."></textarea>
            </div>
            <button class="ui button blue enviar" type="submit">Contactar</button>
        </form>
    </div>

</div>
<script>

    $(document).ready(function () {
        $(".enviar").click(function (e) {
            e.preventDefault();
            if ($("#email").val() != "" && $("#name").val() != "" && $("#subject").val() != "" && $("#message").val() != "") {
                // $.ajax({
                //     url: "/guardarTablet",
                //     type: "post",
                //     data: {
                //         'name': $("#name").val(),
                //         'ns': $("#ns").val(),
                //         'imei': $("#imei").val(),
                //         'modelo': $("#modelo").val(),
                //         'type': $("#type").val(),
                //     },
                //     success: function (e) {
                //         toastr.success('El dispositivo ha sido activado');
                //         location.reload();
                //     },
                //     error: function () {
                //         toastr.error('Ha ocurrido un error');
                //     }
                // });
            } else
                toastr.error('No se pueden dejar campos vacios');
        });
    });
</script>
@endsection