<?php


header("Content-Type: text/plain"); //convierto pagina a texto plano
//inicio curl
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.misdatos.com.co/api/co/consultarNombres',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'documentType=CC&documentNumber=18261709',
  CURLOPT_HTTPHEADER => array(
    'Authorization: <API CODE>',// 'Authorization: XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX  ',
    'Content-Type: application/x-www-form-urlencoded'
  ),
));

$response = curl_exec($curl);
curl_close($curl);

/*extraer cedula de cadena de texto recibida por la pagina*/
$cadena_de_texto = $response;
$porcioninicial = explode('fullName":"', $cadena_de_texto);
$portionfinal = explode('"', $porcioninicial[1]);
echo $portionfinal[0];

?>
