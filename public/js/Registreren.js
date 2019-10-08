$(document).ready(function() {

    $('.open-modal').click(function () {
        //modal voor het registreren van nieuwe gebruiker wordt geopend zodra er op de knop is geklikt
        console.log('hoi');
        $('#registreer').modal('show');

    });

    $('body').on('click','#btnOpslaan',function(e){
        //als er op de knop opsloaan word gedrukt word de data voor de nieuwe gebruiker naar de controller verstuurd en daar verder afgehandeld
        console.log($('meta[name="csrf-token"]').attr('content'));
        var formData={
            Email:$('#email').val(),
            Wachtwoord:$('#wachtwoord').val()
        };
        $.ajax({
            headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
            type: "POST",
            url:"registreer/opslaan",
            data: formData,
            dataType: 'JSON', //Optional: type of data returned from server
            success: function(data){
                //alert(data); // show response from the php script.
                console.log(formData);
                console.log('hier ben ik');

                $('#registreer').modal('hide');
                alert(data.message);
                //window.location.reload();
            },
            error: function (data) {
                $('#registreer').modal('hide');
                alert(data.message);
            }
        });
    });

});
