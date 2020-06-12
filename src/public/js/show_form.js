$(document).ready(function () {
    $(document).on("click", ".Afficher_Reponses", function () {
        var button = $(this)[0].style.display = 'none';
        var new_reponses = $(this)[0].closest(".div_question").children[1].children[4].children;
        var array =[];
        for(var i=0; i <new_reponses.length;i++){
           array.push(new_reponses[i])
        };
        array.forEach(element => {
            element.style.display = "block";
        });

        var div = $(this)[0].closest(".div_question").children[1];
        div.innerHTML += '<button type="button" class="btn btn-light Masquer_Reponses">Masquer les réponses</button>'
    });

    $(document).on("click", ".Masquer_Reponses", function () {
        var button = $(this)[0].style.display = 'none';
        var new_reponses = $(this)[0].closest(".div_question").children[1].children[4].children;
        var array =[];
        for(var i=0; i <new_reponses.length;i++){
           array.push(new_reponses[i])
        };
        array.forEach(element => {
            element.style.display = 'none';
        });
        var div = $(this)[0].closest(".div_question").children[1].children[3].style.display = 'block';
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
  