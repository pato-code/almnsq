
$(document).ready(function (){
    $('#city_id').select2({
        theme: "bootstrap"
    });
    $("#neighborhood_id").select2();
    $("#city_id").change(function () {

        let city_id=$("#city_id").val();
        $.get('../api/city/neighorhood/'+city_id, (data) => {
            let neighborhoods="";
            $.each(data, function(k, v) {
                let option = "<option value='"+v.id+"'>"+v.name+"</option>";
                neighborhoods +=option;
            });
            $("#neighborhood_id").html(neighborhoods);
        });
    });
    //add_mosque
    $('#add_mosque').bootstrapValidator({
        fields: {
            location_id: {
                validators: {
                    notEmpty: {
                        message: "أدخل النوع"
                    }
                }
            },
            city_id: {
                validators: {
                    notEmpty: {
                        message: "إختر المدينه"
                    }
                }
            }, neighborhood_id: {
                validators: {
                    notEmpty: {
                        message: "إختر الحي"
                    }
                }
            }, name: {
                validators: {
                    notEmpty: {
                        message: "إسم المسجد"
                    }
                }
            }
        }
    });
});