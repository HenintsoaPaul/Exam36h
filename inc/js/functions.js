function getxhr() {
    var xhr;
    try {
        xhr = new ActiveXObject('Msxml2.XMLHTTP');
    } catch (e) {
        try {
            xhr = new ActiveXObject('Microsoft.XMLHTTP');
        } catch (e2) {
            try {
                xhr = new XMLHttpRequest();
            } catch (e3) {
                xhr = false;
            }
        }
    }
    return xhr;
}

function getTab(link) {
    var xhr;
    try {
        xhr = new ActiveXObject('Msxml2.XMLHTTP');
    } catch (e) {
        try {
            xhr = new ActiveXObject('Microsoft.XMLHTTP');
        } catch (e2) {
            try {
                xhr = new XMLHttpRequest();
            } catch (e3) {
                xhr = false;
            }
        }
    }
    var retour = null;
    xhr.onreadystatechange = function () {
        if (xhr.status === 200) {
            retour = JSON.parse(xhr.responseText);
            // console.log(xhr.responseText);
        }
    }
    xhr.open("GET", link, false);
    xhr.send(null);
    return retour;
}

function getRestePoids(herf, date, idParcelle) {
    let xhr = getxhr();

    const Data = new FormData();
    Data.append("idParcelle", idParcelle);
    Data.append("date", date);

    let retour;
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                console.log(xhr.responseText);
                retour = JSON.parse(xhr.responseText);
            } else {
                console.log("error : " + xhr.status);
            }
        }
    };

    xhr.open("POST", herf, false);
    xhr.send(Data);

    return retour;
}

function getPoidsCueilli(herf, dateDebut, dateFin) {
    var xhr = getxhr();
    var Data = new FormData();
    Data.append("dateDebut", dateDebut);
    Data.append("dateFin", dateFin);

    var retour;

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                // console.log(xhr.responseText);
                console.log(xhr.responseText);
                retour = JSON.parse(xhr.responseText);
            } else {
                console.log("error : " + xhr.status);
            }
        }
    };

    xhr.open("POST", herf, false);
    xhr.send(Data);

    return retour;
}
function getSommeVente(herf, dateDebut, dateFin) {
    var xhr = getxhr();
    var Data = new FormData();
    Data.append("dateDebut", dateDebut);
    Data.append("dateFin", dateFin);

    var retour;

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                // console.log(xhr.responseText);
                console.log("somme vente: "+xhr.responseText);
                retour = JSON.parse(xhr.responseText);
            } else {
                console.log("error : " + xhr.status);
            }
        }
    };

    xhr.open("POST", herf, false);
    xhr.send(Data);

    return retour;
}
function getPrixRevient(herf, dateDebut, dateFin) {
    var xhr = getxhr();
    var Data = new FormData();
    Data.append("dateDebut", dateDebut);
    Data.append("dateFin", dateFin);

    var retour;

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                // console.log(xhr.responseText);
                console.log(xhr.responseText);
                retour = JSON.parse(xhr.responseText);
            } else {
                console.log("error : " + xhr.status);
            }
        }
    };

    xhr.open("POST", herf, false);
    xhr.send(Data);

    return retour;
}

function getPoidsRestants(herf, dateDebut, dateFin, idParcelle) {
    var xhr = getxhr();
    var Data = new FormData();
    Data.append("dateDebut", dateDebut);
    Data.append("dateFin", dateFin);
    Data.append("idParcelle", idParcelle);


    var retour;

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                // console.log(xhr.responseText);
                console.log(xhr.responseText);
                retour = JSON.parse(xhr.responseText);
            } else {
                console.log("error : " + xhr.status);
            }
        }
    };

    xhr.open("POST", herf, false);
    xhr.send(Data);

    return retour;
}

function getAllParcelle(herf) {
    var xhr = getxhr();
    var Data = new FormData();

    var retour;

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                // console.log(xhr.responseText);
                console.log(xhr.responseText);
                retour = JSON.parse(xhr.responseText);
            } else {
                console.log("error : " + xhr.status);
            }
        }
    };

    xhr.open("POST", herf, false);
    xhr.send(Data);

    return retour;
}

function getData(herf) {
    var xhr = getxhr();
    var Data = new FormData();

    var retour;

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                // console.log(xhr.responseText);
                console.log(xhr.responseText);
                retour = JSON.parse(xhr.responseText);
            } else {
                console.log("error : " + xhr.status);
            }
        }
    };

    xhr.open("POST", herf, false);
    xhr.send(Data);

    return retour;
}

function getPaiement(herf, idCueilleur, dateDebut, dateFin) {
    var xhr = getxhr();
    var Data = new FormData();
    Data.append("dateDebut", dateDebut);
    Data.append("dateFin", dateFin);
    Data.append("idCueilleur", idCueilleur);
    var retour;

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                // console.log(xhr.responseText);
                console.log(xhr.responseText);
                retour = JSON.parse(xhr.responseText);
            } else {
                console.log("error : " + xhr.status);
            }
        }
    };

    xhr.open("POST", herf, false);
    xhr.send(Data);

    return retour;
}

function getInfoCueilleur(herf, idCueilleur, dateDebut, dateFin) {
    var xhr = getxhr();
    var Data = new FormData();
    Data.append("dateDebut", dateDebut);
    Data.append("dateFin", dateFin);
    Data.append("idCueilleur", idCueilleur);
    var retour;

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                // console.log(xhr.responseText);
                console.log(xhr.responseText);
                retour = JSON.parse(xhr.responseText);
            } else {
                console.log("error : " + xhr.status);
            }
        }
    };

    xhr.open("POST", herf, false);
    xhr.send(Data);

    return retour;
}