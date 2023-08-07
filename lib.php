<?php 

if( !function_exists( 'redirect' ) ){
	function redirect($url){
		$content  = '<script>
		window.location = "'. $url .'";
		</script>';
		return $content;
	}
}

if( !function_exists( 'get_option' ) ){
	function get_option($option_name){
		global $db;
		$db->where ('option_name', $option_name);
		$results = $db->get ('options');
		
		if( isset( $results[0][ 'option_name' ] ) )
		return $results[0]['option_value'];
		else
			return false;
	}

}
if( !function_exists( 'formate_date_mysql' ) ){
	function formate_date_mysql($date){
		$input_date=$date;
		$date=date("Y-m-d",strtotime($input_date));
			return $date;
	}

}
function services(){
	$nombre_servicio = [
		'Plomería',
		'Electricidad',
		'Carpintería',
		'Limpieza del Hogar',
		'Jardinería/Paisajismo',
		'Pintura',
		'Reparación de electrodomésticos',
		'AC (Aire acondicionado)',
		'Seguridad del hogar',
		'Diseño de interiores'
	]; 

	return $nombre_servicio;
}

function locations()
{
	$lugar = array(
		'Santo Domingo',
		'Santo Domingo Oeste',
		'Santo Domingo Norte',
		'La Romana',
		'San Pedro de Macorís',
		'San Cristóbal',
		'Puerto Plata',
		'Salvaleón de Higüey',
		'Bonao',
		'Mao (Valverde)',
		'San Juan de la Maguana',
		'Baní',
		'Moca',
		'Azua',
		'Hato Mayor del Rey',
		'Cotuí',
		'Santiago',
		'La Romana',
		'San Francisco de Macorís',
		'Salvaleón de Higüey',
		'Concepción de La Vega',
		'La Vega'
	);

	return $lugar;
}

?>