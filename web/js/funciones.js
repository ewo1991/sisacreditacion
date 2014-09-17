function limpiarcliente(){
                $('#nombre').val("");
            $('#apellidos').val(""); 
            $('#email').val(""); 
            $('#usuario').val(""); 
            $('#contraseña').val(""); 
            $('#telefono').val(""); 
            $('#movil').val(""); 
            $('#direccion').val(""); 
            $('#ciudad').val(""); 
            $('#pais').val(""); 
            $('#dni').val(""); 
            $('#id_cliente').val(""); 
            }
            
function editarCliente(nombre,apellidos,email,usuario,contraseña,telefono,movil,direccion,ciudad,pais,dni,id_cliente){
            $('#nombre').val(nombre);
            $('#apellidos').val(apellidos); 
            $('#email').val(email); 
            $('#usuario').val(usuario); 
            $('#contraseña').val(contraseña); 
            $('#telefono').val(telefono); 
            $('#movil').val(movil); 
            $('#direccion').val(direccion); 
            $('#ciudad').val(ciudad); 
            $('#pais').val(pais); 
            $('#dni').val(dni); 
            $('#id_cliente').val(id_cliente); 
             $('#agregarUser').dialog('open');
            }
function limpiarproducto(){
            $('#imagen').val("");
            $('#nombre').val(""); 
            $('#precio').val(""); 
            $('#descripcion').val(""); 
            $('#caracter').val(""); 
            $('#stock').val(""); 
            $('#estado').val(""); 
            $('#id_producto').val("");
            $('#idcategoria').val(""); 
            
            }
            
function editarProducto(nombre,descripcion,caracter,precio,stock,estado,idcategoria,id_producto){
            
        
            
            $('#nombre').val(nombre); 
            $('#descripcion').val(descripcion); 
            $('#caracter').val(caracter); 
            $('#precio').val(precio); 
            $('#stock').val(stock); 
            $('#estado').val(estado);
            $('#idcategoria').val(idcategoria); 
            $('#id_producto').val(id_producto); 
             $('#agregarUser').dialog('open');
            }

