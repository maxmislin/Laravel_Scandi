var forms = document.getElementById("forms");

function duplForm() {
    var elmnt = document.getElementById("addForm");
    console.log(elmnt);
    var cln = elmnt.cloneNode(true);
    forms.appendChild(cln);
}
