

function Rezept(id, title, flag, subtitle, description, info, origin, time, tags, imagePath, country, zutatenListe) {

  this.id = id;
  this.title = title;
  this.flag = flag;
  this.subtitle = subtitle
  this.description = description;
  this.info = info;
  this.origin = origin;
  this.time = time;
  this.tags = tags;
  this.imagePath = imagePath;
  this.country = country;
  this.zutatenListe = zutatenListe;

  this.IsPescetarian = function () {
    var containsFish = false;
    var containsMeat = false;
    var zutat = "";
    for (var i = 0; i < zutatenListe.length; i++) {
      zutat = ZutatNachIdSuchen(zutatenListe[i]);
      if (zutat.fisch == true ) {
        containsFish = true;
      }
      if(zutat.fleisch == true)
      {
        containsMeat = true;
      }
    }
    if(containsFish && !containsMeat)
      return true;
    else
      return false;
    }

  this.IsVegan = function () {
    var zutat = "";
    for (var i = 0; i < zutatenListe.length; i++) {
      zutat = ZutatNachIdSuchen(zutatenListe[i]);
      if (zutat.vegan == false) {
        return false;
      }
    }
    return true;
  }


  this.IsVegetarian = function () {
    var zutat = "";
    for (var i = 0; i < zutatenListe.length; i++) {
      zutat = ZutatNachIdSuchen(zutatenListe[i]);
      if (zutat.veget == false) {
        return false;
      }
    }
    return true;
  }

  this.IsMeat = function () {
    var zutat = "";
    for (var i = 0; i < zutatenListe.length; i++) {
      zutat = ZutatNachIdSuchen(zutatenListe[i]);
      if (zutat.fleisch == true) {
        return true;
      }
    }
    return false;
  }

  this.IsFish = function () {
    var zutat = "";
    for (var i = 0; i < zutatenListe.length; i++) {
      zutat = ZutatNachIdSuchen(zutatenListe[i]);
      if (zutat.fisch == true) {
        return true;
      }
    }
    return false;
  }

  this.IsNutFree = function () {
    var zutat = "";
    for (var i = 0; i < zutatenListe.length; i++) {
      zutat = ZutatNachIdSuchen(zutatenListe[i]);
      if (zutat.nüsse == true) {
        return false;
      }
    }
    return true;
  }

  this.IsGlutenFree = function () {
    var zutat = "";
    for (var i = 0; i < zutatenListe.length; i++) {
      zutat = ZutatNachIdSuchen(zutatenListe[i]);
      if (zutat.gluten == true) {
        return false;
      }
    }
    return true;
  }

  this.IsLactoseFree = function () {
    var zutat = "";
    for (var i = 0; i < zutatenListe.length; i++) {
      zutat = ZutatNachIdSuchen(zutatenListe[i]);
      if (zutat.lactose == true) {
        return false;
      }
    }
    return true;
  }

}


function FilterRecipeByInfo(value) {
  var resultList = new Array();
  var recipelist = new Array();


  switch (value) {

    case "IsPescetarian":
      for (var i = 0; i < rezepte.length; i++) {
        if (rezepte[i].IsPescetarian() == true) {
          resultList.push(rezepte[i]);
        }
      }
      break;

    case "IsVegetarian":
      for (var i = 0; i < rezepte.length; i++) {
        if (rezepte[i].IsVegetarian() == true) {
          resultList.push(rezepte[i]);
        }
      }
      break;

    case "IsVegan":
      for (var i = 0; i < rezepte.length; i++) {
        if (rezepte[i].IsVegan()) {
          resultList.push(rezepte[i]);
        }
      }
      break;

    case "IsNutFree":
      for (var i = 0; i < rezepte.length; i++) {
        if (rezepte[i].IsNutFree() == true) {
          resultList.push(rezepte[i]);
        }
      }
      break;

    case "IsGlutenFree":
      for (var i = 0; i < rezepte.length; i++) {
        if (rezepte[i].IsGlutenFree() == true) {
          resultList.push(rezepte[i]);
        }
      }
      break;

    case "IsLactoseFree":
      for (var i = 0; i < rezepte.length; i++) {
        if (rezepte[i].IsLactoseFree() == true) {
          resultList.push(rezepte[i]);
        }
      }
      break;

  }
  return resultList
}


