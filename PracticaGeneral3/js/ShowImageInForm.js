function verImagen(input) {
    
    if (input.files && input.files[0]) {
        var reader = new FileReader()
        var verImagen = document.createElement("img");
        verImagen.id = "verImagen";
        verImagen.width = "100";
        verImagen.height= "100";
        document.getElementById("img-muestra").innerHTML="";
        document.getElementById("img-muestra").appendChild(verImagen);

        reader.onload = function (e) {
            
            document.getElementById('verImagen').src=e.target.result
        }

        reader.readAsDataURL(input.files[0])
    }
}

function limpiar(){
    document.getElementById("img-muestra").innerHTML="";
}

$(document).ready(function(){
    $('#file').change(function(){
        verImagen(this);
    });
});