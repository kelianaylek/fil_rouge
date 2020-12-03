const betList = [
  {
    title: "Qui sera le vainqueur ?",
    difficulty: 3,
    answers: [
      { firstChoice: "Paris", isRight: true },
      { secondChoice: "Marseille", isRight: false },
    ],
  },
  {
    title: "Plus de 3 buts dans le match",
    difficulty: 2,
    answers: [
      { firstChoice: "Oui", isRight: true },
      { secondChoice: "Non", isRight: false },
    ],
  },
  {
    title: "Doublé de Mbappé",
    difficulty: 4,
    answers: [
      { firstChoice: "Oui", isRight: false },
      { secondChoice: "Non", isRight: true },
    ],
  },
  {
    title: "Egalité à la fin du match",
    difficulty: 1,
    answers: [
      { firstChoice: "Oui", isRight: false },
      { secondChoice: "Non", isRight: true },
    ],
  },
  {
    title: "Marseille gagne à la mi-temps",
    difficulty: 5,
    answers: [
      { firstChoice: "Oui", isRight: true },
      { secondChoice: "Non", isRight: false },
    ],
  },
  {
    title: "Paris perd de 2 buts ou plus",
    difficulty: 3,
    answers: [
      { firstChoice: "Oui", isRight: false },
      { secondChoice: "Non", isRight: true },
    ],
  },
];

const userHaveBets = sessionStorage.getItem("betListChoose") !== null;
const betListChoose = userHaveBets
  ? JSON.parse(sessionStorage.getItem("betListChoose"))
  : [];

function displayDifficulty(difficulty) {
  var stars = "";
  for (let j = 0; j < difficulty; j++) {
    stars += "<i class='fa fa-star' aria-hidden='true'></i>";
  }
  for (let j = 0; j < 5 - difficulty; j++) {
    stars += "<i class='fa fa-star-o' aria-hidden='true'></i>";
  }
  return stars;
  //renvoie la string contenant les étoiles
}

// Trouver le dernier fichier du chemin d'accès
var url = window.location.pathname;
var splitUrl = url.split("/");
var lastWordUrl = splitUrl[splitUrl.length - 1];
var isOnShoppingPage = lastWordUrl == "shopping.html";
var isOnMainPage = lastWordUrl == "index.html";
var isOnBetPage = lastWordUrl == "sondage.html";
var isOnLeaderbordPage = lastWordUrl == "leaderbord.html";

