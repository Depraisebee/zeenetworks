
let body = document.getElementById('body');
let button = document.getElementById('btn');
let valueBox = document.querySelector(".val-box");
let navigator = document.querySelector(".navigation");
let iCons = document.querySelector(".icons");
let titto = document.querySelector(".i-name");

button.onclick = body.classList.toggle("theme-active");

button.onclick = function () {
  if (body.style.backgroundColor === "#cbdadb") {
    body.style.backgroundColor = "#001";
    button.style.backgroundColor = "#00b0e0";
    button.style.color = "#333";
    //    valueBox.style.backgroundColor ="#333";
    //    valueBox.style.color ="#0";
    navigator.style.backgroundColor = "#333";
    navigator.style.color = "#00b0e0";
    //   iCons.style.backgroundColor ="#333";
    titto.style.color = "#fff";
    iCons.style.color = "#00b0e0";

  } else {
    body.style.backgroundColor = "#cbdadb";
    button.style.backgroundColor = "#333";
    button.style.color = "#00b0e0";
    // valueBox.style.backgroundColor ="#1082a1";
    // valueBox.style.color ="#fff"; 
    titto.style.color = "#555";

    navigator.style.backgroundColor = "white";
    navigator.style.color = "#fff";

    //    iCons.style.backgroundColor ="#1082a1";
    iCons.style.color = "#fff";
    titto.style.color = "#333";

  }
}

