$(document).ready(function () {

    /* ==rendre obligatoire choix multiple == */

    //div qui comprend toutes les questions
    var main_div = $("#questions")[0];

    //liste des questions
    var questions = Array.prototype.slice.call(main_div.children);

        questions.forEach(input => {
        var type = input.children[1].children[0].value;

        if(type === "Choix multiples") {
            //input de la question
            first_input = input.children[1].children[1].children[0];
            first_input.setAttribute("required", "");
        }
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
