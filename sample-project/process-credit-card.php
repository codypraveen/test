<?php
// Include config file
require_once('includes/config.php');

/*
<<<<<<< HEAD
=======
* Subscribing a new paypal user
>>>>>>> ac343468fccdc0b4b38b1c3bd92e443a35dadbd3

// Store request params in an array
$request_params = array
					(
					'METHOD' => 'CreateRecurringPaymentsProfile', 
					'USER' => $api_username, 
					'PWD' => $api_password, 
					'SIGNATURE' => $api_signature,
					'VERSION' => $api_version, 
					'PROFILESTARTDATE' => '2015-05-27T00:00:00Z', 
					'DESC' => 'RacquetClubMembership', 					
					'IPADDRESS' => $_SERVER['REMOTE_ADDR'],
					'BILLINGPERIOD' => 'Month',
					'BILLINGFREQUENCY' => 1,
					'MAXFAILEDPAYMENTS' => 3,
					'CREDITCARDTYPE' => 'Visa', 
					'ACCT' => '4539644852839411', 						
					'EXPDATE' => '052015', 			
					'CVV2' => '456', 
					'FIRSTNAME' => 'Tester', 
					'LASTNAME' => 'Testerson', 
					'STREET' => '707 W. Bay Drive', 
					'CITY' => 'Largo', 
					'STATE' => 'FL', 					
					'COUNTRYCODE' => 'US', 
					'ZIP' => '33770', 
					'AMT' => '100.00', 
					'CURRENCYCODE' => 'USD', 
					'DESC' => 'Testing Recurring Payments' 
					);


// Loop through $request_params array to generate the NVP string.
$nvp_string = '';
foreach($request_params as $var=>$val)
{
	$nvp_string .= '&'.$var.'='.urlencode($val);	
}


// Send NVP string to PayPal and store response
$curl = curl_init();
		curl_setopt($curl, CURLOPT_VERBOSE, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($curl, CURLOPT_TIMEOUT, 30);
		curl_setopt($curl, CURLOPT_URL, $api_endpoint);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $nvp_string);

$result = curl_exec($curl);
//echo $result.'<br /><br />';
curl_close($curl);


//echo '<pre>'; print_r($nvp_string); die('here');

// Parse the API response
$result_array = NVPToArray($result);

echo '<pre />';
print_r($result_array);

// Function to convert NTP string to an array
function NVPToArray($NVPString)
{
	$proArray = array();
	while(strlen($NVPString))
	{
		// name
		$keypos= strpos($NVPString,'=');
		$keyval = substr($NVPString,0,$keypos);
		// value
		$valuepos = strpos($NVPString,'&') ? strpos($NVPString,'&'): strlen($NVPString);
		$valval = substr($NVPString,$keypos+1,$valuepos-$keypos-1);
		// decoding the respose
		$proArray[$keyval] = urldecode($valval);
		$NVPString = substr($NVPString,$valuepos+1,strlen($NVPString));
	}
	return $proArray;
}


Created user details

Array
(
    [PROFILEID] => I-BFB3VET47UF1
    [PROFILESTATUS] => ActiveProfile
    [TIMESTAMP] => 2015-05-27T13:01:19Z
    [CORRELATIONID] => 468022fed99a7
    [ACK] => Success
    [VERSION] => 85.0
    [BUILD] => 16837281
)



*/


$result = change_subscription_status('I-BFB3VET47UF1', 'Cancel');

echo '<pre>'; print_r($result);

<<<<<<< HEAD
=======
// Updating an existing paypal subscriber details
>>>>>>> ac343468fccdc0b4b38b1c3bd92e443a35dadbd3

/**
 * Performs an Express Checkout NVP API operation as passed in $action.
 *
 * Although the PayPal Standard API provides no facility for cancelling a subscription, the PayPal
 * Express Checkout  NVP API can be used.
 */
function change_subscription_status( $profile_id, $action ) {
 
    $api_request = 'USER=' . urlencode( SANDBOX_USERNAME_GOES_HERE )
                .  '&PWD=' . urlencode( SANDBOX_PASSWORD_GOES_HERE )
                .  '&SIGNATURE=' . urlencode( SANDBOX_SIGNATURE_GOES_HERE )
                .  '&VERSION=85.0'
                .  '&METHOD=ManageRecurringPaymentsProfileStatus'
                .  '&PROFILEID=' . urlencode( $profile_id )
                .  '&ACTION=' . urlencode( $action )
                .  '&NOTE=' . urlencode( 'Profile cancelled at store' );
 
    $ch = curl_init();
    curl_setopt( $ch, CURLOPT_URL, 'https://api-3t.sandbox.paypal.com/nvp' ); // For live transactions, change to 'https://api-3t.paypal.com/nvp'
    curl_setopt( $ch, CURLOPT_VERBOSE, 1 );
 
    // Uncomment these to turn off server and peer verification
    // curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, FALSE );
    // curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, FALSE );
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
    curl_setopt( $ch, CURLOPT_POST, 1 );
 
    // Set the API parameters for this transaction
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $api_request );
 
    // Request response from PayPal
    $response = curl_exec( $ch );
 
    // If no response was received from PayPal there is no point parsing the response
    if( ! $response )
        die( 'Calling PayPal to change_subscription_status failed: ' . curl_error( $ch ) . '(' . curl_errno( $ch ) . ')' );
 
    curl_close( $ch );
 
    // An associative array is more usable than a parameter string
    parse_str( $response, $parsed_response );
 
    return $parsed_response;
}


/*
	
Array
(
    [PROFILEID] => I-BFB3VET47UF1
    [TIMESTAMP] => 2015-05-27T13:12:47Z
    [CORRELATIONID] => acbb10cc2e06a
    [ACK] => Success
    [VERSION] => 85.0
    [BUILD] => 16837281
)

<<<<<<< HEAD
*/
=======
*/


?>
>>>>>>> ac343468fccdc0b4b38b1c3bd92e443a35dadbd3
