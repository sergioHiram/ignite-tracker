<?php
// error_reporting(0);

   $dbhost = 'localhost';
   $dbuser = 'shopphi';
   $dbpass = 'Ad1v1n4l4.!';
   $dbname = 'tracker';

  $con = mysqli_connect($dbhost,
                        $dbuser,
                        $dbpass,
                        $dbname);

                      if (!$con) {
                            die("Connection failed: " . mysqli_connect_error());
                        }


date_default_timezone_set('America/mexico_city');
$Registered_Date = date('m/d/Y H:i:s', time());
$DateOnly = date('Y-m-d');


///////////////////////////////////////////////////////////
function f_c( $string, $action = 'e' ) {

  $secret_key = 'ignite_tracker';
    $secret_iv = 'tracker';

    $output = false;
    $encrypt_method = "AES-256-CBC";
    $key = hash( 'sha256', $secret_key );
    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );

    if( $action == 'e' ) {
        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
    }
    else if( $action == 'd' ){
        $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
    }

    return $output;
}

///////////////////////////////////////////////////////////
function f_c_e( $string, $action = 'e' ) {

  $secret_key = 'ignite_tracker';
    $secret_iv = 'tracker';

    $output = false;
    $encrypt_method = "AES-256-CBC";
    $key = hash( 'sha256', $secret_key );
    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );

    if( $action == 'e' ) {
        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
    }
    else if( $action == 'd' ){
        $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
    }

    echo $output;
}

//////////////////////////////////////////////////////////////
function row_count($result){
return mysqli_num_rows($result);
}

//////////////////////////////////////////////////////////////
function escape($string) {
	global $con;
	return mysqli_real_escape_string($con, $string);
}

//////////////////////////////////////////////////////////////
function query($query) {
	global $con;
	$result =  mysqli_query($con, $query);
	confirm($result);
	return $result;
}

//////////////////////////////////////////////////////////////
function fetch_array($result) {
	global $con;
	return mysqli_fetch_array($result);
}

//////////////////////////////////////////////////////////////
function confirm($result) {
	global $con;
	if(!$result) {
	die("QUERY FAILED" . mysqli_error($con));
	}else{
    return true;
  }
}

//////////////////////////////////////////////////////////////
function clean($string) {
return htmlentities($string);
}

//////////////////////////////////////////////////////////////
function date_function_return($Added_Date){

$Date_Only = substr($Added_Date, 0, 10);
$Time_Only = substr($Added_Date, 11, 8);
$Date_Explode = explode('-', $Date_Only);

$year  = $Date_Explode[0];
$month = $Date_Explode[1];
$day   = $Date_Explode[2];

  if($month == "01"){
        $month = "Enero";
  }elseif($month == "02"){
        $month = "Febrero";
  }elseif($month == "03"){
        $month = "Marzo";
  }elseif($month == "04"){
        $month = "Abril";
  }elseif($month == "05"){
        $month = "Mayo";
  }elseif($month == "06"){
        $month = "Junio";
  }elseif($month == "07"){
        $month = "Julio";
  }elseif($month == "08"){
        $month = "Agosto";
  }elseif($month == "09"){
        $month = "Septiembre";
  }elseif($month == "10"){
        $month = "Octubre";
  }elseif($month == "11"){
        $month = "Noviembre";
  }elseif($month == "12"){
        $month = "Diciembre";
  }

 $Total = $month.' '. $day.', '.$year;

  return $Total;

}

function redirect($url){
  header("Location: $url");
}

function WhoIAm($emailOfTheLoggedInUser){
  $emailOfTheLoggedInUser = f_c($emailOfTheLoggedInUser,'d');
  $sql = "SELECT * FROM IU WHERE Email = '{$emailOfTheLoggedInUser}'";
  $result = query($sql);
  $row = fetch_array($result);
  $WhoIAm['Nombre'] = $row['Nombre'];
  $WhoIAm['Email'] = $row['Email'];

  return $WhoIAm;
}

 ?>
