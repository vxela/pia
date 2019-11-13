$(document).ready(function() {
    $('#itemList').change(function(){
        $('#satuan').text($(this).find(':selected').data('satuan'));
    });

    $('#btn-delete').click(function(){
        $.confirm({
            theme: 'modern',
            escapeKey : true,
            backgroundDismiss: true,
            type : 'red',
            buttons : {
                okay : {
                    keys : [
                        'enter'
                    ],
                    action : function() {
                        console.log('okey');
                    }
                },
                cancel : {
                    keys: [
                        'ctrl',
                        'shift'
                    ]
                }
            }
        });
    })
});