$(document).ready(function () {
    //

    $('#city_id').on('hide.bs.select', function () {
        $(this).trigger("focusout");
    });
    $('#add_activity').bootstrapValidator({
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: "أدخل عنوان المنشط"
                    }
                }
            },
            type_id: {
                validators: {
                    notEmpty: {
                        message: "إختر نوع المنشط"
                    }
                }
            },
            city_id: {
                validators: {
                    notEmpty: {
                        message: "إختر المدينه"
                    }
                }
            }, mosque_id: {
                validators: {
                    notEmpty: {
                        message: "إختر المسجد"
                    }
                }
            }, neighborhood_id: {
                validators: {
                    notEmpty: {
                        message: "إختر الحي"
                    }
                }
            }, period_id: {
                validators: {
                    notEmpty: {
                        message: "فترة المنشط"
                    }
                }
            }, day: {
                validators: {
                    notEmpty: {
                        message: "يوم المنشط"
                    }
                }
            }
        }
    });
    $("#neighborhood_id").select2();
    $("#type_id").select2({width: 'resolve'});
    $("#city_id").select2();
    $("#mosque_id").select2();

    function mosques() {
        let neighborhood_id = $("#neighborhood_id").val();

        $.get(window.$vars.app_url+'/api/neighorhood/mosque/' + neighborhood_id, (ett) => {
            let mosques = "";
            let option = "";
            //alert(ett);
            $.each(ett, function (k, v) {
                option = "<option value='" + v.id + "'>" + v.name + "</option>";
                mosques += option;
            });






            $("#mosque_id").html(mosques);
            if (mosques.length === 0) {
                var error = '<small class="help-block" data-bv-validator="notEmpty" data-bv-for="mosque_id" data-bv-result="INVALID" style="">لا يوجد مساجد في هذا الحي</small>';
                $("#mosque_id .help-block").html(error);
            } else {
                var bootstrapValidator = $('#add_activity').data('bootstrapValidator');
                bootstrapValidator.enableFieldValidators('mosque_id', false);
            }
        });

    }

    $("#city_id").change(function () {
        var bootstrapValidator = $('#add_activity').data('bootstrapValidator');
        bootstrapValidator.enableFieldValidators('mosque_id', true);
        bootstrapValidator.enableFieldValidators('neighborhood_id', true);

        let city_id = $("#city_id").val();
        $.get('../../api/city/neighorhood/' + city_id, (data) => {
            let neighborhoods = "";
            let option = "";
            $.each(data, function (k, v) {
                option = "<option value='" + v.id + "'>" + v.name + "</option>";
                neighborhoods += option;
            });
            $("#neighborhood_id").html(neighborhoods);
            if (neighborhoods.length === 0) {
                var error = '<small class="help-block" data-bv-validator="notEmpty" data-bv-for="neighborhood_id" data-bv-result="INVALID" style="">لا يوجد أحياء في هذه المدينه</small>';
                $("#neighborhood_id .help-block").html(error);
            } else {
                var bootstrapValidator = $('#add_activity').data('bootstrapValidator');
                bootstrapValidator.enableFieldValidators('neighborhood_id', false);
                mosques();
            }
        });

    });

    $("#neighborhood_id").change(function () {
        var bootstrapValidator = $('#add_activity').data('bootstrapValidator');
        bootstrapValidator.enableFieldValidators('mosque_id', true);
        mosques();
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