// Tableau d'objet et chaque objet c'est un pari
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

// const responses = [];

const userHaveBets = sessionStorage.getItem("betListChoose") !== null;
const betListChoose = userHaveBets
  ? JSON.parse(sessionStorage.getItem("betListChoose"))
  : [];

// if (userHaveBets) {
//   if (sessionStorage.getItem("betListChoose") == "") {
//     betListChoose = [];
//     console.log("no");
//   } else {
//     betListChoose = JSON.parse(sessionStorage.getItem("betListChoose"));
//     console.log("yes");
//   }
// } else {
//   betListChoose = [];
// }

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
  }
  if (isOnMainPage) {
    formConnexion.addEventListener("submit", onSubmit);
  }
}
function displayBetsOnBetPage() {
  for (i = 0; i < betList.length; i++) {
    var sectionNewBet =
      "<section class='container'><div><h3>" +
      betList[i].title +
      "</h3><div>" +
      displayDifficulty(betList[i].difficulty) +
      "</div></div><form action=''><button type='button' name='formLeftChoice' onclick='makeBet(" +
      i +
      ", " +
      betList[i].answers[0].isRight +
      ");'>" +
      betList[i].answers[0].firstChoice +
      "</button><button type='button' name='formRightChoice' onclick='makeBet(" +
      i +
      ", " +
      betList[i].answers[1].isRight +
      ");'>" +
      betList[i].answers[1].secondChoice +
      "</button></form></section>";

    // sessionStorage.setItem("difficultyPoints", betList[i].difficulty);
    var beforeNewBet = document.querySelector(".colonnesPageSondage");
    $(beforeNewBet).append(sectionNewBet);
  }
}

function makeBet(i, response) {
  for (let j = 0; j < betListChoose.length; j++) {
    if (betListChoose[j].title === betList[i].title) {
      alert("paris déjà sélectionné");
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
      displayUserBet +=
        `<section class='container'><div><button href='' type='button' onclick='supprBet(` +
        i +
        `)'><i class='test fa fa-times fa-lg' aria-hidden='true'></i></button></div><div><h3>
      ${userBetList[i].title}
      </h3><div>
      ${displayDifficulty(userBetList[i].difficulty)}
      </div></div><form><button>          
      ${userBetList[i].answers[0].firstChoice}
      </button><button>
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
  console.log(userBetList);
  document.location.reload(true);
}

// On attend le click sur le bouton de validation des paris
function initValidateBet() {
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
      console.log("Ton score est de " + score + " points.");
      console.log(
        "Tu as eu " +
          goodAnswers +
          " bonnes réponses sur " +
          userBetList.length +
          " questions"
      );
    } else {
      console.log("Aucun pari sélectionné");
    }

    sessionStorage.setItem("score", score);

    if (userHaveBets) {
      userBetList = JSON.parse(sessionStorage.getItem("betListChoose"));
      userBetList = userBetList.splice(0, 0);
      userBetList = JSON.stringify(userBetList);
      sessionStorage.setItem("betListChoose", userBetList);
      document.location.reload(true);
      alert(score);
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
});
