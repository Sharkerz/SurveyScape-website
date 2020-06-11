$(document).ready(function () {

  $(document).on("click", ".Formulaire", function () {
      var form_id = $(this).attr("id");
      document.location.href="/formulaires/" + form_id + ""
  });

  $('#Modify_Form').on("click", function () {
    document.location.href="/formulaires/" + id_form + "/edit"
});

// Background personnalisé
function background() {
    if ($("#background")[0] !== undefined) { //Si le formulaire possède un background
        var filename = $("#background")[0].value;
        document.body.style.background = "url('../Images/background_form/"+ filename +"') repeat fixed";
    }
}
background();

});
