// Trouver le dernier fichier du chemin d'accès
var url = window.location.pathname;
var splitUrl = url.split("/");
var lastWord = splitUrl[splitUrl.length - 1];
// Ajout de l'username rentré par l'utilisateur dans une variable
function addUsername() {
  if (lastWord == "index.html" || lastWord == "sondage.html" || lastWord == "shopping.html" || lastWord == "leaderbord.html") {
    var beforeNewElement = document.querySelector(
      "header nav>div:nth-child(2)"
    );
    $(beforeNewElement).append("<a></a>");
    var newElement = document.querySelector("header nav div:nth-child(2) a:last-child");
    var getUsername = sessionStorage.getItem("username");
    newElement.textContent = getUsername;
  }
  if (lastWord == "leaderbord.html") {
    var usernameIntoLeaderbord = document.querySelector(
      ".mainPageLeaderbord .leaderbord>div:last-child div:first-child p"
    );
    var getUsername = sessionStorage.getItem("username");
    usernameIntoLeaderbord.textContent = getUsername;
    usernameIntoLeaderbord.style.color = "rgba(3, 201, 169, 1)";
  }
}
// Affichage de l'username
function displayUsername() {
  addUsername();
}
// A la validation du formulaire, l'username est affiché sur toutes les pages et sur dans le leaderbord
function connexion() {
  var form = document.querySelector("form[name = 'formConnexion']");

  function onSubmit(event) {
    event.preventDefault();
    var inputUserName = document.querySelector("form input[name = 'username']");
    sessionStorage.setItem("username", inputUserName.value);
    displayUsername();
  }
  if (lastWord == "index.html") {
    form.addEventListener("submit", onSubmit);
  }
}






$(document).ready(function () {
  if (sessionStorage.getItem("username") !== null) {
    displayUsername();
  }
  connexion();
});