$(document).ready(inicio)
function inicio(){
    $(".botoncompra2").click(anade)
    $("#carrito").load("php/poncarrito2.php");
}
function anade(){
    var idnumero = $(this).val();
    var cantidad =$("#num"+idnumero).val();
    //alert(cantidad);
    if($(".id_producto[value="+idnumero+"]").length){
    	alert('El producto ya fue agragado');
    	return false;
    }
    $("#carrito").load("php/poncarrito2.php?p="+$(this).val()+"&cant="+cantidad);
}

