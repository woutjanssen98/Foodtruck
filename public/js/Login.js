$('#inloggen').click(function () {
    var formData={
        Email:$('#email').val(),
        Wachtwoord:$('#wachtwoord').val()
    };
    console.log(formData);
    $.ajax({
        headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
        type: "POST",
        url:"login/login",
        data: formData,
        dataType: 'JSON', //Optional: type of data returned from server
        success: function(data){
            //alert(data); // show response from the php script.
            console.log(formData);
            console.log('hier ben ik');
            console.log(data.ID);
            window.location.href= 'http://leijgraaf.foodtruck.com';
            //window.location.reload();
        },
        error: function (data) {
            //alert(data.message);
        }
    });
});