function ZutatNachIdSuchen(gesuchteId) {

  var gefundeneZutat = null;
  for (var i = 0; i < Zutaten.length; i++) {
    if (gesuchteId == Zutaten[i].id) {
      gefundeneZutat = Zutaten[i];
      break;
    }
  }
  return gefundeneZutat;
}




function GetInfo() {
  var info = "";

  if (IsVegetarian() == true) {
    info += "|Vegetarisch| ";
  }

  if (IsVegan() == true) {
    info += "|Vegan| ";
  }

  if (IsMeat() == true) {
    info += "|Fleisch| ";
  }

  if (IsFish() == true) {
    info += "|Fisch| ";
  }

  if (IsMeat() == false) {
    if (IsFish() == true) {

      info += "|Pescetarisch| ";
    }
  }

  if (IsNutFree() == false) {
    info += "|Enthält Nüsse| ";
  }

  if (IsGlutenFree() == true) {
    info += "|Glutenfrei| ";
  }

  if (IsLactoseFree() == true) {
    info += "|Lactosefrei| ";
  }

  return info;

}

var rezepte = [// title,       flag,         subtitle,            description,                      info,                origin,       time,      tags,           imagePath, country, zutatenListe
  new Rezept(1, "Souvlaki mit Tzatziki", "em-flag-gr", "/suvˈlɑ kyɑ/", "blablablablablablablablabla", "Vegetarisch, Ohne Nüsse", "eu", "20 min", "Greek, Fleisch", "souvlaki.jpg", "Griechenland", [17, 18, 19, 20, 21, 22, 23]),
  new Rezept(2, "Bockwurst & S-kraut", "em-de", "/'bɔkvʊrst/", "blablablablablablablabla", "Fleischetarisch, mit sehr viel Nüssen", "eu", "20 min", "Deutsch, Fleisch", "gerichtsart.jpg", "Deutschland", [24, 25]),
  new Rezept(3, "Saltimbocca", "em-flag-it", "/saltimˈbokka/", "blablablablablablablablabla", "Nicht so Vegi", "eu", "25 min", "Italian, Gebraten, Und so", "bocca.jpg", "Italien", [26, 27, 28, 21]),
  new Rezept(4, "Pistache Glace", "em-flag-mx", "/'asdagasfad/", "blablablablablablablabla", "Vegi, mit sehr viel Nüssen", "na", "40 min", "Mexican, Icecream", "dessert.jpg", "Mexico", [29, 30, 31, 32]),
  new Rezept(5, "Mezze", "em-flag-tr", "/ˈmɛzeɪ/", "blablablablablablablablabla", "Fleisch undso", "as", "60 min", "Türkei, Fleisch", "mezze.jpg", "Türkei", [33, 34, 35, 36, 37, 32, 18, 20, 14, 6]),
  new Rezept(6, "Rösti", "em-flag-ch", "/ˈrəːsti/", "blablablablablablablabla", "Vegi", "eu", "40 min", "Schweiz, Härdöpfel", "rosti.jpg", "Schweiz", [38, 39, 40, 41]),
  new Rezept(7, "Shashlik", "em-flag-kz", "/shashlýk/", "blablablablablablablabla", "Nöd eso Vegi", "as", "60 min", "Kazakhstan, Grill", "Shashlik.jpg", "Kazakhstan", [42, 43, 12, 20, 22]),
  new Rezept(8, "Ramen", "em-flag-jp", "/ramen/", "blablablablablablablabla", "Nöd eso Vegi", "as", "120 min", "Japan, Suppe", "Ramen.jpg", "Japan", [44, 45, 46, 47, 1]),
  new Rezept(9, "Lachssalat", "em-flag-jp", "/leksseled/", "blablablablablablablabla", "fishyboi", "as", "15 min", "Japan, Salat", "Ramen.jpg", "Japan", [48, 49, 46, 20]),
  new Rezept(10, "Bauchspeckshecht", "em-de", "/bechspeckshaicht/", "blablablablablablablabla", "fishyboi", "eu", "30 min", "Deutschland, Fisch", "Ramen.jpg", "Japan", [50, 5, 38]),
];

function FilterListByProperty(list, key, value) {
  var resultList = new Array();
  var object;
  for (var i = 0; i < list.length; i++) {
    object = list[i];
    if (object[key] == value) {
      resultList.push(object);
    }
  }
  return resultList;
}

