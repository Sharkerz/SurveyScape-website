$(document).ready(function () {

/* ================
Options des questions
================= */

/* Question choix multiples */
    n_multiple = 2;

$(document).on("click", "i.material-icons.add_option", function () {

    // Laisser le texte dans les options précédantes a l'ajout d'une option
    var value_options = Array.prototype.slice.call($(this).parents().get(1).children[0].children);
    value_options.forEach(child => child.children[0].children[0].setAttribute("value", child.children[0].children[0].value));

    // Ajout d'une option
    $(this).parents().get(1).children[0].innerHTML += '                <div class="row">\n' +
        '                    <div class="col-5">\n' +
        '                        <input type="text" class="form-control" placeholder="Choix ' + n_multiple + '" required>\n' +
        '                    </div>\n' +
        '                </div>';
    n_multiple++;
});


/* ================
Choix type de question
================= */

$(document).on("change", "select.form-control.select_type", function (e) {
    var choice = $(this)[0].value;
    var div_question = $(this).closest(".div_question")[0];

    /* Question à choix multiple */
    if(choice === "Choix multiples") {
        div_question.innerHTML = '        <form name="quest_1">\n' +
            '            <!-- Ligne titre + choix type -->\n' +
            '            <div class="row">\n' +
            '                <div class="col-6">\n' +
            '                    <input type="text" class="form-control title_question" name="question" placeholder="Question numero 1" required>\n' +
            '                </div>\n' +
            '                <div class="col"></div>\n' +
            '                <div class="col-3">\n' +
            '                    <select class="form-control select_type">\n' +
            '                        <option value="Choix multiples"> Choix multiples</option>\n' +
            '                        <option value="Texte"> Texte</option>\n' +
            '                        <option>Soon</option>\n' +
            '                    </select>\n' +
            '                </div>\n' +
            '            </div>\n' +
            '\n' +
            '            <!-- Case reponses questions -->\n' +
            '            <div class="multipleChoice">\n' +
            '                <div class="choices">\n' +
            '                    <div class="row">\n' +
            '                        <div class="col-5">\n' +
            '                            <input type="text" class="form-control" placeholder="Choix 1" required>\n' +
            '                        </div>\n' +
            '                    </div>\n' +
            '                </div>\n' +
            '                <div class="row">\n' +
            '                    <i class="material-icons add_option">add</i>\n' +
            '                </div>\n' +
            '            </div>\n' +
            '\n' +
            '        </form>';
    }
    else if(choice === "Texte") {
        div_question.innerHTML = '        <form name="quest_1">\n' +
        '            <!-- Ligne titre + choix type -->\n' +
        '            <div class="row">\n' +
        '                <div class="col-6">\n' +
        '                    <input type="text" class="form-control title_question" name="question" placeholder="Question numero 1" required>\n' +
        '                </div>\n' +
        '                <div class="col"></div>\n' +
        '                <div class="col-3">\n' +
        '                    <select class="form-control select_type">\n' +
        '                        <option value="Texte"> Texte</option>\n' +
        '                        <option value="Choix multiples"> Choix multiples</option>\n' +
        '                        <option>Soon</option>\n' +
        '                    </select>\n' +
        '                </div>\n' +
        '            </div>\n' +
        '\n' +
        '            <!-- Case reponses questions -->\n' +
        '            <div class="multipleChoice">\n' +
        '                <div class="choices">\n' +
        '                    <div class="row">\n' +
        '                        <div class="col-5">\n' +
        '                            <input id="disabledTextInput" type="text" class="form-control" placeholder="Reponse" required disabled>\n' +
        '                        </div>\n' +
        '                    </div>\n' +
        '                </div>\n' +
        '            </div>\n' +
        '\n' +
        '        </form>';
    }

    e.preventDefault();
})

});
