/*
Copie du bearer token dans le presse papier
*/

var copyBtn   = $("#copyApi"),
    input     = $("#token");

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
    $("#alert_token")[0].style.display = "block";
    const start = Date.now();

    setTimeout(() => {
        $("#alert_token")[0].style.display = "none";
    }, 3000);

}
