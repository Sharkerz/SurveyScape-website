$(document).ready(function () {

    $(document).on("click", ".formulaire", function () {
        var form_token = $(this)[0].children[0].value;
        document.location.href="/repondre/" + form_token + ""
    });
});
