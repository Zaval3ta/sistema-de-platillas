<?php
declare(strict_types=1); //Para que los tipos sean strictos y solo funciona a nivel de archivo

//Sistema de plantillas
function render_template(string $template, array $data = [])
{
  extract($data); //extra las variables de array asociativo
  require "templates/$template.php";
}
//Espera que $url sea un STRING y devuelva un ARRAY
function get_data(string $url): array
{
  $result = file_get_contents($url); //Solo para hacer un GEt de un API
  $data = json_decode($result, true);
  return $data;
}
function get_until_message(int $days ): string {
  return match(true) {
    $days === 0   => '¡Hoy se estrena!',
    $days === 1   => 'Mañana se estrena',
    $days  <  7   => $days . ' días. Se estrena esta semana...',
    $days  <  30  => $days. ' días. Este mes se estrena...',
    default       => $days . ' días hasta el estreno',
  };
}
?>