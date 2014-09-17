$(function() {
    $( "#idtipo_doc" ).focus();
    $( "#idtipo_documento_venta,#idtipo_doc" ).removeClass('ui-corner-all ui-widget-content');
    $("#idtipo_documento_venta,#idtipo_doc").css({'padding':'0','width':'74px','margin-left':'2px'});
//    var fecha = new Date();
//    m = fecha.getMonth();
//    $("#fecha").datepicker({'dateFormat':'dd/mm/yy',hideIfNoPrevNext: false,minDate: new Date(2011, m + 1, 1)});
    
    $("#div_info").dialog({
        draggable: true,
                    show:'fade',
                    autoOpen: false,
                    modal:true,
                    position:'center',
                    width: 360,
                    height:'auto',
                    title: 'INFORMACION DE ASIENTO',
                    resizable: false
    });
    $('#dialog').dialog({
                    draggable: true,
                    show:'fade',
                    autoOpen: false,
                    modal:true,
                    position:'center',
                    width: 580,
                    height:'auto',
                    title: 'REGISTRO DE NUEVA VENTA DE PASAJE',
                    resizable: false,
                    buttons: {"Registrar la Venta": function() {
                                    
                                    d = $("#grab").css("display");
                                    if(d=="none")
                                    {
                                        bval =  true;
                                        bval = bval && $( "#idtipo_documento_venta" ).required();
                                        bval = bval && $( "#nrodocumento" ).required();   
                                        ck = $("#reservado").attr("checked");     
                                        na = $("#nroasiento").val();                                        
                                        if(bval){
                                        $("button").css("display","none");
                                        $("#div_save").empty().append("GUARDANDO VENTA ...");
                                        $("#div_save").fadeIn();
                                        str = $("#frmventa").serialize();
                                        $.post('index.php','controller=venta&action=save&'+str,function(data){
                                            if(data[0]){
                                                $("#div_save").fadeOut(function(){
                                                    $("#b"+na).removeClass('free');
                                                    if(ck){$("#div_save").empty().append("EL ASIENTO FUE RESERVADO");$("#b"+na).addClass('reservado');}
                                                        else {
                                                                $("#div_save").empty().append("<a target='_blank' style='color:#fff' href='index.php?controller=reportes&action=print_venta&idventa="+data[1]+"'>Imprimir Venta</a>");
                                                                $("#b"+na).addClass('ocupado');
                                                        }
                                                    $("#b"+na).empty().append(na+'<input type="hidden" name="idventa'+na+'" value="'+data[1]+'" />');
                                                    $("#div_save").fadeIn();
                                                });
                                            }
                                            else {
                                                alert("Ha ocurrido un error, por favor intentelo de nuevo");
                                                $("#div_save").fadeOut();
                                                $("button").css("display","inline");
                                            }
                                        },'json');
                                        }                                      
                                    }
                                    else {
                                        alert("Porfavor complete y grabar el nuevo pasajero");
                                    }
                                }
                            }
		});
     $('.free').live('click', function() {
         n = $(this).attr("title");       
         bid = $(this).attr("id");
         idve = $("#idvehiculo").val();
         idvi = $("#idviaje").val();
         str = 'idvehiculo='+idve+'&idviaje='+idvi+'&n='+n;         
         $.post('index.php','controller=venta&action=verif_asiento&'+str,function(data){                      
           
           if(data.idventa!="")
               {
                   
                   if(data.estado=='1')
                   {
                        $('#'+bid).removeClass('free');
                        $('#'+bid).addClass('ocupado');
                        idv = data.idventa;
                        $('#div_info').dialog({title: 'INFORMACION DE VENTA DE ASIENTO N° '+n});        
                        $("#div_info").empty().append('<img src="images/loader.gif" style="border:0; margin-right: 5px; display:inline " /> Recuperando informacion ....');                
                        $.post('index.php','controller=venta&action=get_info&idventa='+idv,function(data){  
                            html = '<table border="0" width="100%">';
                            html += '<tr><td width="100px">Pasajero </td><td>: '+data.nombres+'</td></tr>';
                            html += '<tr><td>'+data.tipo_doc+' </td><td>: '+data.nrodoc+'</td></tr>';
                            html += '<tr><td>Hora </td><td>: '+data.hora+'</td></tr>';
                            html += '<tr><td>Comprobante </td><td>: '+data.tipo_doc_v+' '+data.serie+' - '+data.numero+'</td></tr>';
                            html += '<tr><td>TOTAL </td><td>: '+data.total+'</td></tr>';
                            html += '<tr><td align="center" colspan="4"><a target="_blank" href="index.php?controller=reportes&action=print_venta&idventa='+idv+'">IMPRIMIR VENTA</a></td></tr>';
                            html += '</table>';
                            $("#div_info").empty().append(html);
                            $('#div_info').dialog('open');
                        },'json');
                   }
                   if(data.estado=='2'){
                        $('#'+bid).removeClass('free');
                        $('#'+bid).addClass('reservado');
                        idv = data.idventa;
                        $('#div_info').dialog({title: 'INFO DE RESERVA DEL ASIENTO N° '+n});        
                        $("#div_info").empty().append('<img src="images/loader.gif" style="border:0; margin-right: 5px; display:inline " /> Recuperando informacion ....');                
                        $.post('index.php','controller=venta&action=get_info&idventa='+idv,function(data){  
                            html = '<table border="0" width="100%" style="font-size:13px">';
                            html += '<tr><td width="100px">Pasajero </td><td>: '+data.nombres+'</td></tr>';
                            html += '<tr><td>'+data.tipo_doc+' </td><td>: '+data.nrodoc+'</td></tr>';
                            html += '<tr><td>Hora </td><td>: '+data.hora+'</td></tr>';
                            html += '<tr><td>Comprobante </td><td>: '+data.tipo_doc_v+' '+data.serie+' - '+data.numero+'</td></tr>';
                            html += '<tr><td>TOTAL </td><td>: '+data.total+'</td></tr>';
                            html += '<tr><td align="center" colspan="2"><a class="button" id="pay_venta" href="javascript:pay_reserva('+idv+','+n+')" >PAGAR VENTA</a><a class="button" id="libera_asiento" href="javascript:libera_asiento('+idv+','+n+')">LIBERAR ASIENTO</a></td></tr>';
                            html += '</table>';
                            html += '<div id="div_save_2" class="ui-corner-all" style="display: none;border:1px solid #439A45; background: #4DB849; padding: 1px; clear: both; margin-top: 10px auto; text-align: center; font-size: 9px; color:#fff;"></div>';
                            $("#div_info").empty().append(html);
                            $('#div_info').dialog('open');
                        },'json');
                   }
               }
            else {show_me(n);}
         },'json');         
     });
    
    $('.ocupado').live('click', function() {
        id = $(this).attr("id");        
        idv = $('#'+id+' :input').val(); 
        n = $(this).text();
        $('#div_info').dialog({title: 'INFORMACION DE VENTA DE ASIENTO N° '+n});        
        $("#div_info").empty().append('<img src="images/loader.gif" style="border:0; margin-right: 5px; display:inline " /> Recuperando informacion ....');                
        $.post('index.php','controller=venta&action=get_info&idventa='+idv,function(data){  
            html = '<table border="0" width="100%">';
            html += '<tr><td width="100px">Pasajero </td><td>: '+data.nombres+'</td></tr>';
            html += '<tr><td>'+data.tipo_doc+' </td><td>: '+data.nrodoc+'</td></tr>';
            html += '<tr><td>Hora </td><td>: '+data.hora+'</td></tr>';
            html += '<tr><td>Comprobante </td><td>: '+data.tipo_doc_v+' '+data.serie+' - '+data.numero+'</td></tr>';
            html += '<tr><td>TOTAL </td><td>: '+data.total+'</td></tr>';
            html += '<tr><td align="center" colspan="4"><a target="_blank" href="index.php?controller=reportes&action=print_venta&idventa='+idv+'">IMPRIMIR VENTA</a></td></tr>';
            html += '</table>';
            $("#div_info").empty().append(html);
            $('#div_info').dialog('open');
        },'json');
    });
    
    $(".reservado").live('click', function(){        
        id = $(this).attr("id");        
        idv = $('#'+id+' :input').val(); 
        n = $(this).text();        
        $('#div_info').dialog({title: 'INFO DE RESERVA DEL ASIENTO N° '+n});        
        $("#div_info").empty().append('<img src="images/loader.gif" style="border:0; margin-right: 5px; display:inline " /> Recuperando informacion ....');                
        $.post('index.php','controller=venta&action=get_info&idventa='+idv,function(data){  
            html = '<table border="0" width="100%" style="font-size:13px">';
            html += '<tr><td width="100px">Pasajero </td><td>: '+data.nombres+'</td></tr>';
            html += '<tr><td>'+data.tipo_doc+' </td><td>: '+data.nrodoc+'</td></tr>';
            html += '<tr><td>Hora </td><td>: '+data.hora+'</td></tr>';
            html += '<tr><td>Comprobante </td><td>: '+data.tipo_doc_v+' '+data.serie+' - '+data.numero+'</td></tr>';
            html += '<tr><td>TOTAL </td><td>: '+data.total+'</td></tr>';
            html += '<tr><td align="center" colspan="2"><a class="button" id="pay_venta" href="javascript:pay_reserva('+idv+','+n+')" >PAGAR VENTA</a><a class="button" id="libera_asiento" href="javascript:libera_asiento('+idv+','+n+')">LIBERAR ASIENTO</a></td></tr>';
            html += '</table>';
            html += '<div id="div_save_2" class="ui-corner-all" style="display: none;border:1px solid #439A45; background: #4DB849; padding: 1px; clear: both; margin-top: 10px auto; text-align: center; font-size: 9px; color:#fff;"></div>';
            $("#div_info").empty().append(html);
            $('#div_info').dialog('open');
        },'json');
    });
    $("#idtipo_documento_venta").change(function(){
        if($(this).val()=="2")
        {
            $("#idtipo_doc").val("2");
            limpiar_pasajero();
            $("#nrodocumento").attr("readonly",false);
            $("#nrodocumento").focus();
            pigv = $("#pigv").val();
            $("#igv").val(pigv);
            recalcular();
        }
        else {
           $("#idtipo_doc").val("");
            limpiar_pasajero();
            $("#nrodocumento").attr("readonly",true);
            $("#idtipo_doc").focus(); 
            $("#igv").val(0);
            recalcular();
        }
    });    
    $("#idtipo_doc").change(function(){
        if($(this).val()!="")
        {
            $("#nrodocumento").attr("readonly",false);
            $("#nrodocumento").focus();
            limpiar_pasajero();
            
        }
            else {$("#nrodocumento").attr("readonly",true);}
    });
    $("#nrodocumento").change(function(){
        nro = $(this).val();
        td = $("#idtipo_doc").val();
        destd = $("#idtipo_doc option:selected").html();        
        $("#text-load").empty().append("Cargando...");
        $("#loading").css("display","inline");
        if(nro!=""){
            str = "nrodocumento="+nro+"&idtipo_doc="+td+"&destd="+destd;
            $.post('index.php','controller=pasajero&action=buscar&'+str,function(data){              
              $("#loading").css("display","none");              
              if(data.idpasajero!=null){
              $("#idpasajero").val(data.idpasajero);
              $("#nombres").val(data.nombres);
              $("#apellidos").val(data.apellidos);
              $("#fnacimiento").val(data.fnacimiento);
              $("#edad").val(data.edad);
              $("#sexo").val(data.sexo);
              if(data.cumple=="1"){
                  $("#mensajito").css("display","inline");
                  $("#descuento").val($("#subtotal").val());
                  recalcular();
              }
              $("#grab").css("display","none");
          }
            else {
                if(confirm("No se ha encontrado este numero de "+destd+" en la base de datos, Desea registrarlo ?"))
                    {
                       $("#grab").css("display","inline");
                       $("#nombres,#apellidos,#fnacimiento,#edad,#sexo").val("");
                       $("#nombres,#apellidos,#fnacimiento,#sexo").attr("readonly",false);
                       $("#nombres").focus();
                    }
                 else {
                     $("#nrodocumento").focus();
                 }
            }
            },'json')
        }
        else {
            $("#loading").css("display","none");
            limpiar_pasajero();
            $(this).focus();
        }
    });    
    $("#grab").click(function(){
        bval = true;
        bval = bval && $( "#idtipo_doc" ).required();
        bval = bval && $( "#nrodocumento" ).required();
        bval = bval && $( "#nombres" ).required();
        bval = bval && $( "#apellidos" ).required();
//        bval = bval && $( "#fnacimiento" ).required();
        bval = bval && $( "#sexo" ).required();
        if(bval)
            {
                $("#grab").css("display","none");
                $("#text-load").empty().append("Grabando Pasajero...");
                $("#loading").css("display","inline");
                str = $("#frmventa").serialize();
                $.post('index.php','controller=pasajero&action=save_extend&'+str,function(data){
                    if(data[0]){
                        $("#loading").css("display","none");
                        alert("Se ha registrado correctamente el pasajero");
                        $("#idpasajero").val(data[1]);
                        if(data[2]=="1")
                        {
                            $("#mensajito").css("display","inline");
                            $("#descuento").val($("#subtotal").val());
                            recalcular();
                        }
                    }
                        else {
                            $("#grab").css("display","inline");
                            $("#loading").css("display","none");
                            alert("Ha ocurrido un error, intentelo de nuevo");
                        }
                },'json')
            }        
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
function show_me(n)
{    
    $('#dialog').dialog({title: 'REGISTRO DE NUEVA VENTA DE PASAJE - ASIENTO N° '+n});
    $("#nroasiento").val(n);
    $('#dialog').dialog('open');
    limpiar();
}
function Enter(evt)
      {
        var keyPressed = (evt.which) ? evt.which : event.keyCode
		if (keyPressed==13)
                {
                    validar();
		}
      }
function limpiar()      
{
    $("button").css("display","inline");
    $("#div_save").css("display","none");
    $("#idtipo_documento_venta,#idtipo_doc,#nrodocumento,#nombres,#apellidos,#sexo,#edad,#fnacimiento,#idpasajero").val("");
    $("#reservado").attr("checked",false);
    $("#mensajito").css("display","none");
}
function limpiar_pasajero()
{
    $("#nrodocumento,#nombres,#apellidos,#sexo,#edad,#fnacimiento,#idpasajero").val("");
}
function recalcular()
{
    st = parseFloat($("#subtotal").val());
    des = parseFloat($("#descuento").val());
    ig = parseFloat($("#igv").val())/100*st;
    t =  st - des + ig;
    $("#total").val(t.toFixed(2));
}
function pay_reserva(idv,n)
{    
    $("#libera_asiento,#pay_venta").fadeOut();
    $("#div_save_2").empty().append("Registrando Pago ...");
    $("#div_save_2").fadeIn();
    $.get('index.php','controller=venta&action=pay&idventa='+idv,function(data){
        if(data[0])
        {
            $("#div_save_2").empty().append("<a target='_blank' style='color:#fff' href='index.php?controller=reportes&action=print_venta&idventa="+idv+"'>Imprimir Venta</a>");
            $("#b"+n).removeClass('reservado');
            $("#b"+n).addClass('ocupado');
        }   
        else {alert(data[1]);}
        
    },'json');
}
function libera_asiento(idv,n)
{
    $("#libera_asiento,#pay_venta").fadeOut();
    $("#div_save_2").empty().append("Liberando asiento ...");
    $("#div_save_2").fadeIn();
    $.post('index.php','controller=venta&action=liberar_asiento&idventa='+idv,function(data){
        if(data[0])
        {
            $("#div_save_2").empty().append("<a style='color:#fff' href='javascript:'>Asiento Libre!</a>");
            $("#b"+n).removeClass('reservado');
            $("#b"+n).addClass('free');
        }   
        else {alert(data[1]);}
        
    },'json');
}
function close_viaje(idv)
{
    if(confirm("Realmente desea dar por cerrada las ventas para este viaje?"))
        {
             window.location = 'index.php?controller=viaje&action=close_viaje&idviaje='+idv;
        }
}