$(document).ready(function() {
    $('#itemList').change(function(){
        $('#satuan').text($(this).find(':selected').data('satuan'));
    });

    $('#btn-delete').click(function(){
        $.confirm({
            theme: 'supervan'
        });
    })
});