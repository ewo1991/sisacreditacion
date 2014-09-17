$(function() {
    $( "#DescripcionFacultad" ).focus(); 

    $("#save").click(function(){
        bval = true;        
        bval = bval && $( "#DescripcionFacultad" ).required();     
        bval = bval && $( "#EstadoFacultad" ).required(); 
        bval = bval && $( "#CodFacultadSira" ).required();     
		bval = bval && $( "#Abreviatura" ).required();
        bval = bval && $( "#Decano" ).required(); 
        bval = bval && $( "#SecretarioAcademico" ).required();     
        bval = bval && $( "#DirectorOCRA" ).required(); 
        bval = bval && $( "#DescripcionFacultadIngles" ).required();     
        bval = bval && $( "#DecanoIngles" ).required(); 
        bval = bval && $( "#SecretarioAcademicoIngles" ).required();     
        bval = bval && $( "#DirectorOCRAIngles" ).required(); 
        bval = bval && $( "#Abreviatura" ).required();     
       
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});