$(document).ready(function () {
$("#loginForm").on("click", function (e) {

    e.preventDefault();
    var data = $("#logForm")[0];
    console.log(data);

    let formData = new FormData(data);
    console.log(formData);
    
    for (var pair of formData.entries()) {
        console.log(pair[0] + "," + pair[1]);
    }

    $.ajax({
        type: "POST",
        url:"/api/login",
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        dataType: "json",

        success: function (data) {
           console.log(data)
           $("#email").val(data.email);
           $("#password").val(data.password);
          
            bootbox.alert("Successfully Log In!!!", function() {
            location.replace('/');
             });
        },
        error: function(error){
            bootbox.alert("Login Error Please Try Again", function(){
                location.replace('/login');
            })
        }       
    });

});

});