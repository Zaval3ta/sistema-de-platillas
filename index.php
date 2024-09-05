<?php
require_once 'constantes.php';
require_once 'funciones.php';

$data = get_data(API_URL);
$until_message = get_until_message($data['days_until']);
?>
<?php render_template('head', $data); //Le pasamos el array a la funcion para que extraiga las variables ?>
<?php render_template('body', array_merge($data, ['until_message' => $until_message])); //fucionar arrays ?>
<?php render_template('style'); ?>