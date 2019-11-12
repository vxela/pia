$(document).ready(function() {
    $('#itemList').change(function(){
        $('#satuan').text($(this).find(':selected').data('satuan'));
    });
});