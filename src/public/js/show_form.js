$(document).ready(function () {

    function delete_form(id){
        $.ajax({
            type: 'post',
            url: '/delete_form',
            data: {'id' : id},
            success : function(){ // renvoie sur la liste des formulaires
                document.location.href="/formulaires";  
            }
        })
    }
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

      //Suppression du Formulaire
      $('#Delete_Form').on("click", function () {
        var id_form = $(this).closest('.container')[0].children[0].value;
        delete_form(id_form);
    });

 
  
  //copie du lien de partage

    /*
Copie du bearer token dans le presse papier
*/

var copyBtn   = $("#btn_copy"),
    input     = $("#input_sharelink");

function copyToClipboardFF(text) {
    window.prompt ("Copy to clipboard: Ctrl C, Enter", text);
}

function copyToClipboard() {
    var success   = true,
        range     = document.createRange(),
        selection;

    // For IE.
    if (window.clipboardData) {
        window.clipboardData.setData("Text", input.val());
    } else {
        // Create a temporary element off screen.
        var tmpElem = $('<div>');
        tmpElem.css({
            position: "absolute",
            left:     "-1000px",
            top:      "-1000px",
        });
        // Add the input value to the temp element.
        tmpElem.text(input.val());
        $("body").append(tmpElem);
        // Select temp element.
        range.selectNodeContents(tmpElem.get(0));
        selection = window.getSelection ();
        selection.removeAllRanges ();
        selection.addRange (range);
        // Lets copy.
        try {
            success = document.execCommand ("copy", false, null);
        }
        catch (e) {
            copyToClipboardFF(input.val());
        }
        if (success) {
            alertCopy();
            // remove temp element.
            tmpElem.remove();
        }
    }
}

copyBtn.on('click', copyToClipboard);

function alertCopy() {
    $("#alert_copy")[0].style.visibility = "visible";
    const start = Date.now();

    setTimeout(() => {
        $("#alert_copy")[0].style.visibility = "hidden";
    }, 3000);

}

// Acces au formulaire
    $("#btn_acceder").click(function () {
        var link = $(this)[0].value;
        window.location = link;
    });

//Partager le formulaire avec ses amis
    $("#Share_Form").click(function () {
        $("#window_share")[0].style.visibility = "visible";
    });

    $("#close_share").click(function () {
        $("#window_share")[0].style.visibility = "hidden";
    });

    list_id = [];
    //ajout d'un amis a la liste
    $(document).on('click', '.amis-item', function () {

        var id = $(this)[0].dataset.value;
        var name = $(this)[0].innerText;

        if(list_id.includes(id) === false) {
            list_id.push(id);
            $("#amis_toshare")[0].innerHTML += " <div class='item-friend-toshare'> <span class=\"badge badge-primary\">"+ name +"</span>" +
                "<input type='hidden' value='"+ id +"' name='id_friend-"+ id +"'> </div>"
        }
    });

    $(document).on('click', '.item-friend-toshare', function () {
        var id = $(this)[0].dataset.value;

        $(this)[0].remove();
        list_id.splice(id);

    })

});
