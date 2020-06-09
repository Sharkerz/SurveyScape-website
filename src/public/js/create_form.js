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
    value_options.forEach(child => child.children[0].children[1].setAttribute("value", child.children[0].children[1].value));

    var i = 1;
    value_options.forEach(child => {

        var choice = child.children[0].children[1];
        choice.setAttribute("placeholder", "Choix " + i);
        choice.setAttribute("name", num_question.value + '-' + i);
        i++;
    });

    // Ajout d'une option
    $(this).parents().get(1).children[1].innerHTML += '                <div class="row">\n' +
        '                    <div class="col-5">\n' +
        '                               <input type="hidden" id="id_question"  value="'+nb_choices+'" ></input>\n' +
        '                        <input name="' + num_question.value + '-' + nb_choices + '" type="text" class="form-control" placeholder="Choix ' + nb_choices + '" required>\n' +
        '                    </div>\n' +
        '                   <div class="col-1">\n' +
        '                       <i class="material-icons delete_choice">clear</i>\n' +
        '                   </div>\n' +
        '                </div>';


});


/* ================
Choix type de question
================= */

$(document).on("change", "select.form-control.select_type", function (e) {
    var id_question = $(this).closest(".body_question")[0].children[0].children[0].children[0].value;
    var choice = $(this)[0].value;
    var div_question = $(this).closest(".div_question")[0].children[1];
    var ordre_question = $(this).closest(".div_question")[0].children[0].value;
    /* Question à choix multiple */
    if(choice === "Choix multiples") {
        n_multiple = 2;
        div_question.innerHTML =
            '                        <!-- Ligne titre + choix type -->\n' +
            '                        <div class="row">\n' +
            '                            <div class="col-6">\n' +
            '                                <input type="hidden" id="id_question" name="id_q'+ ordre_question+ '"  value="'+id_question+'" ></input>\n' +
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
            '                <div class=\"col-1\">\n' +
            '                    <i class=\"material-icons delete_question\">clear</i>\n' +
            '                </div>\n' +
            '                        </div>\n' +
            '\n' +
            '                        <!-- Case reponses questions -->\n' +
            '                        <div class="multipleChoice">\n' +
            '<input class="nb_choice" type="hidden" value="1"> <!-- Nombre de choix -->\n' +
            '                            <div class="choices">\n' +
            '                                <div class="row">\n' +
            '                                    <div class="col-5">\n' +
            '                               <input type="hidden" id="id_question"  value="'+ordre_question+'" ></input>\n' +
            '                                        <input type="text" class="form-control" placeholder="Choix 1" name="' + ordre_question + '-1" required>\n' +
            '                                    </div>\n' +
            '                                    <br><br>\n' +
            '                                </div>\n' +
            '                            </div>\n' +
            '                            <div class="row">\n' +
            '                                <i class="material-icons add_option">add</i>\n' +
            '                            </div>\n' +
            '                    </div>';
    }
    else if(choice === "Texte") {
        div_question.innerHTML =
        '            <!-- Ligne titre + choix type -->\n' +
        '            <div class="row">\n' +
        '                <div class="col-6">\n' +
        '                                <input type="hidden" id="id_question" name="id_q'+ ordre_question+ '"  value="'+id_question+'" ></input>\n' +
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
        '                <div class=\"col-1\">\n' +
        '                    <i class=\"material-icons delete_question\">clear</i>\n' +
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
        "                                <input type='hidden' id='id_question' name='id_q" + nb_question + "'  value='"+ nb_question +"' >\n" +
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
        "                            <div class=\"col-1\">\n" +
        "                               <i class=\"material-icons delete_question\">clear</i>\n" +
        "                            </div>\n" +
        "                        </div>\n" +
        "\n" +
        "                        <!-- Case reponses questions -->\n" +
        "                        <div class=\"multipleChoice\">\n" +
        "<input class=\"nb_choice\" type=\"hidden\" value=\"1\"> <!-- Nombre de choix -->\n" +
        "                            <div class=\"choices\">\n" +
        "                                <div class=\"row\">\n" +
        "                                    <div class=\"col-5\">\n" +
        '                               <input type="hidden" id="id_question"  value="'+nb_question+'" ></input>\n' +
        "                                        <input name=\"" + nb_question + "-1\" type=\"text\" class=\"form-control\" placeholder=\"Choix 1\" required>\n" +
        "                                    </div>\n" +
        '                                    <br><br>\n' +
        "                                </div>\n" +
        "                            </div>\n" +
        "                            <div class=\"row\">\n" +
        "                                <i class=\"material-icons add_option\">add</i>\n" +
        "                            </div>\n" +
        "                        </div>\n" +
        "                    </div>\n" +
        "        </div>");
}


/* ================
Fonctionnalités div en haut pour la creation du formulaire
================= */

// Affichage choix date de debut et de fin du formulaire
$("#enableDate").change(function () {
    var checkbox = $("#enableDate")[0];
    // Si c'est coché
    if (checkbox.checked) {
        $("#div_Date")[0].removeAttribute("hidden");
    }
    else {
        $("#div_Date")[0].setAttribute("hidden", true);
        $("#start_date")[0].value = null;
        $("#end_date")[0].value = null;
    }
});


/* ================
Animation au clic d'une question
================= */
var older_selected;
$(document).on("click", ".div_question", function () {
    if (older_selected !== undefined) {
        older_selected.css("border-left", "1.4px solid #E7E7E7");
    }
    older_selected = $(this);
    $(this).css("border-left", "4px solid blue");
});

/* ================
Animation hover icone
================= */

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
});

