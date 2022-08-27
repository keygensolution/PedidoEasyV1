function DeleteObject(id, func, text, url) {
    swal({
            title: "Deletar?",
            text: "Se você confirmar será excluido de forma definitiva!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: 'btn-danger',
            confirmButtonText: 'Deletar!',
            closeOnConfirm: false,
            //closeOnCancel: false
        },
        function () {
            swal("Deletado!", text, "success");
            deleteObject(id, url)
        });
}