function Zutat(id, name, mehrzahl, veget, vegan, fleisch, fisch, nüsse, gluten, lactose) {

  this.id = id;
  this.name = name;
  this.mehrzahl = mehrzahl;
  this.veget = veget;
  this.vegan = vegan;
  this.fleisch = fleisch;
  this.fisch = fisch;
  this.nüsse = nüsse;
  this.gluten = gluten;
  this.lactose = lactose
}


var Zutaten = [ //             veget, vegan, fleisch, fisch, nüsse, gluten, lactose
  new Zutat(1, "Alge", "Algen", true, true, false, false, false, false, false),
  new Zutat(2, "Ananas", "Ananasse", true, true, false, false, false, false, false),
  new Zutat(3, "Anchovis", "Anchovis", false, false, false, true, false, false, false),
  new Zutat(4, "Basilikum", "Basilikum", true, true, false, false, false, false, false),
  new Zutat(5, "Bauchspeck", "Bauchspeck", false, false, true, false, false, false, false),
  new Zutat(6, "Brot", "Brote", true, true, false, false, false, true, false),
  new Zutat(7, "Haselnuss", "Haselnüsse", true, true, false, false, true, false, false),
  new Zutat(8, "Milch", "Milch", true, false, false, false, false, false, true),
  new Zutat(9, "Honig", "Honig", true, false, false, false, false, false, false),
  new Zutat(10, "Cashew", "Cashews", true, true, false, false, true, false, false),
  new Zutat(11, "Champignon", "Champignons", true, true, false, false, false, false, false),
  new Zutat(12, "Chilli", "Chillis", true, true, false, false, false, false, false),
  new Zutat(13, "Chinakohl", "Chinakohl", true, true, false, false, false, false, false),
  new Zutat(14, "Dattel", "Datteln", true, true, false, false, false, false, false),
  new Zutat(15, "Dill", "Dill", true, true, false, false, false, false, false),
  new Zutat(16, "Dinkelmehl", "Dinkelmehl", true, true, false, false, false, true, false),
  new Zutat(17, "Hackfleisch", "Hackfleisch", false, false, true, false, false, false, false),
  new Zutat(18, "Yoghurt", "Yoghurt", true, false, false, false, false, false, true),
  new Zutat(19, "Gurke", "Gurken", true, true, false, false, false, false, false),
  new Zutat(20, "Knoblauch", "Knoblauch", true, false, false, false, false, false, false),
  new Zutat(21, "Olivenöl", "Olivenöl", true, true, false, false, false, false, false),
  new Zutat(22, "Zwiebel", "Zwiebeln", true, false, false, false, false, false, false),
  new Zutat(23, "Zitrone", "Zitronen", true, true, false, false, false, false, false),
  new Zutat(24, "Bockwurst", "Bockwürste", false, false, true, false, false, false, false),
  new Zutat(25, "Sauerkraut", "Sauerkraut", true, true, false, false, false, false, false),
  new Zutat(26, "Salbei", "Salbei", true, true, false, false, false, false, false),
  new Zutat(27, "Kalbsplätzchen", "Kalbsplätzchen", false, false, true, false, false, false, false),
  new Zutat(28, "Rohschinken", "Rohschinken", false, false, true, false, false, false, false),
  new Zutat(29, "Pistache", "Pistache", true, true, false, false, false, false, false),
  new Zutat(30, "Zucker", "Zucker", true, true, false, false, false, false, false),
  new Zutat(31, "Ei", "Eier", true, false, false, false, false, false, false),
  new Zutat(32, "Rahm", "Rahm", true, false, false, false, false, false, true),
  new Zutat(33, "Tülüm Käse", "Tülüm Käse", true, false, false, false, false, false, true),
  new Zutat(34, "Falafel", "Falafel", true, true, false, false, false, false, false),
  new Zutat(35, "Obergine", "Oberginen", true, true, false, false, false, false, false),
  new Zutat(36, "Tomate", "Tomaten", true, true, false, false, false, false, false),
  new Zutat(37, "Bulgur", "Bulgur", true, true, false, false, false, true, false),
  new Zutat(38, "Kartoffel", "Kartoffeln", true, true, false, false, false, false, false),
  new Zutat(39, "Butter", "Butter", true, false, false, false, false, false, true),
  new Zutat(40, "Salz", "Salz", true, true, false, false, false, false, false),
  new Zutat(41, "Pfeffer", "Pfeffer", true, true, false, false, false, false, false),
  new Zutat(42, "Lammfleisch", "Lammfleisch", false, false, true, false, false, false, false),
  new Zutat(43, "Essig", "Essig", true, true, false, false, false, false, false),
  new Zutat(44, "Ramennudeln", "Ramennudeln", true, false, false, false, false, true, false),
  new Zutat(45, "Entrecote", "Entrecote", false, false, true, false, false, false, false),
  new Zutat(46, "Misopaste", "Misopaste", true, true, false, false, false, true, false),
  new Zutat(47, "Sojasosse", "Sojasosse", true, true, false, false, false, true, false),
  new Zutat(48, "Lachsfilet", "Lachsfilet", false, false, false, true, false, false, false),
  new Zutat(49, "Salat", "Salat", true, true, false, false, false, false, false),
  new Zutat(50, "Hecht", "Hecht", false, false, false, true, false, false, false),
];

