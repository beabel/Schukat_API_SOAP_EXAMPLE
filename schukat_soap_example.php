<?php
$username   = 'username';//username
$password   = 'xxxx-xxxx-xxxx-xxxx-xxxx';//password
$wsdl       = 'api_schukat.wsdl';//path to wsdl file 
$api_key    = '~xxxxxxxxxxxxx~';//API Key
//######################################################
$searchstring = 'RMK001';//this can be created dynamic
//######################################################//######################################################
class Shop_SoapClient extends SoapClient{
    public function __construct(string $wsdl, array $options = []){
        $options = array_merge([
            'cache_wsdl' => WSLD_CACHE_NONE,
            'exceptions' => true,
            'soap_version' => SOAP_1_1,
            'trace' => true,
        ], $options);

        parent::__construct($wsdl, $options);
    }
}

$client = new Shop_SoapCLient($wsdl, array('login' => $username,'password' => $password)); 

$result = $client->__soapCall("SEARCH", array(
    "APIKEY" => $api_key,
    "REQUEST" => $searchstring,
    "OUTPUTFORMAT" => 'JSON',
    "LANGUAGE" => 'DE'
    )
);

$result_array = json_decode($result, true);

echo '<pre>';
print_r($result_array);
echo '</pre>';
?>
