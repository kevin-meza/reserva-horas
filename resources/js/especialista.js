import 'bootstrap';


setTimeout(function() {
    document.getElementById('mensaje').style.display = 'none';
}, 5000); // Oculta el mensaje después de 5 segundos (5000 ms)


console.log("hola desde especialista.js");

function valida_envia(){
    //valido el nombre
    if (document.fespecialista.nombre.value.length==0){
           alert("Tiene que escribir su nombre")
           document.fespecialista.nombre.focus()
           return 0;
    }
}
