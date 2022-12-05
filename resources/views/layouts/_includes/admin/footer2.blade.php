<script>
    function dataConfirmDelete() {
        $('a[data-confirm]').click(function(ev) {
            var href = $(this).attr('href');
            if (!$('#confirm-delete').length) {
                $('table').append(
                    '<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"> <div class="modal-header"> <h5 class="modal-title" id="exampleModalLabel">Eliminar os dados</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza que pretende eliminar?</div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button> <a  class="btn btn-info" id="dataConfirmOk">Eliminar</a> </div></div></div></div>'
                );
            }
            $('#dataConfirmOk').attr('href', href);
            $('#confirm-delete').modal({
                shown: true
            });
            return false;

        });
     
        // (function() {
        //     $('.table-responsive').on('shown.bs.dropdown', function(e) {
        //         var $table = $(this),
        //             $menu = $(e.target).find('.dropdown-menu'),
        //             tableOffsetHeight = $table.offset().top + $table.height(),
        //             menuOffsetHeight = $menu.offset().top + $menu.outerHeight(true);

        //         if (menuOffsetHeight > tableOffsetHeight)
        //             $table.css("padding-bottom", menuOffsetHeight - tableOffsetHeight);
        //     });

        //     $('.table-responsive').on('hide.bs.dropdown', function() {
        //         $(this).css("padding-bottom", 0);
        //     })
        // })();

        

    

    }

    function modalAcessos(id) {

        // $('table').load('{{include('admin.filhos1.modal')');
        // $('table').append(
        //     ' <div class="modal fade" id="exampleModal'+id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModal'+id+'Label" aria-hidden="true">' +
        //     '<div class="modal-dialog" role="document">' +
        //     '<div class="modal-content">' +
        //     '<div class="modal-header  d-flex justify-content-center">' +
        //     '<h5 class="modal-title " id="exampleModalLabel">Tempos de acesso na plataforma</h5></div>' +
        //     '<div class = "modal-body">' +
        //     '</div>' +
        //     '<div class="modal-footer">' +
        //     '<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>' +

        //     '</div>' +
        //     '</div>' +
        //     '</div>' +
        //     ' </div>');
    };
    // function modalAcessos() {
    //     $('table').append(
    //         ' <div class="modal fade" id="exampleModal10" tabindex="-1" role="dialog" aria-labelledby="exampleModal10Label" aria-hidden="true">' +
    //         '<div class="modal-dialog" role="document">' +
    //         '<div class="modal-content">' +
    //         '<div class="modal-header  d-flex justify-content-center">' +
    //         '<h5 class="modal-title " id="exampleModalLabel">Tempos de acesso na plataforma</h5></div>' +
    //         '<div class = "modal-body">' +
    //         '</div>' +
    //         '<div class="modal-footer">' +
    //         '<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>' +

    //         '</div>' +
    //         '</div>' +
    //         '</div>' +
    //         ' </div>');
    // };
    // function acoes(){
    //     $('a[idCand]').click(function(ev) {
    //     alert($(this).attr("idCand"))
    //     });   
    // }
</script>
