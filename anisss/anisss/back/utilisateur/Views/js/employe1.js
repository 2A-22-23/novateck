let d_depInput = document.getElementById("d_dep");
let d_arrInput = document.getElementById("d_arr");
let etat_locInput = document.getElementById("etat_loc");
let today = new Date();
var letters = /^[A-Za-z]+$/;




function d_depValidation()
{
    let d_dep = new Date(d_depInput.value);
  let today = new Date();
  let d_arr = new Date(d_arrInput.value);

  if(d_depInput.value === '') {
    d_depError= "La date de départ ne doit pas être vide";
    document.getElementById("dpEr").innerHTML = d_depError;
 return false;
  } else if(d_depInput.value< today) {
    d_depError = "La date de départ ne peut pas être dans le passé";
    document.getElementById("dpEr").innerHTML = d_depError;
 return false;
  } else if(d_arrInput.value !== '' && d_depInput.value >= d_arrInput.value) {
    d_depError = "La date de départ doit être avant la date d'arrivée";
    document.getElementById("dpEr").innerHTML = d_depError;
 return false;
  } 
    document.getElementById("dpEr").innerHTML =
        "<p style='color:blue'> Correct </p>";

    return true;
  
}

function d_arrValidation()
{
    let d_dep = new Date(d_depInput.value);
  let d_arr = new Date(d_arrInput.value);

  if(d_arrInput.value === '') {
    d_arrError = "La date d'arrivée ne doit pas être vide";
    document.getElementById("arrEr").innerHTML = d_arrError;
 return false;
  } else if(d_arrInput.value <= d_depInput.value) {
    d_arrError= "La date d'arrivée doit être après la date de départ";
    document.getElementById("arrEr").innerHTML = d_arrError;
 return false;
  } 

  document.getElementById("arrEr").innerHTML =
        "<p style='color:blue'> Correct </p>";

    return true;

}



function passValidation() {
    if (
        d_depInput.value == "" ||
        d_arrInput.value == "" ||
        d_depInput.value >= d_arrInput.value ||
        etat_locInput.value !="Possible" &&
        etat_locInput.value !="Impossible" ||
         etat_locInput == "" 
    ) {
        alert("Le formulaire est vide ou manquant");
        document.getElementById("erreur").innerHTML =
                "Veuillez renseigner tous les champs";
                
        return false;
    } else {
        alert("formulaire envoyé");
        return true;
    }
}

function etatValidation() {
    if (etat_locInput.value.length < 8) {
        etat_locError = " L'etat location doit compter au minimum 8 caractères.";
        document.getElementById("etatEr").innerHTML = etat_locError;

        return false;
    }
    if (etat_locInput.value != "Possible" && etat_locInput.value != "Impossible") {
        etat_locError = " L'etat location doit etre : Possible / Impossible.";
        document.getElementById("etatEr").innerHTML = etat_locError;

        return false;
    }
    if (!etat_locInput.value.match(letters)) {
        etat_locError2 = "Veuillez entrer un etat location valide ! (seulement des lettres)";
        etat_locValid2 = false;
        document.getElementById("etatEr").innerHTML = etat_locError2;
        return false;
    }
    document.getElementById("etatEr").innerHTML =
        "<p style='color:green'> Correct </p>";

    return true;
}



document.forms["form"].addEventListener("submit", function (e) {
    var inputs = document.forms["form"];
    let ids = [
        "erreur",
        "dpEr",
         "arrEr",
        "etatEr",
        "erreur",
    ];

    ids.map((id) => (document.getElementById(id).innerHTML = "")); // reinitialiser l'affichage des erreurs

    let errors = false;

    //Traitement cas par cas
    if (etat_locInput.value.length < 8) {
        errors = false;
        document.getElementById("etatEr").innerHTML =
            "L'etat location doit compter au minimum 8 caractères.";
    }
    else if (etat_locInput.value != "Possible" && etat_locInput.value != "Impossible") {
        errors = false;
        document.getElementById("etatEr").innerHTML = 
        " L'etat location doit etre : Possible / Impossible.";

    }
     else if (!etat_locInput.value.match(letters)) {
        errors = false;
        document.getElementById("etatEr").innerHTML =
            "Veuillez entrer un etat location valide ! (seulement des lettres)";
    } else {
        errors = true;
    }
    
    if(d_depInput.value === '') {
        errors = false;
        document.getElementById("dpEr").innerHTML = 
        "La date de départ ne doit pas être vide";
     
      } else if(d_depInput.value< today) {
        errors = false;
        document.getElementById("dpEr").innerHTML = 
        "La date de départ ne peut pas être dans le passé";
     
      } else if(d_arrInput.value !== '' && d_depInput.value >= d_arrInput.value) {
        errors = false;
        document.getElementById("dpEr").innerHTML = 
        "La date de départ doit être avant la date d'arrivée";
     } 
     else 
     {
        errors = true;
    }
    if(d_arrInput.value === '') {
        errors = false; 
        document.getElementById("arrEr").innerHTML =
        "La date d'arrivée ne doit pas être vide";
    
      } else if(d_arrInput.value <= d_depInput.value) {
        errors = false;
        document.getElementById("arrEr").innerHTML = 
        "La date d'arrivée doit être après la date de départ";
    } 
    else 
     {
        errors = true;
    }
    

    //Traitement générique
    for (var i = 0; i < inputs.length; i++) {
        if (!inputs[i].value) {
            errors = false;
            document.getElementById("erreur").innerHTML =
                "Veuillez renseigner tous les champs";
        }
    }

    /*if (errors === false) {
        e.preventDefault();
    } else {
        alert("formulaire envoyé");
    }*/
});