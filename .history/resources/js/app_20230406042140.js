import './bootstrap';


console.log("hola desde js");
function valida_envia(){
    //valido el nombre
    if (document.fespecialista.nombre.value.length==0){
           alert("Tiene que escribir su nombre")
           document.fespecialista.nombre.focus()
           return 0;
    }
}
