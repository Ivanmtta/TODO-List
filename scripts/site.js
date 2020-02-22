function clicked(element, id){
  let value = document.getElementById("doneValue" + id).value;
  if(value == "0")
    value = "1";
  else
    value = "0";
  window.location.href = "index.php?id=" + id + "&value=" + value;
}

function validateInput(form){
  let note = document.getElementById("note");
  return note.value != ""; 
}