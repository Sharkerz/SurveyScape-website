$(document).ready(function () {
  console.log('test');

  $(document).on("click", ".Formulaire", function () {
    var form = $(this).attr('id');
    $.ajax({
      type: 'post',
      url: '/edit_Formulaire',
      data: {'formulaire':form},
      success: function (Response) {
        id_form = Response.id_form;
        document.location.href="http://127.0.0.1:8000/formulaires/edit/"+id_form+"";
      },
      })
  })

})