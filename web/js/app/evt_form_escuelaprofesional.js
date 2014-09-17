$(function() {
    
    $( "#EstadoEscuela" ).focus();   
   
    $( "#save" ).click(function(){
        bval = true;  
        bval = bval && $( "#CodEscuelaSira" ).required();
        bval = bval && $( "#DescripcionEscuela" ).required();
        bval = bval && $( "#CodigoFacultad" ).required();
        bval = bval && $( "#CodigoTipoPeriodoAcademico" ).required();
        bval = bval && $( "#Abreviatura" ).required();
        bval = bval && $( "#PeriodoReglamentario" ).required();

        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});