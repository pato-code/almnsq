$(document).ready(function () {
    //var city_id = $("#activity_city_id").data('select2').$dropdown.find("input").val();
    $("#activity_city_id").select2();
    $("#activity_neighborhood_id").select2();
    $("#activity_mosque_id").select2();
    $("#imam_id").select2();
    $("#activity_form").submit((e) => {
        e.preventDefault();
        var form = new FormData();
        form.append("request_name", $("#activity_name").val());
        form.append("mosque_id", $("#activity_mosque_id").val());
        form.append("activity_day", $("#activity_day").val());
        form.append("imam_id", $("#imam_id").val());

        var settings = {
            "async": true,
            "crossDomain": true,
            "url": "api/requestActivity/add",
            "method": "POST",
            "headers": {
                "cache-control": "no-cache",
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
    function mosques(){
        let neighborhood_id=$("#activity_neighborhood_id").val();
        alert(neighborhood_id);
        $.get('api/neighorhood/mosque/'+neighborhood_id, (ett) => {
            let mosques="";
            let option="";
            //alert(ett);
            $.each(ett, function(k, v) {
                option = "<option value='"+v.id+"'>"+v.name+"</option>";
                mosques +=option;
            });
            mosques +=option;
            $("#activity_mosque_id").html(mosques);
        });

    }
    $("#activity_city_id").change(function () {
        let city_id=$("#activity_city_id").val();
        //alert(city_id);
        $.get('api/city/neighorhood/'+city_id, (data) => {
            let neighborhoods="";
            let option="";
            //console.log(data);
            $.each(data, function(k, v) {
                option = "<option value='"+v.id+"'>"+v.name+"</option>";
                neighborhoods +=option;
            });
            $("#activity_neighborhood_id").html(neighborhoods);
            mosques();
        });

    });

    $("#activity_neighborhood_id").change(function (){
        mosques();
    });
});