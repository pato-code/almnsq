
$(document).ready(function (){
    $('#city_id').select2({
        theme: "bootstrap"
    });
    $("#neighborhood_id").select2();
    $("#city_id").change(function () {

        let city_id=$("#city_id").val();
       // alert(city_id);
        $.get('../api/city/neighorhood/'+city_id, (data) => {
            let neighborhoods="";
            alert(data);
            $.each(data, function(k, v) {
                let option = "<option value='"+v.id+"'>"+v.name+"</option>";
                neighborhoods +=option;
            });
            $("#neighborhood_id").html(neighborhoods);
        });
    });
});