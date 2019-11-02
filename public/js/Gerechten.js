$(document).ready(function() {

    $('.nieuwGerecht').click(function () {
        console.log('hoi');
        $('#nieuwGerecht').modal('show');

    });

    $('body').on('click','#btnToevoegen',function(e){
        e.preventDefault();
        //var FotoSelect = document.getElementById('Foto');
        //var Foto = FotoSelect.files;
        var Allergenen = [];
        $("input:checkbox[name=allergenen]:checked").each(function () {
            Allergenen.push($(this).val());
        });
        var formData={
            NaamGerechtNL:$('#nieuwGerecht #NaamGerechtNL').val(),
            NaamGerechtENG:$('#nieuwGerecht #NaamGerechtENG').val(),
            Prijs:$('#nieuwGerecht #Prijs').val(),
            Allergenen:Allergenen
            //Foto:Foto
        };

        $.ajax({
            headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
            type: "POST",
            url:"gerecht/toevoegen",
            data: formData,
            dataType: 'JSON', //Optional: type of data returned from server
            success: function(data){
                //alert(data); // show response from the php script.
                $('#nieuwGerecht').modal('hide');
                //alert(data.message);
                window.location.reload();
            },
            error: function (data) {
                $('#nieuwGerecht').modal('hide');
                alert(data.message);
            }
        });
    });


    $(document).on('click','.wijzigen',function () {
        var formData={
            Gerecht:$(this).val()
        };
        $.ajax({
            headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
            type:"POST",
            url:"gerecht/wijzigen/modal",
            data: formData,
            dataType: 'JSON',
            success: function (data) {
                $('#gerechtWijzigen #GerechtID').val(data.ID);
                $('#gerechtWijzigen #NaamGerechtNL').val(data.vertalingNL);
                $('#gerechtWijzigen #NaamGerechtENG').val(data.vertalingENG);
                $('#gerechtWijzigen #Prijs').val(data.prijs);
                $('#gerechtWijzigen').modal('show');
            },
            error: function (data) {
                alert('Sorry u kan het gerecht momenteeel niet wijzigen')
            }
        });
    });

    $('body').on('click','#btnWijzigen',function (e) {
        e.preventDefault();
        //var FotoSelect = document.getElementById('Foto');
        //var Foto = FotoSelect.files;
        var AllergenenWijzigen = [];
        $("input:checkbox[name=allergenenWijzigen]:checked").each(function () {
            AllergenenWijzigen.push($(this).val());
        });
        var formData={
            GerechtID:$('#GerechtID').val(),
            NaamGerechtNL:$('#gerechtWijzigen #NaamGerechtNL').val(),
            NaamGerechtENG:$('#gerechtWijzigen #NaamGerechtENG').val(),
            Prijs:$('#gerechtWijzigen #Prijs').val(),
            AllergenenWijzigen:AllergenenWijzigen
            //Foto:Foto
        };

        $.ajax({
            headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
            type: "POST",
            url:"gerecht/wijzigen",
            data: formData,
            dataType: 'JSON', //Optional: type of data returned from server
            success: function(data){
                //alert(data); // show response from the php script.
                $('#gerechtWijzigen').modal('hide');
                //alert(data.message);
                window.location.reload();
            },
            error: function (data) {
                $('#gerechtWijzigen').modal('hide');
                alert(data.message);
            }
        });
    });

    $('.verwijderen').click(function () {
        var verwijder = confirm("Weet je zeker dat je dit item wil verwijderen?")
        var item = $(this).val();
        var formData = {
            item: item
        };
        if(verwijder){
            $.ajax({
                headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
                type: "POST",
                url:"gerecht/verwijderen",
                data: formData,
                dataType:'JSON',
                success: function(data){
                    alert('succesvol verwijderd');
                    window.location.reload();
                },
                error: function (data) {
                    alert('sorry het item is niet verwijderd');
                }
            })
        }
    })

});
