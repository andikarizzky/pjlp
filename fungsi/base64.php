  <?php
    function encrypt($s) {
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $secret_key = 'd8578edf8458ce06fbc5bb19a98c5ca4';
    $secret_iv = 'd1998edf8458ce06fbc5bb19a98c5ca4';
    // hash
    $key = hash('sha256', $secret_key);
    
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);    	

        $qEncoded    = openssl_encrypt($s, $encrypt_method, $key, 0, $iv);
        $qEncoded	 = base64_encode($qEncoded); 
        return($qEncoded);
    }
    function decrypt($s) {
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $secret_key = 'd8578edf8458ce06fbc5bb19a98c5ca4';
    $secret_iv = 'd1998edf8458ce06fbc5bb19a98c5ca4';
    // hash
    $key = hash('sha256', $secret_key);
    
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16); 

        $cryptKey    ='d8578edf8458ce06fbc5bb19a98c5ca4';
        $qDecoded    =openssl_decrypt(base64_decode($s), $encrypt_method, $key, 0, $iv);
        return($qDecoded);
    }
 ?> 


<?php 
/**
function guidv4()
{
    if (function_exists(‘com_create_guid’) === true)
        return trim(com_create_guid(), ‘{}’);

    $data = openssl_random_pseudo_bytes(16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10
    return vsprintf(‘%s%s-%s-%s-%s-%s%s%s’, str_split(bin2hex($data), 4));
}

$id = guidv4();
echo $id;
**/
?>