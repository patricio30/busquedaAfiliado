<?php
$busqueda = $_POST['busqueda'];
$fechaArchivo = $_POST['fechaArchivo'];//Tendria que tomar la fecha de la base de datos asi no se pasa este valor por url
$salida = false;

if (($fichero = fopen("18-06-2020.csv", "r")) !== FALSE) {
    while (($datos = fgetcsv($fichero, 1000)) !== FALSE) {
    	if ($datos[1] == $busqueda){
    		$salida = true;
            $salida1 = $datos[1];
            $salida2 = $datos[2];
    	}
    }
}
if(!is_numeric($busqueda)){
     echo '<div class="container"><hr/>
        <h3 id="alerta">LA ENTRADA NO ES VÁLIDA</h3>
        </div>';
}
else{
        if(strpos($busqueda, '.') !== false){
            echo '<div class="container"><hr/>
        <h3 id="alerta">LA ENTRADA NO ES VÁLIDA</h3>
        </div>';
        }
        else{
                if($salida){
                    $apellido = urlencode($salida2);
                    echo '<div class="container">
                        <hr/>
                        <h5 id="mensaje">SE ENCUENTRA HABILITADO EN LA MUTUAL POLICIAL</h5>
                        </div>';
                    echo '<div class="container">
                          <table class="table table-bordered table-striped">
                          <thread>
                          <tr class="p-3 mb-2 bg-secondary text-white">
                            <td>Numero documento</td>
                            <td>Apellido y Nombre</td>
                          </tr>
                         </thread>
                            <tbody>
                            <tr id="datos">
                                <td>'.$salida1.'</td>
                                <td>'.$salida2.'</td>
                            </tr>
                            </tbody>
                        </table>
                        </div>';
                    echo '<div class="container"><h5 id="alerta">ESTO NO ASEGURA QUE SE ENCUENTRE HABILITADO EN ISSN</h5></div>';
                }
                else{
                	//echo "El afiliado NO se encuentra HABILITADO";
                	//echo json_encode(array('mensaje' => "El afiliado NO se encuentra en los registros de los habilitados", 'salida' => '1'));
                    echo '<div class="container"><hr/>
                        <h3 id="alerta">EL AFILIADO NO FIGURA EN LOS REGISTROS DE HABILITADOS DE LA MUTUAL POLICIAL</h3>
                        </div>';
                }
            }
}
?>

<style type="text/css">
#datos{
  font-size: 16px;
}
#detalles{
  font-size: 16px;
}
#mensaje{
    color: #0072BC;
}
#alerta{
    color: #0072BC;
}
</style>

