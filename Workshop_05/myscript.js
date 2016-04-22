function echo(msg) {
  window.alert("Echoing: " + msg);
}

function changeIt() {
  var el = document.getElementById("welcome");
  el.innerHTML = "Goodbye, world!";
  el.style.backgroundColor = "#ffcccc";
}

function sortList(listId) {
  var list = document.getElementById(listId);
  var children = list.childNodes;
  // store the contents of all <li> elements in an array
  var listItemsHTML = new Array();
  for (var i = 0; i < children.length; i++) {
    /* the list also contains some "text nodes" representing the whitespace
    between the elements, so we only want to take the <li> elements */
    if (children[i].nodeName === "LI") {
      listItemsHTML.push(children[i].innerHTML);
    }
  }
  // sort the array
  listItemsHTML.sort();
  // replace the contents of the list with it
  list.innerHTML = "";
  for (var i = 0; i < listItemsHTML.length; i++) {
    list.innerHTML += "<li>" + listItemsHTML[i] + "</li>";
  }
}

function ToggleBox(boxID) {
  var box = document.getElementById(boxID);
  box.style.visibility = (box.style.visibility == 'hidden') ? 'visible' : 'hidden';
}

function ThreeBeGone(tableID) {
  var table = document.getElementById(tableID);

  for (var i = 0; row = table.rows[i]; i++) {
    for (var j = 0; col = row.cells[j]; j++) {
      if (col.firstChild.nodeValue == '3') {
        table.deleteRow(i);
      }
   }
  }
}
