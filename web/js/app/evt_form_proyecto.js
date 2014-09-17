$(function() {
     var codigofacultad = $("#CodigoFacultad");
     var codigofaculta = $("#idejetematico");
     

     codigofaculta.change(function(){
        var ids = $(this).val();
        
   $.post('index.php','controller=linea_investigacion&action=getLinea_investigacion&idejetematico='+ids,function(data){
            $("#idlinea_investigacion").empty().append(data);            
        });
    });
    
    codigofacultad.change(function(){
        var ids = $(this).val();
        
   $.post('index.php','controller=escuelaprofesional&action=getEscuelaProfesional&CodigoFacultad='+ids,function(data){
            $("#CodigoEscuela").empty().append(data);            
        });
    });
        
    $("#departamento").change(function(){ 
        var ids = $(this).val();
        $.post('index.php','controller=proyecto&action=getListaProvincias&departamento='+ids,function(data){
            console.log(data);
            //provincia
            $("#provincia").empty().append(data);
        });
    });
    
    
    $("#provincia").change(function(){
        var ids = $(this).val();
        $.post('index.php','controller=proyecto&action=getListaDistritos&provincia='+ids,function(data){
            console.log(data);
            //distrito
            $("#distrito").empty().append(data);
        });
    });
    
    
    cont=1;
    $("#newobj").click(function(){
        var captura=$("#objetivos_especificos").val();
        if(captura==""){$("#objetivos_especificos").focus();}else{
            
        html="<tr><td><font><font>Objetivo Especifico "+cont+"</font></font></td><td><textarea id='objetivos_especificos"+cont+"' name='objetivos_especificos"+cont+"' class='form-control' rows='3' style='margin-bottom: 0px;'></textarea></td></tr>";
            
            $("#ooo").append(html);
        $("#objetivos_especificos"+cont+"").val(captura);
        $("#conta").val(cont);
        $("#objetivos_especificos").val("");
        cont++;}
        
    });
    $("#dltobj").click(function(){
            cont--;
            $("#objetivos_especificos"+cont+"").remove();
            
        
    });
//    $( "#nombre_proyecto" ).focus();   
//   
//    $( "#save" ).click(function(){
//        bval = true;  
//        bval = bval && $( "#nombre_proyecto" ).required();
//        bval = bval && $( "#periodo_ejecucion" ).required();
//        bval = bval && $( "#idlinea_investigacion" ).required();
//        bval = bval && $( "#Ubigeo" ).required();
//        
//        bval = bval && $( "#viabilidad_tecnica" ).required();
//        bval = bval && $( "#presupuesto" ).required();
//        bval = bval && $( "#CodigoEscuela" ).required();
//        if ( bval ) {
//            $("#frm").submit();
//        }
//        return false;
//    });   
});