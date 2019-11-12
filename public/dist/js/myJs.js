$(document).ready(function() {
    $('#itemList').change(function(){
        $('#satuan').text($(this).find(':selected').data('satuan'));
    });

    $('#btn-delete').click(function(){
        console.log('clicked');
        $.confirm({
            theme: 'supervan'
        });
    })
});