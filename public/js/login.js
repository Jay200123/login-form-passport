$("#loginForm").on("click", function (e) {

    e.preventDefault();
    console.log(data);
    var data = $("#logForm");
    let formData = new FormData(data);

    $.ajax({
        data: formData,
        type: "POST",
        url:"/api/login",
        cache: false,
        contentType: false,
        processData: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        dataType: "json",

        success: function (data) {

           window.localStorage.getItem(data);
           bootbox.alert("Successfully Log In!!!", function() {
            location.replace('/');
        });
        }
    });

});