function RezeptNachIdSuchen(gesuchteId) {

  var gefundenesRezept = null;
  for (var i = 0; i < rezepte.length; i++) {
    if (gesuchteId == rezepte[i].id) {
      gefundenesRezept = rezepte[i];
      break;
    }
  }
  return gefundenesRezept;
}


function RezeptNachNameSuchen(gesuchterName) {

  var gefundeneRezepte = [];
  for (var i = 0; i < rezepte.length; i++) {
    if (rezepte[i].title.includes(gesuchterName)) {
      gefundeneRezepte.push(rezepte[i]);
    }
  }
  return gefundeneRezepte;
}

function ZutatNachNameSuchen(gesuchterName) {

  var gefundeneZutaten = [];
  for (var i = 0; i < Zutaten.length; i++) {
    if (Zutaten[i].name.includes(gesuchterName)) {
      gefundeneZutaten.push({ value: Zutaten[i].name });
    }
  }
  return gefundeneZutaten;
}



function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function (e) {
    var a, b, i, val = this.value;
    /*close any already open lists of autocompleted values*/
    closeAllLists();
    if (!val) { return false; }
    currentFocus = -1;
    /*create a DIV element that will contain the items (values):*/
    a = document.createElement("DIV");
    a.setAttribute("id", this.id + "autocomplete-list");
    a.setAttribute("class", "autocomplete-items");
    /*append the DIV element as a child of the autocomplete container:*/
    this.parentNode.appendChild(a);
    /*for each item in the array...*/
    for (i = 0; i < arr.length; i++) {
      /*check if the item starts with the same letters as the text field value:*/
      if (arr[i].title.substr(0, val.length).toUpperCase() == val.toUpperCase()) {
        /*create a DIV element for each matching element:*/
        b = document.createElement("DIV");
        /*make the matching letters bold:*/
        b.innerHTML = "<strong>" + arr[i].title.substr(0, val.length) + "</strong>";
        b.innerHTML += arr[i].title.substr(val.length);
        /*insert a input field that will hold the current array item's value:*/
        b.innerHTML += "<input type='hidden' value='" + arr[i].title + "'>";
        /*execute a function when someone clicks on the item value (DIV element):*/
        b.addEventListener("click", function (e) {
          /*insert the value for the autocomplete text field:*/
          inp.value = this.getElementsByTagName("input")[0].value;
          /*close the list of autocompleted values,
          (or any other open lists of autocompleted values:*/
          closeAllLists();
        });
        a.appendChild(b);
      }
    }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function (e) {
    var x = document.getElementById(this.id + "autocomplete-list");
    if (x) x = x.getElementsByTagName("div");
    if (e.keyCode == 40) {
      /*If the arrow DOWN key is pressed,
      increase the currentFocus variable:*/
      currentFocus++;
      /*and and make the current item more visible:*/
      addActive(x);
    } else if (e.keyCode == 38) { //up
      /*If the arrow UP key is pressed,
      decrease the currentFocus variable:*/
      currentFocus--;
      /*and and make the current item more visible:*/
      addActive(x);
    } else if (e.keyCode == 13) {
      /*If the ENTER key is pressed, prevent the form from being submitted,*/
      e.preventDefault();
      if (currentFocus > -1) {
        /*and simulate a click on the "active" item:*/
        if (x) x[currentFocus].click();
      }
    }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
    closeAllLists(e.target);
  });
}





