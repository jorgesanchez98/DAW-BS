function getRequestObject() {

  if(window.XMLHttpRequest) {
    return (new XMLHttpRequest());
  }
  else if (window.ActiveXObject) {
    return (new ActiveXObject("Microsoft.XMLHTTP"));
  } else {
    return(null);
  }
}

function sendRequest(){      
  $.get("controlla.php", { pattern: document.getElementById('userInput').value })
      .done(function( data ) {
          var ajaxResponse = document.getElementById('ajaxResponse');
          ajaxResponse.innerHTML = data;
          ajaxResponse.style.visibility = "visible";
   });
}

function selectValue() {

   var list=document.getElementById("list");
   var userInput=document.getElementById("userInput");
   var ajaxResponse=document.getElementById('ajaxResponse');
   userInput.value=list.options[list.selectedIndex].text;
   ajaxResponse.style.visibility="hidden";
   userInput.focus();
}