// Ajout de l'username rentré par l'utilisateur dans une variable
function addUsername() {
  if(sessionStorage.getItem("username") !== ""){
    if (isOnShoppingPage || isOnMainPage || isOnBetPage || isOnLeaderbordPage) {
      var beforeNewElement = document.querySelector(
        "header nav>div:nth-child(2)"
      );
      $(beforeNewElement).append("<a></a>");
      var newElement = document.querySelector(
        "header nav div:nth-child(2) a:last-child"
      );
      var getUsername = sessionStorage.getItem("username");
      newElement.textContent = getUsername;
    }
    if (isOnLeaderbordPage) {
      var usernameIntoLeaderbord = document.querySelector(
        ".mainPageLeaderbord .leaderbord>div:last-child div:first-child p"
      );
      var getUsername = sessionStorage.getItem("username");
      usernameIntoLeaderbord.textContent = getUsername;
      usernameIntoLeaderbord.style.color = "rgba(3, 201, 169, 1)";
    }
  }
}
// Affichage de l'username
function displayUsername() {
  addUsername();
}
// A la validation du formulaire, l'username est affiché sur toutes les pages et sur dans le leaderbord
function connexion() {
  var formConnexion = document.querySelector("form[name = 'formConnexion']");

  function onSubmit(event) {
    event.preventDefault();
    var inputUserName = document.querySelector("form input[name = 'username']");
    sessionStorage.setItem("username", inputUserName.value);
    displayUsername();
    var errorConnexion = document.querySelector(".errorConnexion");

    if(sessionStorage.getItem("username") !== ""){
      closePopup();
    }else{
      if(errorConnexion == null){
        errorConnexion = '<div class="errorConnexion">Merci de remplir le champ ci-dessus</div>'
        $('.popup form').append(errorConnexion)
      }
    }
  }
  if (isOnMainPage) {
    formConnexion.addEventListener("submit", onSubmit);
  }
}
function displayBetsOnBetPage() {
  const customBetList = [];

  for(let i = 0; i < betList.length; i++){
    var currentBet = betList[i];
    var isMatchFounded = false;
    for(let j=0; j< betListChoose.length; j++){
      var currentBetChoose = betListChoose[j];
      if(currentBet.title === currentBetChoose.title){
        isMatchFounded = true;
        customBetList.push(betListChoose[j]);
      }
    }
    if(!isMatchFounded){
      customBetList.push(betList[i]);
    }
  }

  for (i = 0; i < customBetList.length; i++) {
    var button1Checked = "";
    var button2Checked = "";
    
    if(customBetList[i].response !== undefined){
      if(customBetList[i].answers[0].isRight == customBetList[i].response){
        button1Checked = "checked";
      }else{
        button2Checked = "checked";
      }
    }
  
    var sectionNewBet =
      "<section class='container'><div><h3>" +
      customBetList[i].title +
      "</h3><div>" +
      displayDifficulty(customBetList[i].difficulty) +
      "</div></div><form action=''><button type='button' class="+button1Checked+" name='formLeftChoice' onclick='makeBet(" +
      i +
      ", " +
      customBetList[i].answers[0].isRight +
      ", this);'>" +
      customBetList[i].answers[0].firstChoice +
      "</button><button type='button' class="+button2Checked+" name='formRightChoice' onclick='makeBet(" +
      i +
      ", " +
      customBetList[i].answers[1].isRight +
      ", this);'>" +
      customBetList[i].answers[1].secondChoice +
      "</button></form></section>";

    // sessionStorage.setItem("difficultyPoints", customBetList[i].difficulty);
    var beforeNewBet = document.querySelector(".colonnesPageSondage");
    $(beforeNewBet).append(sectionNewBet);
  }
}
function makeBet(i, response, button) {
  for (let j = 0; j < betListChoose.length; j++) {
    if (betListChoose[j].title === betList[i].title) {
      alert("pari déjà sélectionné");
      return;
    }
  }
  const betCopy = {
    title: betList[i].title,
    difficulty: betList[i].difficulty,
    answers: betList[i].answers,
    response: response,
  };
  betListChoose.push(betCopy);
  sessionStorage.setItem("difficultyPoints", betList[i].difficulty);

  $(button).addClass('checked')
  // On met le tableau dans sessionStorage pour le récupérer sur la page du panier
  sessionStorage.setItem("betListChoose", JSON.stringify(betListChoose));
}
// Affichage des paris sélectionnés sur la page du panier
function initShoppingPage() {
  if (isOnShoppingPage && userHaveBets) {
    // Récupération du tableau dans session storage pour afficher notre string comportant nos paris chosis
    var userBetList = sessionStorage.getItem("betListChoose");
    userBetList = JSON.parse(userBetList);
    var displayUserBet = "";

    for (let i = 0; i < userBetList.length; i++) {
      var button1Checked = "";
      var button2Checked = "";
        if(userBetList[i].answers[0].isRight == userBetList[i].response){
          button1Checked = "checked";
        }else{
          button2Checked = "checked";
        }

      displayUserBet +=
        `<section class='container'><div><button href='' type='button'  onclick='supprBet(` +
        i +
        `)'><i class='test fa fa-times fa-lg' aria-hidden='true'></i></button></div><div><h3>
      ${userBetList[i].title}
      </h3><div>
      ${displayDifficulty(userBetList[i].difficulty)}
      </div></div><form><button class="${button1Checked}">          
      ${userBetList[i].answers[0].firstChoice}
      </button><button class="${button2Checked}">
      ${userBetList[i].answers[1].secondChoice}
      </button></form></section>`;
    }

    var beforeNewBet = document.querySelector(".colonnesPageShopping");
    $(beforeNewBet).append(displayUserBet);
  }
}
function supprBet(i) {
  var userBetList = sessionStorage.getItem("betListChoose");
  userBetList = JSON.parse(userBetList);
  userBetList.splice(i, 1);
  userBetList = JSON.stringify(userBetList);
  sessionStorage.setItem("betListChoose", userBetList);
  userBetList = sessionStorage.getItem("betListChoose");
  userBetList = JSON.parse(userBetList);
  document.location.reload(true);
}
// On attend le click sur le bouton de validation des paris
function initValidateBet() {
  $('.popupBetValidation').hide();

  var formValidateBet = document.querySelector("form[name = 'validateBet']");
  // Après le click, on exéctute la fonction de validation des paris
  function validateBet(event) {
    event.preventDefault();

    userBetList = sessionStorage.getItem("betListChoose");
    userBetList = JSON.parse(userBetList);

    var score = 0;
    goodAnswers = 0;

    if (userBetList !== null) {
      for (let i = 0; i < userBetList.length; i++) {
        if (userBetList[i].response == true) {
          score = score + userBetList[i].difficulty;
          goodAnswers = goodAnswers + 1;
        }
      }
    }

    sessionStorage.setItem("score", score);

    if (userHaveBets) {
      userBetList = JSON.parse(sessionStorage.getItem("betListChoose"));
      if(sessionStorage.getItem("betListChoose") !== '[]'){
        function popupBetValidation(){
          $('.backgroundPopupBetValidation').css({
            "opacity" : 0.6
          });
          $('.backgroundPopupBetValidation').fadeIn('slow');
          $('.popupBetValidation').fadeIn('slow');
          displayPopup()
          var name = sessionStorage.getItem('username')
          $(".popupBetValidation").append("<div>"+name+", vous avez répondu correctement à " + goodAnswers + " sur "+userBetList.length+" questions.</div><div>Votre score est de "+score+" points.</div><button class='quitPopopBets'>Quitter</button>")
    
      }
      popupBetValidation();

      function displayPopup(){
        var windowHeight = document.documentElement.clientHeight;
        var windowWidth = document.documentElement.clientWidth;
        var popupHeight = $(".popupBetValidation").height();
        var popupWidth = $(".popupBetValidation").width();
      
        $('.popupBetValidation').css({
          "position" : "absolute",
          "top": windowHeight/2-popupHeight/2,
          "left": windowWidth/2-popupWidth/2,
        })
      }
      displayPopup();

      function initClosePopup(){
        var buttonClosePopup = document.querySelector(".popupBetValidation button")
        buttonClosePopup.addEventListener("click", closePopupValidateBet)
        }
        initClosePopup();
      }
      userBetList = userBetList.splice(0, 0);
      userBetList = JSON.stringify(userBetList);
      sessionStorage.setItem("betListChoose", userBetList);
    }
  }
  if (isOnShoppingPage) {
    formValidateBet.addEventListener("submit", validateBet);
  }
}
function displayScoreInLeaderBord() {
  var displayScore = sessionStorage.getItem("score");
  if (displayScore !== null) {
    if (isOnLeaderbordPage) {
      placeDisplayScore = document.querySelector(
        ".mainPageLeaderbord section .leaderbord div:nth-child(2) div:last-child p "
      );
      placeDisplayScore.textContent = displayScore;
    }
    displayScoreOnNavbar = document.querySelector("header nav a p");
    displayScoreOnNavbar.textContent = displayScore;
  }
}
function displayPopup(){
  var windowHeight = document.documentElement.clientHeight;
  var windowWidth = document.documentElement.clientWidth;
  var popupHeight = $(".popup").height();
  var popupWidth = $(".popup").width();

  $('.popup').css({
    "position" : "absolute",
    "top": windowHeight/2-popupHeight/2,
    "left": windowWidth/2-popupWidth/2,
  })
}
function closePopup(){
    $('.backgroundPopup').fadeOut('slow');
    $('.popup').fadeOut('slow'); 
}
function closePopupValidateBet(){
  $('.backgroundPopupBetValidation').fadeOut('slow');
  $('.popupBetValidation').fadeOut('slow'); 
  document.location.reload(true);
}
function popupConnexion(){
  if(sessionStorage.getItem("username") == null){
    $('.backgroundPopup').css({
      "opacity" : 0.6
    });
    $('.backgroundPopup').fadeIn('slow');
    $('.popup').fadeIn('slow');
    displayPopup()
  }else{
    $('.popup').hide();
  }
}


$(document).ready(function () {
  if (sessionStorage.getItem("username") !== null) {
    displayUsername();
  }
  connexion();
  if (isOnBetPage) {
    displayBetsOnBetPage();
  }
  initShoppingPage();
  if (isOnShoppingPage) {
    initValidateBet();
  }
  displayScoreInLeaderBord();
  popupConnexion();
});
