$(document).ready(function() {
    $('#itemList').change(function(){
        $('#satuan').text($(this).find(':selected').data('satuan'));
    });

    $('.btn-delete').on('click', function(){
        var id = $(this).data('id_item');
        var method = $(this).data('method');
        var rout = $(this).data('url');
        var _token = $('meta[name="csrf-token"]').attr('content');
        $.confirm({
            title: 'Yakin ingin menghapus?',
            content: 'Data stok yang berkaitan dengan item ini akan terhapus juga', 
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
                        $.ajax({
                            type:'DELETE',
                            url : rout,
                            data : {
                                _token : _token
                            },
                            success : function() {
                                location.reload();
                            }
                        })
                    }
                },
                cancel : {
                    keys: [
                        'ctrl',
                        'shift'
                    ]
                }
            }
        })
    })
});