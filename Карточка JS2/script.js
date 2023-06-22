function getLinks() {
  var linkElements = document.getElementsByTagName("a");

  var links = [];

  for (var i = 0; i < linkElements.length; i++) {
    var href = linkElements[i].href;
    links.push(href);
  }

  setTimeout(function() {
    alert(links);
  }, 3000);
}

window.onload = getLinks;

document.onclick = function( e ) {
  var tag = e.target;
  if( tag.tagName == "IMG" ) {
    tag.remove();
  } 
}

function applyStyles() {
  document.body.style.backgroundColor = "yellow";
  document.body.style.fontFamily = "Arial";
  document.body.style.fontSize = "20px";
  document.body.style.color = "red";

  var images = document.getElementsByTagName("img");
  
  for (var i = 0; i < images.length; i++) {
    images[i].style.border = "4px solid green";
  }
}

var cookieEnabled = navigator.cookieEnabled;

if (cookieEnabled) {
  alert("Cookie включены в браузере.");
} else {
  alert("Cookie выключены в браузере.");
}

setTimeout(function() {
  window.close();
}, 8000);