<?php
	
	require dirname(__FILE__).'/Paypal.php';

	$sandbox = TRUE;
	define("SANDBOX_USERNAME_GOES_HERE", "martin.mahtab_api1.ithands.net");
	define("SANDBOX_PASSWORD_GOES_HERE", "1366949877");
	define("SANDBOX_SIGNATURE_GOES_HERE", "AFcWxV21C7fd0v3bYYYRCpSSRl31A6xIDOA4hHKnHBFZfZUVHIUs0y2F");

	// Set PayPal API version and credentials.
	$api_version = '85.0';
	$api_endpoint = $sandbox ? 'https://api-3t.sandbox.paypal.com/nvp' : 'https://api-3t.paypal.com/nvp';
	$api_username = $sandbox ? SANDBOX_USERNAME_GOES_HERE : 'LIVE_USERNAME_GOES_HERE';
	$api_password = $sandbox ? SANDBOX_PASSWORD_GOES_HERE : 'LIVE_PASSWORD_GOES_HERE';
	$api_signature = $sandbox ? SANDBOX_SIGNATURE_GOES_HERE : 'LIVE_SIGNATURE_GOES_HERE';
	
        
        $data = new IthPaypal();

        // Store request params in an array
        $subscription_array = array
            (
            'METHOD' => 'CreateRecurringPaymentsProfile',
            'USER' => $api_username,
            'PWD' => $api_password,
            'SIGNATURE' => $api_signature,
            'VERSION' => $api_version,
            'PROFILESTARTDATE' => gmdate('Y-m-d\TH:i:s\Z'),
            'DESC' => 'RacquetClubMembership',
            'IPADDRESS' => $_SERVER['REMOTE_ADDR'],
            'BILLINGPERIOD' => 'Month',
            'BILLINGFREQUENCY' => 2,
            'MAXFAILEDPAYMENTS' => 3,
            'CREDITCARDTYPE' => 'Visa',
            'ACCT' => '4539644852839411',
            'EXPDATE' => '052015',
            'CVV2' => '456',
            'FIRSTNAME' => 'Praveen',
            'LASTNAME' => 'Dabral',
            'STREET' => '707 W. Bay Drive',
            'CITY' => 'Largo',
            'STATE' => 'FL',
            'COUNTRYCODE' => 'US',
            'ZIP' => '33770',
            'AMT' => '100.00',
            'CURRENCYCODE' => 'USD'
        );
        
        
	//$result = $data->subscribe($subscription_array, $api_endpoint);
	//echo'<pre>'; print_r($result);
        
        $cancel_array = array
            (
            'METHOD' => 'ManageRecurringPaymentsProfileStatus',
            'USER' => $api_username,
            'PWD' => $api_password,
            'SIGNATURE' => $api_signature,
            'VERSION' => $api_version,
            'PROFILEID' => 'I-TAWD0DD6R7SL',
            'ACTION' => 'Cancel',
            'NOTE' => 'Profile cancelled at store'
        );
        
        
	//$result = $data->change_subscription_status($cancel_array, $api_endpoint);
	//echo'<pre>'; print_r($result);
        
        // Store request params in an array
        $update_array = array
            (
            'METHOD' => 'UpdateRecurringPaymentsProfile',
            'USER' => $api_username,
            'PWD' => $api_password,
            'SIGNATURE' => $api_signature,
            'VERSION' => $api_version,
            'PROFILEID' => 'I-TAWD0DD6R7SL',
            'DESC' => 'Updating Recurring Payment Details',
            'IPADDRESS' => $_SERVER['REMOTE_ADDR'],
            'CREDITCARDTYPE' => 'Visa',
            'ACCT' => '4539644852839411',
            'EXPDATE' => '052015',
            'CVV2' => '456',
            'FIRSTNAME' => 'Cody',
            'LASTNAME' => 'Praveen',
            'STREET' => '707 W. Bay Drive',
            'CITY' => 'Largo',
            'STATE' => 'FL',
            'COUNTRYCODE' => 'US',
            'ZIP' => '33770',
            'CURRENCYCODE' => 'USD'
        );
        
	//$result = $data->update_subscription_details($update_array, $api_endpoint);
	//echo'<pre>'; print_r($result);
        
        $profile_array = array
            (
            'METHOD' => 'GetRecurringPaymentsProfileDetails',
            'USER' => $api_username,
            'PWD' => $api_password,
            'SIGNATURE' => $api_signature,
            'VERSION' => $api_version,
            'PROFILEID' => 'I-TAWD0DD6R7SL'
        );
        
	//$result = $data->get_subscription_details($profile_array, $api_endpoint);
	//echo'<pre>'; print_r($result);

?>