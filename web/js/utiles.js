 
function permite(elEvento, permitidos) {
// Variables que definen los caracteres permitidos

var numeros = "0123456789.,";
var caracteres = " abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ-/";
var numeros_caracteres = numeros + caracteres;
var teclas_especiales = [8, 37, 39, 46, 13];
// 8 = BackSpace, 46 = Supr, 37 = flecha izquierda, 39 = flecha derecha
// Seleccionar los caracteres a partir del parámetro de la función
  switch(permitidos) {
    case 'num':
    permitidos = numeros;
    break;
    case 'car':
    permitidos = caracteres;
    break;
    case 'num_car':
    permitidos = numeros_caracteres;
    break;
}
// Obtener la tecla pulsada
var evento = elEvento || window.event;
var codigoCaracter = evento.charCode || evento.keyCode;
var caracter = String.fromCharCode(codigoCaracter);
// Comprobar si la tecla pulsada es alguna de las teclas especiales
// (teclas de borrado y flechas horizontales)
var tecla_especial = false;
for(var i in teclas_especiales) {
    if(codigoCaracter == teclas_especiales[i]) {
    tecla_especial = true;
    break;
  }
}
// Comprobar si la tecla pulsada se encuentra en los caracteres permitidos
// o si es una tecla especial
return permitidos.indexOf(caracter) != -1 || tecla_especial;
}

//Funcion que nos permite escribir una fecha 
//de una manera rapida
function formafecha(campo)
{
	if (campo.value.length==2 || campo.value.length==5)
	{	
		campo.value = campo.value+"/";
		return false;
	}
}

//Funcion que elimina los espacios en blaco o saltos de linea
//al principio de una cadena
function ltrim(s) {
	return s.replace(/^\s+/, "");
}

//Funcion que elimina los espacios en blaco o saltos de linea
//al final de una cadena
function rtrim(s) {
	return s.replace(/\s+$/, "");
}

//Funcion que elimina los espacios en blanco o saltos de linea
//al comienzo y al final de una cadena
function trim(s) {
	return rtrim(ltrim(s));
}

//Funcion que permite, que cuando se preciona enter se vaya
//al siguien campo de texto del formulario
function handleEnter(field, event) {

	var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
			if (keyCode == 13) {
				var i;
				for (i = 0; i < field.form.elements.length; i++)
					if (field == field.form.elements[i])
						break;
				i = (i + 1) % field.form.elements.length;
				field.form.elements[i].focus();
				return false;
			} 
			else
			return true;
		}

function msg(text)
{
    str = '<p style="margin-top:10px"><span class="ui-icon ui-icon-alert" style="float: left; margin: 0pt 7px 50px 0pt;"></span>'+text+'</p>';
    $("#msgdialog").empty().append(str);
    $("#dialog").dialog("open");
}

function msgok(text)
{
  str = '<p style="margin-top:10px"><span class="ui-icon ui-icon-check" style="float: left; margin: 0pt 7px 50px 0pt;"></span>'+text+'</p>';
    $("#msgdialog").empty().append(str);
    $("#dialog").dialog("open");
}

function msgerror(text)
{
    str = '<p style="margin-top:10px"><span class="ui-icon ui-icon-closethick" style="float: left; margin: 0pt 7px 50px 0pt;"></span>'+text+'</p>';
    $("#msgdialog").empty().append(str);
    $("#dialog").dialog("open");

}
function popup(url,width,height){cuteLittleWindow = window.open(url,"littleWindow","location=no,width="+width+",height="+height+",top=80,left=300,scrollbars=yes"); }

