$(document).ready(function() {
    
    $('#field_object_value').closest("div.form-group").css('display', 'none');
    $('#field_self_value').closest("div.form-group").css('display', 'none');
    $('#field_field_value').closest("div.form-group").css('display', 'none');


    $('#value_type').change(function(e) {
        e.preventDefault();
        var selectType = $('#value_type').val();
        if (selectType == 2 || selectType == 3)
        {
            if ($('#assign_type').val() == 1)
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
            "value_type": selectType
        }, function(data) {
            var display_type = $('#display_type');
            display_type.empty();
            $.each(data.display_types, function(key, value) {
                $('<option>').val(key).text(value).appendTo(display_type);
            });
        });
    });


    $('#assign_type').change(function(e) {
        var assign_type = $('#assign_type').val();
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
                if ($('#value_type').val() != 1)
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
            "value_assign_type": $('#assign_type').val()
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

    $('#value_type').trigger('change');
    $('#assign_type').trigger('change');


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