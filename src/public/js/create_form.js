$(document).ready(function () {

/* Question choix multiples */

    n_multiple = 2;

$(".add_option").click(function () {

    $(this).parents().get(1).children[0].

    $(this).parents().get(1).children[0].innerHTML += '                <div class="row">\n' +
        '                    <div class="col-5">\n' +
        '                        <input type="text" class="form-control" placeholder="Choix ' + n_multiple + '" required>\n' +
        '                    </div>\n' +
        '                </div>';
    n_multiple++;
});

});
