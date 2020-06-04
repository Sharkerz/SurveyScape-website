$(document).ready(function () {
  console.log('test');

  $(document).on("click", ".Formulaire", function () {
      var form_id = $(this).attr("id");
      document.location.href="/formulaires/" + form_id + "/edit"
  });

});
