function mostrarComentario(element){
    var xhr;
    if(XMLHttpRequest){
        xhr = new XMLHttpRequest();
    }else{
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    
    xhr.onreadystatechange = function(){
        if(this.readyState==4 && this.status==200){
            var xml = xhr.responseXML;
            var visita = xml.getElementById(element);
            var comentario = visita.getElementsByTagName("comentario").item(0).firstChild.nodeValue;
            document.getElementById("visita"+element).innerHTML="";
            document.getElementById("visita"+element).innerHTML=comentario;
        }
    }
    
    xhr.open('GET','../xml/visitas.xml');
    xhr.send();
}

