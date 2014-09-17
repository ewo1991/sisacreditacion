$(function() {
    $("#EstadoSemestre" ).focus(); 
    $("#FechaInicio").datepicker({'dateFormat':'dd/mm/yy','changeMonth':true,'changeYear':true});    
    $("#FechaTermino").datepicker({'dateFormat':'dd/mm/yy','changeMonth':true,'changeYear':true});   
    $("#ExamenOrdinario").datepicker({'dateFormat':'dd/mm/yy','changeMonth':true,'changeYear':true});   
    $("#AcreditacionIngresante").datepicker({'dateFormat':'dd/mm/yy','changeMonth':true,'changeYear':true});   
    $("#InicioClase").datepicker({'dateFormat':'dd/mm/yy','changeMonth':true,'changeYear':true});   
    $("#EncuestaEstudiantil").datepicker({'dateFormat':'dd/mm/yy','changeMonth':true,'changeYear':true});   
    $("#ExamenParcial").datepicker({'dateFormat':'dd/mm/yy','changeMonth':true,'changeYear':true}); 
    $("#RetiroTotal").datepicker({'dateFormat':'dd/mm/yy','changeMonth':true,'changeYear':true});   
    $("#EntregaActa").datepicker({'dateFormat':'dd/mm/yy','changeMonth':true,'changeYear':true});   
    $("#ExamenFinal").datepicker({'dateFormat':'dd/mm/yy','changeMonth':true,'changeYear':true});   
    $("#RecepcionActa").datepicker({'dateFormat':'dd/mm/yy','changeMonth':true,'changeYear':true});  
    $("#MatriculaAplazado").datepicker({'dateFormat':'dd/mm/yy','changeMonth':true,'changeYear':true});   
    $("#ExamenAplazado").datepicker({'dateFormat':'dd/mm/yy','changeMonth':true,'changeYear':true});  
    $("#EntregaAplazado").datepicker({'dateFormat':'dd/mm/yy','changeMonth':true,'changeYear':true});   
    $("#RecepcionAplazado").datepicker({'dateFormat':'dd/mm/yy','changeMonth':true,'changeYear':true});   
	$( "#save" ).click(function(){
        
        bval = true;  
        bval = bval && $( "#EstadoSemestre" ).required();
        bval = bval && $( "#Abreviatura" ).required();
        bval = bval && $( "#Descripcion" ).required();
        bval = bval && $( "#ConceptoCarnet" ).required();   
        bval = bval && $( "#FechaInicio" ).required();
        bval = bval && $( "#FechaTermino" ).required();
        bval = bval && $( "#ExamenOrdinario" ).required();
        bval = bval && $( "#AcreditacionIngresante" ).required();
        bval = bval && $( "#InicioClase" ).required();
        bval = bval && $( "#EncuestaEstudiantil" ).required();
        bval = bval && $( "#ExamenParcial" ).required();
        bval = bval && $( "#RetiroTotal" ).required();
        bval = bval && $( "#EntregaActa" ).required();
        bval = bval && $( "#ExamenFinal" ).required();
        bval = bval && $( "#MatriculaAplazado" ).required();
        bval = bval && $( "#ExamenAplazado" ).required();
         bval = bval && $( "#EntregaAplazado" ).required();
        bval = bval && $( "#RecepcionAplazado" ).required();
        
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});