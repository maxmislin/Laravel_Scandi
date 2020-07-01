var form = document.getElementById("divid");
var switcher = document.getElementById("switcher");

createForm(categories[0].name); 

switcher.onchange = function () {
  var selectedValue = switcher.value;

  Clear();
  createForm(selectedValue);
}

function Clear() {
  var n = form.childElementCount;
  for (var i = 0; i < n; i++) {
    form.removeChild(document.getElementById("onChange"));
  }
}


function createForm(sel){
  categories.forEach(element => {
    if (element.name == sel)
    atributes.forEach(el => {
        if (element.id == el.category_id)
          Change(element.name, el.aName, el.units);
      })
  });
}

function Change(name, aName, units) {
  var labelInput = document.createElement("Label");
  labelInput.setAttribute("class", "mt-2");
  labelInput.htmlFor = name;
  labelInput.innerHTML = aName;
  labelInput.id = "onChange";

  var input = document.createElement("input");
  input.setAttribute("type", "text");
  input.setAttribute("class", "form-control");
  input.setAttribute("name", aName);
  input.setAttribute("required", "");
  input.setAttribute("id", "onChange");

  var cBox = document.createElement("input");
  cBox.setAttribute("type", "checkbox");
  cBox.setAttribute("name", "hidden")
  cBox.setAttribute("value", "true");
  cBox.setAttribute("class", "ml-1");
  cBox.setAttribute("id", "onChange");

  var labelcBox = document.createElement("Label");
  labelcBox.setAttribute("class", "mt-2");
  labelcBox.htmlFor = "cBox";
  labelcBox.innerHTML = "Hidden";
  labelcBox.id = "onChange";

  var p = document.createElement("p");
  if (units !== null)
    p.innerHTML = "Please, enter " + aName + " in " + units;
  else
    p.innerHTML = "Please, enter " + aName;      
  p.setAttribute("class", "tip");
  p.id = "onChange";

  form.appendChild(p);
  form.appendChild(labelInput);
  form.appendChild(input);
  form.appendChild(labelcBox);
  form.appendChild(cBox);
}