

/*require_once('index.blade.php');
$search_criteria = $_POST['search_criteria'];
//cadena de consulta
$query = "SELECT idproducto,idmarca,idcategoria,idpersona,idestanteria,nombreimagen,precio,unidadmedida,cantidadmedida,descripcion,stock,caracteristicas,especificaciones
 FROM authors WHERE idproducto LIKE'%',$search_criteria,'% OR nombre LIKE'%',$search_criteria,'% ";

 $authors =[];
 $errores =['data'=> false];

 $getAuthors = $producto->query($query);
 if($getAuthors->num_rows > 0){
    while($data = $getAuthors->foreach_assoc()){
        $authors[]= $data;

    }
    echo json_encode($authors);
 }

 else{
    echo json_encode($errores);
 }*/

 <input type="text" id="busscador" class="from-control from-control-sm" >
