$(document).ready(function () {

/* ================
Options des questions
================= */

/* Question choix multiples */

$(document).on("click", "i.material-icons.add_option", function () {
    //Nombre de choix actuellement
    var nb_choices = $(this).closest(".multipleChoice")[0].children[1].children.length+1;

    //Id de la question
    var num_question = $(this).closest(".div_question")[0].children[0];

    // Laisser le texte dans les options précédantes a l'ajout d'une option
    var value_options = Array.prototype.slice.call($(this).parents().get(1).children[1].children);
    value_options.forEach(child => child.children[0].children[0].setAttribute("value", child.children[0].children[0].value));

    // Ajout d'une option
    $(this).parents().get(1).children[1].innerHTML += '                <div class="row">\n' +
        '                    <div class="col-5">\n' +
        '                        <input name="' + num_question.value + '-' + nb_choices + '" type="text" class="form-control" placeholder="Choix ' + nb_choices + '" required>\n' +
        '                    </div>\n' +
        '                </div>';
});


/* ================
Choix type de question
================= */

$(document).on("change", "select.form-control.select_type", function (e) {
    var choice = $(this)[0].value;
    var div_question = $(this).closest(".div_question")[0].children[1];
    var ordre_question = $(this).closest(".div_question")[0].children[0].value;
    /* Question à choix multiple */
    if(choice === "Choix multiples") {
        n_multiple = 2;
        div_question.innerHTML =
            '                    <div class="body_question">\n' +
            '                        <!-- Ligne titre + choix type -->\n' +
            '                        <div class="row">\n' +
            '                            <div class="col-6">\n' +
            '                                <input type="hidden" id="id_question" name="id_q'+ ordre_question+ '"  value="'+ordre_question+'" ></input>\n' +
            '                                <input type="text" class="form-control title_question" name="q' + ordre_question + '" placeholder="Question ' + ordre_question + '" required>\n' +
            '                            </div>\n' +
            '                            <div class="col"></div>\n' +
            '                            <div class="col-3">\n' +
            '                                <select class="form-control select_type" name="typeq' + ordre_question + '">\n' +
            '                                    <option value="Choix multiples"> Choix multiples</option>\n' +
            '                                    <option value="Texte"> Texte</option>\n' +
            '                                    <option>Soon</option>\n' +
            '                                </select>\n' +
            '                            </div>\n' +
            '                        </div>\n' +
            '\n' +
            '                        <!-- Case reponses questions -->\n' +
            '                        <div class="multipleChoice">\n' +
            '<input class="nb_choice" type="hidden" value="1"> <!-- Nombre de choix -->\n' +
            '                            <div class="choices">\n' +
            '                                <div class="row">\n' +
            '                                    <div class="col-5">\n' +
            '                                        <input type="text" class="form-control" placeholder="Choix 1" name="' + ordre_question + '-1" required>\n' +
            '                                    </div>\n' +
            '                                </div>\n' +
            '                            </div>\n' +
            '                            <div class="row">\n' +
            '                                <i class="material-icons add_option">add</i>\n' +
            '                            </div>\n' +
            '                        </div>\n' +
            '                    </div>';
    }
    else if(choice === "Texte") {
        div_question.innerHTML = '        <div class="body_question">\n' +
        '            <!-- Ligne titre + choix type -->\n' +
        '            <div class="row">\n' +
        '                <div class="col-6">\n' +
        '                                <input type="hidden" id="id_question" name="id_q'+ ordre_question+ '"  value="'+ordre_question+'" ></input>\n' +
        '                    <input type="text" class="form-control title_question" name="q' + ordre_question + '" placeholder="Question ' + ordre_question + '" required>\n' +
        '                </div>\n' +
        '                <div class="col"></div>\n' +
        '                <div class="col-3">\n' +
        '                    <select class="form-control select_type" name="typeq' + ordre_question + '">\n' +
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
        '        </div>';
    }

    e.preventDefault();
});


/* ================
Ajouter une question
================= */


$("#Add_Question").click(function () {

    //Nombre de questions actuellement
    var nb_question = $("#questions")[0].children.length+1;

    addQuestions(nb_question);
});

function addQuestions(nb_question) {

    $("#questions").append("        <div class=\"div_question\">\n" +
        " <input type='hidden' value='" + nb_question + "'>\n" +
        "                    <div class=\"body_question\">\n" +
        "                        <!-- Ligne titre + choix type -->\n" +
        "                        <div class=\"row\">\n" +
        "                            <div class=\"col-6\">\n" +
        '                                <input type="hidden" id="id_question" name="id_q'+ nb_question+ '"  value="'+nb_question+'" ></input>\n' +
        "                                <input type=\"text\" class=\"form-control title_question\" name=\"q" + nb_question + "\" placeholder=\"Question " + nb_question + "\" required>\n" +
        "                            </div>\n" +
        "                            <div class=\"col\"></div>\n" +
        "                            <div class=\"col-3\">\n" +
        "                                <select class=\"form-control select_type\" name='typeq" + nb_question + "'>\n" +
        "                                    <option value=\"Choix multiples\"> Choix multiples</option>\n" +
        "                                    <option value=\"Texte\"> Texte</option>\n" +
        "                                    <option>Soon</option>\n" +
        "                                </select>\n" +
        "                            </div>\n" +
        "                        </div>\n" +
        "\n" +
        "                        <!-- Case reponses questions -->\n" +
        "                        <div class=\"multipleChoice\">\n" +
        "<input class=\"nb_choice\" type=\"hidden\" value=\"1\"> <!-- Nombre de choix -->\n" +
        "                            <div class=\"choices\">\n" +
        "                                <div class=\"row\">\n" +
        "                                    <div class=\"col-5\">\n" +
        "                                        <input name=\"" + nb_question + "-1\" type=\"text\" class=\"form-control\" placeholder=\"Choix 1\" required>\n" +
        "                                    </div>\n" +
        "                                </div>\n" +
        "                            </div>\n" +
        "                            <div class=\"row\">\n" +
        "                                <i class=\"material-icons add_option\">add</i>\n" +
        "                            </div>\n" +
        "                        </div>\n" +
        "                    </div>\n" +
        "        </div>");
}


});
