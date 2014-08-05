$(document).ready(function() {

    $('#field_object_value').closest("div.form-group").css('display', 'none');
    $('#field_self_value').closest("div.form-group").css('display', 'none');
    $('#field_field_value').closest("div.form-group").css('display', 'none');


    $('#select_type').change(function(e) {
        e.preventDefault();
        $.post(BASE, {
            "select_type": $('#select_type').val()
        }, function(data) {
            var field_display_type = $('#field_display_type');
            field_display_type.empty();
            $.each(data.field_display, function(key, value) {
                $('<option>').val(key).text(value).appendTo(field_display_type);
            });
        });
    });


    $('#assign_value_type').change(function(e) {
        var assign_type = $('#assign_value_type').val();
        switch (assign_type)
        {
            case "2":
                $('#field_object_value').closest("div.form-group").css('display', '');
                $('#field_self_value').closest("div.form-group").css('display', 'none');
                $('#field_field_value').closest("div.form-group").css('display', 'none');
                break;
            case "3":
                $('#field_object_value').closest("div.form-group").css('display', 'none');
                $('#field_self_value').closest("div.form-group").css('display', 'none');
                $('#field_field_value').closest("div.form-group").css('display', '');
                break;
            default:
                $('#field_object_value').closest("div.form-group").css('display', 'none');
                $('#field_self_value').closest("div.form-group").css('display', '');
                $('#field_field_value').closest("div.form-group").css('display', 'none');
                break;

        }

        $.post(BASE, {
            "assign_value_type": $('#assign_value_type').val()
        }, function(data) {
            if (data.assignValue != "")
            {

                if ($("#" + data.assignValue.id) != null)
                {
                    var assignObject = $("#" + data.assignValue.id);
                    assignObject.empty();
                    $.each(data.assignValue.data, function(key, value) {
                        $('<option>').val(key).text(value).appendTo(assignObject);
                    });
                }
            }
        });
    });

});