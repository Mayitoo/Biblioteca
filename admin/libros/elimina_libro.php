<?php
include('../conexion.php');

$id = $_POST['id'];

mysqli_query($con, "DELETE FROM libros WHERE id_libro = '$id'");

$registro = mysqli_query($con, "SELECT * FROM libros ORDER BY id_libro desc");

echo '<table class="table table-striped table-condensed table-hover table-responsive">
        	<tr>
                <th width="200">Foto</th>
            	<th width="200">Nombre</th>
            	<th width="200">Descripcion</th>
            	<th width="200">Disponible</th>
            	<th width="200">Categoria</th>
            	<th width="200">Subcategoria</th>
            	<th width="200">Proveedor</th>
            	<th width="200">Fecha Ingreso</th>
            	<th width="200">URL Descarga</th>
				<th width="50">Opciones</th>
            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		$foto = $registro2['foto'];
		$imagen = '<img src="'.$foto.'" width="50" height="50">';
		echo '<tr>
				<td>'.$imagen.'</td>
				<td>'.$registro2['nombre'].'</td>
				<td>'.$registro2['descripcion'].'</td>
				<td>'.$registro2['disponible'].'</td>
				<td>'.$registro2['id_categoria'].'</td>
				<td>'.$registro2['id_subcategoria'].'</td>
				<td>'.$registro2['id_proveedor'].'</td>
				<td>'.$registro2['fecha_ingreso'].'</td>
				<td>'.$registro2['url_descarga'].'</td>
				<td> <a href="javascript:editarLibro('.$registro2['id_libro'].');" class="glyphicon glyphicon-edit eliminar"     title="Editar"></a>
				 <a href="javascript:eliminarLibro('.$registro2['id_libro'].');">
				 <img src="../images/delete.png" width="15" height="15" alt="delete" title="Eliminar" /></a>
				 </td>
				</tr>';
	}
echo '</table>';
?>