var form = document.getElementById("divid");
var switcher = document.getElementById("switcher");

//console.log(my_var1);
//console.log(my_var2);

/*const data1 = [
  {"id":3, "name":"Book"},
  {"id":4, "name":"DVD Disc"},
  {"id":5, "name":"Furniture"}];

const data2 = [
  {id:1, category_id:3, aName:"Weight"},
  {id:2, category_id:4, aName:"Size"},
  {id:3, category_id:5, aName:"Dimensions"},
  {id:4, category_id:3, aName:"Color"}];*/

createForm("Book"); 

switcher.onchange = function () {
  var selectedValue = switcher.value;

  Clear();
  createForm(selectedValue);

  /*if (selectedValue == "DVD Disc") {
    Clear();
    Disc();
  } else if (selectedValue == "Book") {
    Clear();
    Book();
  } else if (selectedValue == "Furniture") {
    Clear();
    Furniture();
  }*/
}

function Clear() {
  var n = form.childElementCount;
  for (var i = 0; i < n; i++) {
    form.removeChild(document.getElementById("onChange"));
  }
}


function createForm(sel){
  my_var1.forEach(element => {
    if (element.name == sel)
    my_var2.forEach(el => {
        if (element.id == el.category_id)
          Change(element.name, el.aName);
      })
  });
}

function Change(name, aName) {
  var label = document.createElement("Label");
  label.htmlFor = name;
  label.innerHTML = aName;
  label.id = "onChange";

  var disc = document.createElement("input");
  disc.setAttribute("type", "text");
  disc.setAttribute("class", "form-control");
  disc.setAttribute("name", aName);
  disc.setAttribute("required", "");
  disc.setAttribute("id", "onChange");

  var p = document.createElement("p");
  p.innerHTML = "Please, enter " + aName;
  p.setAttribute("class", "tip");
  p.id = "onChange";

  form.appendChild(p);
  form.appendChild(label);
  form.appendChild(disc);
}

/*function Disc() {
  var label = document.createElement("Label");
  label.htmlFor = "DVD Disc";
  label.innerHTML = "Size";
  label.id = "onChange";

  var disc = document.createElement("input");
  disc.setAttribute("type", "text");
  disc.setAttribute("class", "form-control");
  disc.setAttribute("name", "Size");
  disc.setAttribute("placeholder", "10");
  disc.setAttribute("required", "");
  disc.setAttribute("id", "onChange");

  var p = document.createElement("p");
  p.innerHTML = "Please, enter size in MB";
  p.setAttribute("class", "tip");
  p.id = "onChange";

  form.appendChild(p);
  form.appendChild(label);
  form.appendChild(disc);
}

function Book() {
  var label = document.createElement("Label");
  label.htmlFor = "Book";
  label.innerHTML = "Weight";
  label.id = "onChange";

  var book = document.createElement("input");
  book.setAttribute("type", "text");
  book.setAttribute("class", "form-control");
  book.setAttribute("name", "Weight");
  book.setAttribute("placeholder", "2");
  book.setAttribute("required", "");
  book.setAttribute("id", "onChange");


  var p = document.createElement("p");
  p.innerHTML = "Please, enter weight in KG";
  p.setAttribute("class", "tip");
  p.id = "onChange";

  form.appendChild(p);
  form.appendChild(label);
  form.appendChild(book);
}

function Furniture() {
  var d_label = document.createElement("Label");
  d_label.htmlFor = "Dimensions";
  d_label.innerHTML = "Dimensions";
  d_label.id = "onChange";

  var w_label = document.createElement("Label");
  w_label.htmlFor = "Width";
  w_label.innerHTML = "Width";
  w_label.id = "onChange";

  var l_label = document.createElement("Label");
  l_label.htmlFor = "Lenght";
  l_label.innerHTML = "Lenght";
  l_label.id = "onChange";

  var dimensions = document.createElement("input");
  dimensions.setAttribute("type", "text");
  dimensions.setAttribute("class", "form-control");
  dimensions.setAttribute("name", "Dimensions");  
  dimensions.setAttribute("placeholder", "24x45x15");
  dimensions.setAttribute("required", "");
  dimensions.setAttribute("id", "onChange");

  /*var width = document.createElement("input");
  width.setAttribute("type", "text");
  width.setAttribute("class", "form-control");
  width.setAttribute("name", "width");
  width.setAttribute("placeholder", "45");
  width.setAttribute("required", "");
  width.setAttribute("id", "onChange");

  var lenght = document.createElement("input");
  lenght.setAttribute("type", "text");
  lenght.setAttribute("class", "form-control");
  lenght.setAttribute("name", "lenght");
  lenght.setAttribute("placeholder", "15");
  lenght.setAttribute("required", "");
  lenght.setAttribute("id", "onChange");

  var p = document.createElement("p");
  p.innerHTML = "Please, provide dimensions in HxWxL format";
  p.setAttribute("class", "tip");
  p.id = "onChange";

  form.appendChild(p);
  form.appendChild(d_label);
  form.appendChild(dimensions);
 /*form.appendChild(w_label);
  form.appendChild(width);
  form.appendChild(l_label);
  form.appendChild(lenght);
}*/