/* ================
Bouton public/privé
================= */
checkLock();

function checkLock() {
    var current = $("#private_value")[0];
    var icon = $("#btn-lock")[0];

    if(current.value === "0") {
        icon.innerText = "lock_open";
        icon.setAttribute("data-original-title", "Rendre le formulaire privée");
    }
    else if (current.value === "1") {
        icon.innerText = "lock";
        icon.setAttribute("data-original-title", "Rendre le formulaire public");
    }

}

$('#btn-lock').click(function privatelock() {
    var current = $(this)[0].innerText;

    if (current === "lock") {
        $(this)[0].innerText = "lock_open";
        $(this)[0].setAttribute("data-original-title", "Rendre le formulaire privée");
        $("#private_value")[0].value = "0";
    }
    else if (current === "lock_open") {
        $(this)[0].innerText = "lock";
        $(this)[0].setAttribute("data-original-title", "Rendre le formulaire public");
        $("#private_value")[0].value = "1";
    }
});

/* ================
Suppression choix questions multiples
================= */

$(document).on("click", ".delete_choice", function () {
    var id_choice = $(this)[0].closest('.row').children[0].children[0].value;
    delete_choice(id_choice);
    function getSecondPart(str) {
        return str.split('-')[1];
    }

    var choice_selected = $(this)[0].closest(".row");
    var name = getSecondPart(choice_selected.children[0].children[1].name);


    var value_options = Array.prototype.slice.call($(this).closest(".choices")[0].children);
    var num_question = choice_selected.closest(".div_question").children[0];

    choice_selected.remove();

    var i = 1;
    value_options.forEach(child => {
        var choice = child.children[0].children[1];
        if( i >= name) {
            choice.setAttribute("placeholder", "Choix " + (i-1));
            choice.setAttribute("name", num_question.value + '-' + (i-1));
        }
        else {
            choice.setAttribute("placeholder", "Choix " + i);
            choice.setAttribute("name", num_question.value + '-' + i);
        }

        i++;
    });
});

/* ================
Suppression question
================= */

$(document).on("click", ".delete_question", function () {
    var id_question = $(this)[0].closest('.row').children[0].children[0].value;
    delete_question(id_question);
    function getSecondPart(str) {
        return str.split('q')[1];
    }

    function getChoice(str) {
        return str.split('-')[1];
    }

    var question = $(this)[0].closest('.div_question');

    //Liste des questions actuellement presentes
    var list_question = Array.prototype.slice.call($("#questions")[0].children);

    //id question supprimé
    var id = question.children[0].value;

    //suppression de la question
    question.remove();

    //mise a jour de l'odre
    var i = 1;
    list_question.forEach(child => {
        //input des questions
        var input = child.children[1].children[0].children[0].children[1];

        //hidden id
        var hidden = child.children[0];

        //type question
        var type = child.children[1].children[0].children[2].children[0];

        //liste choix
        if(type.value === "Choix multiples") {
            var choices = Array.prototype.slice.call(child.children[1].children[1].children[1].children);
        }

        if(i >= id) {
            input.setAttribute("placeholder", "Question " + (i-1));
            input.setAttribute("name", "q" + (i-1));
            hidden.setAttribute("value", (i-1));
            type.setAttribute("name", "typeq" + (i-1));
            if(type.value === "Choix multiples") {
                choices.forEach(choice => {
                    var choiceQ = choice.children[0].children[0];
                    var choiceOrder = getChoice(choiceQ.name);
                    choiceQ.setAttribute("name", (i - 1) + "-" + choiceOrder)
                })
            }
        }
        else {
            input.setAttribute("placeholder", "Question " + i);
            input.setAttribute("name", "q" + (i));
            hidden.setAttribute("value", (i));
            type.setAttribute("name","typeq" + (i));
            if(type.value === "Choix multiples") {
                choices.forEach(choice => {
                    var choiceQ = choice.children[0].children[0];
                    var choiceOrder = getChoice(choiceQ.name);
                    choiceQ.setAttribute("name", (i) + "-" + choiceOrder)
                })
            }
        }
        i++;
    });
});

function delete_choice(id){
    $.ajax({
        type: 'post',
        url: '/delete_choice',
        data: {'id' : id},
    })
}

function delete_question(id){
    $.ajax({
        type: 'post',
        url: '/delete_question',
        data: {'id' : id},
    })
}

});
