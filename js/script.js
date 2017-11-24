document.getElementById("valider").disabled = true;
function verifBis(a) {
    if ((a.value == document.getElementById("conf").value)&& (a.value.length>5)){
        document.getElementById("valider").disabled = false;
    }else{
        document.getElementById("valider").disabled = true;
    }
}
function verif(a) {
    if ((a.value == document.getElementById("chooseMdp").value)&& a.value.length>5){
        document.getElementById("valider").disabled = false;
    }else{
        document.getElementById("valider").disabled = true;
    }
}

