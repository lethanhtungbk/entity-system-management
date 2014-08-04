$(document).ready(function() {
    $('#select_type').change(function(e) {
        e.preventDefault();
        $.post(BASE, {
            "select_type" : $('#select_type').val()
        },function (data) {
            alert('received');
        });
    });
});