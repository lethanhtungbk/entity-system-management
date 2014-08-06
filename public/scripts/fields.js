$(document).ready(function() {

    $('#field_object_value').closest("div.form-group").css('display', 'none');
    $('#field_self_value').closest("div.form-group").css('display', 'none');
    $('#field_field_value').closest("div.form-group").css('display', 'none');


    $('#select_type').change(function(e) {
        e.preventDefault();
        var selectType = $('#select_type').val();
        if (selectType == 2 || selectType == 3)
        {
            if ($('#assign_value_type').val() == 1)
            {
                $('#field_self_value').closest("div.form-group").css('display', '');
            }            
            else
            {
                $('#field_self_value').closest("div.form-group").css('display', 'none');
            }
        }
        else
        {
            $('#field_self_value').closest("div.form-group").css('display', 'none');
        }
        $.post(BASE + "/getFieldDisplay", {
            "select_type": selectType
        }, function(data) {
            var field_display_type = $('#field_display_type');
            field_display_type.empty();
            $.each(data.field_displays, function(key, value) {
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
                if ($('#select_type').val() != 1)
                {
                    $('#field_self_value').closest("div.form-group").css('display', '');
                }
                else
                {
                    $('#field_self_value').closest("div.form-group").css('display', 'none');
                }
                $('#field_field_value').closest("div.form-group").css('display', 'none');
                break;

        }

        $.post(BASE + "/getValueAssignType", {
            "value_assign_type": $('#assign_value_type').val()
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

    $('#select_type').trigger('change');
    $('#field_value_type').trigger('change');


    $('.token-input')
        .on('tokenfield:createdtoken', function(e) {
            alert($('.token-input').tokenfield('getTokensList'));
            
        })
        .on('tokenfield:editedtoken', function(e) {
            alert($('.token-input').tokenfield('getTokensList'));
            
        })
        .on('tokenfield:removedtoken', function(e) {
            alert($('.token-input').tokenfield('getTokensList'));
            
        })
        .tokenfield();
});