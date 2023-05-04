let dp_cInput = document.getElementById("dp_c");
let da_cInput = document.getElementById("da_c");
let types_transportInput = document.getElementById("types_transport");
let today = new Date();
var letters = /^[A-Za-z]+$/;

function dp_cValidation()
{
    let dp_c = new Date(dp_cInput.value);
  let today = new Date();
  let da_c = new Date(da_cInput.value);

  if(dp_cInput.value === '') {
    dp_cError= "La date de départ ne doit pas être vide";
    document.getElementById("dpcEr").innerHTML = dp_cError;
 return false;
  } else if(dp_cInput.value < today) {
    dp_cError = "La date de départ ne peut pas être dans le passé";
    document.getElementById("dpcEr").innerHTML = dp_cError;
 return false;
  } else if(da_cInput.value !== '' && dp_cInput.value >= da_cInput.value) {
    dp_cError = "La date de départ doit être avant la date d'arrivée";
    document.getElementById("dpcEr").innerHTML = dp_cError;
 return false;
  } 
    document.getElementById("dpcEr").innerHTML =
        "<p style='color:blue'> Correct </p>";

    return true;
  
}

function da_cValidation()
{
    let dp_c = new Date(dp_cInput.value);
  let da_c = new Date(da_cInput.value);

  if(da_cInput.value === '') {
    da_cError = "La date d'arrivée ne doit pas être vide";
    document.getElementById("dacEr").innerHTML = da_cError;
 return false;
  } else if(da_cInput.value <= dp_cInput.value) {
    da_cError= "La date d'arrivée doit être après la date de départ";
    document.getElementById("dacEr").innerHTML = da_cError;
 return false;
  } 

  document.getElementById("dacEr").innerHTML =
        "<p style='color:blue'> Correct </p>";

    return true;

}



function submitValidation() {
    if (
        dp_cInput.value == "" ||
        da_cInput.value == "" ||
        dp_cInput.value >= da_cInput.value ||
        dp_cInput.value < today ||
         types_transportInput.value !="bus" &&
         types_transportInput.value != "velo" &&
      types_transportInput.value != "scooter" &&
      types_transportInput.value != "voiture" &&
      types_transportInput.value != "trottinette" ||
     types_transportInput == ""
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

function typeValidation() {
    if (types_transportInput.value.length < 3) {
      types_transportError = " Le type de transport doit compter au minimum 3 caractères.";
        document.getElementById("typeEr").innerHTML = types_transportError;

    }
    else if (types_transportInput.value != "bus" &&
     types_transportInput.value != "velo" &&
     types_transportInput.value != "scooter" &&
     types_transportInput.value != "voiture" &&
     types_transportInput.value != "trottinette") {
      types_transportError = " Le type de transport doit etre : bus / velo / scooter / voiture / trottinette.";
        document.getElementById("typeEr").innerHTML = types_transportError;
        return false;
    }
    
    else if (!types_transportInput.value.match(letters)) {
      types_transportError2 = "Veuillez entrer un type de transport valide ! (seulement des lettres)";
      types_transportValid2 = false;
        document.getElementById("typeEr").innerHTML = types_transportError2;

        return false;
    }
    else
    {
    document.getElementById("typeEr").innerHTML =
        "<p style='color:green'> Correct </p>";}
     return true;
}


document.forms["form"].addEventListener("submit", function (e) {
    var inputs = document.forms["form"];
    let ids = [
        "erreur",
        "dpcEr",
         "dacEr",
        "typeEr",
        "erreur",
    ];

    ids.map((id) => (document.getElementById(id).innerHTML = "")); // reinitialiser l'affichage des erreurs

    let errors = false;

    //Traitement cas par cas
    if (types_transportInput.value.length < 3) {
        errors = false;
        document.getElementById("typeEr").innerHTML =
            "Le type de transport doit compter au minimum 3 caractères.";
    } else if (!types_transportInput.value.match(letters)) {
        errors = false;
        document.getElementById("typeEr").innerHTML =
            "Veuillez entrer un type de transport valide ! (seulement des lettres)";
    }
    else if(types_transportInput.value != "bus" &&
    types_transportInput.value != "velo" &&
    types_transportInput.value != "scooter" &&
    types_transportInput.value != "voiture" &&
    types_transportInput.value != "trottinette")
    {
        errors = false;
        document.getElementById("typeEr").innerHTML = 
        " Le type de transport doit etre : bus / velo / scooter / voiture / trottinette.";
    }
     else {
        errors = true;
    }

  
    if(dp_cInput.value === '') {
        errors = false;
        document.getElementById("dpcEr").innerHTML = 
        "La date de départ ne doit pas être vide";
     
      } else if(dp_cInput.value< today) {
        errors = false;
        document.getElementById("dpcEr").innerHTML = 
        "La date de départ ne peut pas être dans le passé";
     
      } else if(da_cInput.value !== '' && dp_cInput.value >= da_cInput.value) {
        errors = false;
        document.getElementById("dpcEr").innerHTML = 
        "La date de départ doit être avant la date d'arrivée";
     } 
     else 
     {
        errors = true;
    }
    if(da_cInput.value === '') {
        errors = false; 
        document.getElementById("dacEr").innerHTML =
        "La date d'arrivée ne doit pas être vide";
    
      } else if(da_cInput.value <= dp_cInput.value) {
        errors = false;
        document.getElementById("dacEr").innerHTML = 
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
