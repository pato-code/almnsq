$(document).ready(function (){
    $("#neighborhood_id").select2();
    $("#type_id").select2();
    $("#city_id").select2();
    $("#mosque_id").select2();

    function mosques(){
        let neighborhood_id=$("#neighborhood_id").val();

        $.get('../api/neighorhood/mosque/'+neighborhood_id, (ett) => {
            let mosques="";
            let option="";
            //alert(ett);
            $.each(ett, function(k, v) {
                option = "<option value='"+v.id+"'>"+v.name+"</option>";
                mosques +=option;
            });
            option = '<option value="-1">أخري</option>';
            mosques +=option;
            $("#mosque_id").html(mosques);
        });

    }
    $("#city_id").change(function () {
        let city_id=$("#city_id").val();
        $.get('../api/city/neighorhood/'+city_id, (data) => {
            let neighborhoods="";
            let option="";
            $.each(data, function(k, v) {
                option = "<option value='"+v.id+"'>"+v.name+"</option>";
                neighborhoods +=option;
            });
            $("#neighborhood_id").html(neighborhoods);
            mosques();
        });

    });

    $("#neighborhood_id").change(function (){
        mosques();
    });
    $("#mosque_id").change(function (){
        let mosque_id=$("#mosque_id").val();
        if (mosque_id == -1){
            $("#mosque_div").removeClass("hidden");
        } else {
            $("#mosque_div").addClass("hidden");
            $("#mosque_name").val('');
        }
    });
    $("#compliment_form").submit((e) => {
       e.preventDefault();
        var form = new FormData();
        form.append("name", $("#name").val());
        form.append("location", $("#location").val());
        form.append("city_id", $("#city_id").val());
        form.append("neighborhood_id", $("#neighborhood_id").val());
        form.append("mosque_id", $("#mosque_id").val());
        form.append("mosque_name", $("#mosque_name").val());
        form.append("strengths", $("#strengths").val());
        form.append("file", $("#file")[0].files[0]);
        form.append("notes", $("#notes").val());

        var settings = {
            "async": true,
            "crossDomain": true,
            "url": "../api/complement/add",
            "method": "POST",
            "headers": {
                "cache-control": "no-cache",
                "postman-token": "9a50e002-28d2-bd24-ef79-9e6a44da3846"
            },
            "processData": false,
            "contentType": false,
            "mimeType": "multipart/form-data",
            "data": form
        };

        $.ajax(settings).done(function (response) {
            $("#getResponse").modal("show");
        });
    });


});