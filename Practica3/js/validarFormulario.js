function validarForm(){
    var resul = true;
    var inputs = document.forms["fcoment"].getElementsByTagName("input");
    
    for(i=0; i<inputs.length; i++){
        if(inputs[i].type != "submit"){
            if(inputs[i].value != ""){
                if(inputs[i].name=="email"){
                    resul = emailValido(inputs[i].value);
                }
            }else{
                if(inputs[i].name!="email"){
                    alert("Al parecer hay uno o mas campos vacios.");
                    resul = false;
                    break;
                }
            }
        }
    }
    if(resul){
        alert("Datos enviados correctamente.");
    }
    return resul;
}

function emailValido(email){
    var valido = false;
    var emailSplit = email.split("@");
    if(emailSplit.length == 2 && emailSplit[0].length>0 && emailSplit[1].length>0){
        puntoSplit = emailSplit[1].split(".");
        if(puntoSplit.length == 2){
            if(puntoSplit[1].length >= 2 && puntoSplit[0].length>0 && puntoSplit[1].length>0){
                return true;
            }else{
                alert("El email introducido no es correcto.");
                return false;  
            }
        }else{
            alert("El email introducido no es correcto.");
            return false;
        }
        
    }else{
        alert("El email introducido no es correcto.");
        return false;
    }
    
}