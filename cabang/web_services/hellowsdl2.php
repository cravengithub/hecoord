<?php
// Pull in the NuSOAP code
require_once('../nusoap/lib/nusoap.php');
// Create the server instance
$server = new soap_server();
// Initialize WSDL support
$server->configureWSDL('hellowsdl2', 'urn:hellowsdl2');
// Register the data structures used by the service
$server->wsdl->addComplexType(
	'Person',
	'complexType',
	'struct',
	'all',
	'',
	array(
		'firstname' => array('name' => 'firstname', 'type' => 'xsd:string'),
		'age' => array('name' => 'age', 'type' => 'xsd:int'),
		'gender' => array('name' => 'gender', 'type' => 'xsd:string')
	)
);
$server->wsdl->addComplexType(
	'SweepstakesGreeting',
	'complexType',
	'struct',
	'all',
	'',
	array(
		'greeting' => array('name' => 'greeting', 'type' => 'xsd:string'),
		'winner' => array('name' => 'winner', 'type' => 'xsd:boolean')
	)
);
// Register the method to expose
$server->register('hello',					// method name
	array('person' => 'tns:Person'),		// input parameters
	array('return' => 'tns:SweepstakesGreeting'),	// output parameters
	'urn:hellowsdl2',						// namespace
	'urn:hellowsdl2#hello',					// soapaction
	'rpc',									// style
	'encoded',								// use
	'Greet a person entering the sweepstakes'		// documentation
);
// Define the method as a PHP function
function hello($person) {
	global $server;

    $greeting = 'Hello, ' . $person['firstname'] .
                '. It is nice to meet a ' . $person['age'] .
                ' year old ' . $person['gender'] . '.';
    
    if (isset($_SERVER['REMOTE_USER'])) {
    	$greeting .= '  How do you know ' . $_SERVER['REMOTE_USER'] . '?';
    }

    $winner = $person['firstname'] == 'Scott';
    $res = array(
                'greeting' => $greeting,
                'winner' => $winner
                );
    return $res;
}
// Use the request to (try to) invoke the service
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>
