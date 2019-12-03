function verImagen(input) {
    document.getElementById("img-muestra").innerHTML="";
    if (input.files && input.files[0]) {
        var reader = new FileReader()
        var verImagen = document.createElement("img");
        verImagen.id = "verImagen";
        verImagen.width = "100";
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