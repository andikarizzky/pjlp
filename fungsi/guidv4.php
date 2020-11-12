<?php 

/**    return sprintf(
        '%08x-%04x-%04x-%02x%02x-%012x',
        mt_rand(),
        mt_rand(0, 65535),
        bindec(substr_replace(
            sprintf('%016b', mt_rand(0, 65535)), '0100', 11, 4)
        ),
        bindec(substr_replace(sprintf('%08b', mt_rand(0, 255)), '01', 5, 2)),
        mt_rand(0, 255),
        mt_rand()
    );
**/    


function guidv4()
{
 // add limit
$id_length = 10;

// add any character / digit
$alfa = "1234567890";
$token = "";
for($i = 1; $i < $id_length; $i ++) {

  // generate randomly within given character/digits
  @$token .= $alfa[rand(1, strlen($alfa))];

}    
return $token;
}



?>