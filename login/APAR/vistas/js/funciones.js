


//Handler para el evento cuando cambia el input
// -Lleva la RFC a mayúsculas para validarlo
// -Elimina los espacios que pueda tener antes o después
function validarInput(val) {
 //var rfc = input.value.trim().toUpperCase();
 var rfc = val.trim().toUpperCase();

 var rfcCorrecto = validar(rfc);   // Acá se comprueba

 if (rfcCorrecto) {
  document.getElementById("nuevoEmail").disabled = false;
  document.getElementById("nuevoCalle").disabled = false;
  document.getElementById("nuevoNumeroInterior").disabled = false;
  document.getElementById("nuevoNumeroExterior").disabled = false;
  document.getElementById("nuevoColonia").disabled = false;
  document.getElementById("nuevoMunicipio").disabled = false;
  document.getElementById("nuevoCP").disabled = false;
  document.getElementById("nuevoEstado").disabled = false;
  document.getElementById("nuevoPais").disabled = false;

  document.getElementById("demo").innerHTML = ""; 
     //valido = "Válido";
   //resultado.classList.add("ok");
 }else {
  document.getElementById("demo").style.color = "red";
  document.getElementById("demo").innerHTML = "Favor de Revisar, RFC Incorrecto"; 

  document.getElementById("nuevoEmail").disabled = true;
  document.getElementById("nuevoCalle").disabled = true;
  document.getElementById("nuevoNumeroInterior").disabled = true;
  document.getElementById("nuevoNumeroExterior").disabled = true;
  document.getElementById("nuevoColonia").disabled = true;
  document.getElementById("nuevoMunicipio").disabled = true;
  document.getElementById("nuevoCP").disabled = true;
  document.getElementById("nuevoEstado").disabled = true;
  document.getElementById("nuevoPais").disabled = true;
  }
}
function validar(rfc, aceptarGenerico = true){

  const re = /^([A-ZÑ&]{3,4}) ?(?:- ?)?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])) ?(?:- ?)?([A-Z\d]{2})([A\d])$/;
     var   validado = rfc.match(re);
 
     if (!validado)  //Coincide con el formato general del regex?
         return false;
 
     //Separar el dígito verificador del resto del RFC
     const digitoVerificador = validado.pop(),
           rfcSinDigito      = validado.slice(1).join(''),
           len               = rfcSinDigito.length,
 
     //Obtener el digito esperado
           diccionario       = "0123456789ABCDEFGHIJKLMN&OPQRSTUVWXYZ Ñ",
           indice            = len + 1;
     var   suma,
           digitoEsperado;
 
     if (len == 12) suma = 0
     else suma = 481; //Ajuste para persona moral
 
     for(var i=0; i<len; i++)
         suma += diccionario.indexOf(rfcSinDigito.charAt(i)) * (indice - i);
     digitoEsperado = 11 - suma % 11;
     if (digitoEsperado == 11) digitoEsperado = 0;
     else if (digitoEsperado == 10) digitoEsperado = "A";
 
     //El dígito verificador coincide con el esperado?
     // o es un RFC Genérico (ventas a público general)?
     if ((digitoVerificador != digitoEsperado)
      && (!aceptarGenerico || rfcSinDigito + digitoVerificador != "XAXX010101000"))
         return false;
     else if (!aceptarGenerico && rfcSinDigito + digitoVerificador == "XEXX010101000")
         return false;
     return rfcSinDigito + digitoVerificador;
 }
//FUNCIONA PARA VALIDAR EL EMAIL SEA VALIDO
function ValidateEmail(val)
{

    value = val;
    apos=value.indexOf("@"); 
    dotpos=value.lastIndexOf(".");
    lastpos=value.length-1;
    if (apos < 1 || dotpos-apos < 2 || lastpos-dotpos > 3 || lastpos-dotpos < 2){
      document.getElementById("emailOK").style.color = "red";
        document.getElementById("emailOK").innerHTML = "Email Incorrecto";
        return false;
      } else {
        document.getElementById("emailOK").innerHTML = "";
        return true;

      }
  
}

//Money Euro
$('[data-mask]').inputmask()

function mayus(e) {
  e.value = e.value.toUpperCase();
}



