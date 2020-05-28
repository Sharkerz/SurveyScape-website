/* Supprimer un ami */
$(document).ready(function () {


    $('.confirm_delete_friend').click(function () {
        var id = $(this).val();
        console.log(id);
        $.ajax({
            type: 'POST',
            url: '/Delete_friend',
            data: {'id_ami':id},
            success: function (Response) {
                id_deleted = Response.supprime;
                document.getElementById('friend-' + id_deleted).innerHTML = '';
            },
        });
    })

});

