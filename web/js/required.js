/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
(function( $ ){
  $.fn.required = function() {
    if ( $(this).val() == '' ) {
        $(this).addClass('ui-state-error');
        $(this).focus();
        return false;
    }else {
        $(this).removeClass('ui-state-error')
        return true;
    }
  };
})( jQuery );

