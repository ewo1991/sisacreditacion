$(document).ready(inicio)
function inicio(){
    $(".botoncompra").click(anade)
    $("#carrito").load("php/poncarrito.php");
}
function anade(){
    var idnumero = $(this).val();
    var cantidad =$("#num"+idnumero).val();
    //alert(cantidad);
    if($(".id_producto[value="+idnumero+"]").length){
    	alert('El producto ya fue agragado');
    	return false;
    }
    $("#carrito").load("php/poncarrito.php?p="+$(this).val()+"&cant="+cantidad);
}

