$(document).ready(function () {
    $("#type_id").select2();
    $("#suggestion_form").submit((e) => {
        e.preventDefault();
        var form = new FormData();
        form.append("name", $("#suggestion_name").val());
        form.append("type_id", $("#type_id").val());
        form.append("body", $("#suggestion_body").val());

        var settings = {
            "async": true,
            "crossDomain": true,
            "url": "api/suggestion/add",
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
});