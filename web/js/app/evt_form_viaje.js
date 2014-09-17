$(function() {
    
//    var fecha = new Date();
//    m = fecha.getMonth();
//    $("#fecha").datepicker({'dateFormat':'dd/mm/yy',hideIfNoPrevNext: false,minDate: new Date(2011, m + 1, 1)});
    $("#btnadd").click(function(){
        bval = true;        
        bval = bval && $( "#idcargo" ).required();        
        bval = bval && $( "#chofer" ).required();        
        if(bval)
            {                
                idc = $("#idcargo").val();                
                dc = $("#idcargo option:selected").html();                
                idchofer = $("#idchofer").val();
                chofer = $("#chofer").val();
                band = true;
                msg = "";
                $("tbody tr").each(function(i,j){
                    id_c = $("tbody tr td:eq(0) :input").val();
                    id_ch = $("tbody tr td:eq(1) :input").val();
                    if(id_c==idc){band = false;msg = "Este cargo ya fue asignado"; }
                    if(id_ch==idchofer){ band = false;msg = "Este chofer ya fue agregado"; }
                });
                if(!band){alert(msg);}
                else 
                {
                    html = '<tr>';
                    html += '<td><input type="hidden" name="id_cargo[]" value="'+idc+'" />'+dc+'</td>';
                    html += '<td><input type="hidden" name="id_chofer[]" value="'+idchofer+'" />'+chofer+'</td>';
                    html += '<td width="20px"><a class="delete" title="Eliminar item" href="javascript:"><img src="images/delete.png"/></a></td>';
                    html += '</tr>';                    
                    $("#detalle tbody").append(html);
                    $("#idcargo").val("");                    
                    $("#idchofer").val("");
                    $("#chofer").val("");
                }
            }
    });
    $('.delete').live('click', function() {
        i = $(this).parent().parent().index();
        $('tbody tr:eq('+i+')').remove();
     });
    $("#busca_vehiculo").click(function(){
        v = $("#idcronograma").val();
        fecha = $("#fecha").val();
        hs = $("#horasalida").val();
        hl = $("#horallegada").val();
        if(v!=""){popup('index.php?controller=vehiculo&action=search&idcronograma='+v+'&fecha='+fecha+'&horasalida='+hs+'&horallegada='+hl,860,400);}
            else {alert("Para buscar un vehiculo, primero busque un cronograma de viaje");}        
    });
    
    $( "#save" ).click(function(){
        bval = true;        
        bval = bval && $( "#fecha" ).required();
        bval = bval && $( "#vehiculo" ).required();
        bval = bval && $( "#idcronograma" ).required();
        c = cd();        
        if(c==0 && bval){alert("Complete las asiganciones de pilotos.");bval=false;}
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});

function cd()
{
    c=0;
    $('tbody tr').each(function(i,j){
        c +=1;
    });
    return c;
}