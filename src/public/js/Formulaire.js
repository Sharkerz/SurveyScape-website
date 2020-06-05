$(document).ready(function () {

  $(document).on("click", ".Formulaire", function () {
      var form_id = $(this).attr("id");
      document.location.href="/formulaires/" + form_id + ""
  });

  $('#Modify_Form').on("click", function () {
    document.location.href="/formulaires/" + id_form + "/edit"
});

});
