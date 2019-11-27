function mostrarTabla(){
    var xhr;
    if(XMLHttpRequest){
        xhr = new XMLHttpRequest();
    }else{
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    
    xhr.onreadystatechange = function(data){
        if(this.readyState==4 && this.status==200){
           document.getElementById('tabla-images').innerHTML = this.responseText; 
        }
    }
    var tipo = document.getElementById('tipos').value;
    xhr.open('GET','../php/CreateImgTable.php?tipo='+tipo);
    xhr.send();
}