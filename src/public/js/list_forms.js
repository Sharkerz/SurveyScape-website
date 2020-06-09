$(document).ready(function () {

    $(document).on("click", ".formulaire", function () {
        var form_id = $(this).attr("id");
        document.location.href="/repondre/" + form_id + ""
    });
});
