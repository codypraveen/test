<?php


/**
 * IthPaypal class to create/update/cancel/get a recurring payments profile subscription
 * 
 */
class IthPaypal {
    
    
    /**
     * Create new recurring payments profile subscription
     * 
     * @param type $params
     * @param type $api_endpoint
     * @return array
     */
    public function subscribe($params, $api_endpoint) {

        // Converting array to string
        $request_string = $this->array_to_string($params);
        
        // Request for new subscription
        $result = $this->request($request_string, $api_endpoint);
        return $result;
    }


    /**
     * This function performs Cancel/Suspend/Reactivate operations on recurring payments profile
     * 
     * Cancel – Profile status is not Active or Suspended.
     * Suspend – Profile status is not Active.
     * Reactivate – Profile status is not Suspended.
     * 
     * @param type $params
     * @param type $api_endpoint
     * @return array
     */
    public function change_subscription_status($params, $api_endpoint) {

        // Converting array to string
        $request_string = $this->array_to_string($params);
        
        // Request to change subscription status
        $result = $this->request($request_string, $api_endpoint);
        return $result;
    }

    
    /**
     * Update recurring payments profile subscription details
     * 
     * @param type $params
     * @param type $api_endpoint
     * @return array
     */
    public function update_subscription_details($params, $api_endpoint) {

        // Converting array to string
        $request_string = $this->array_to_string($params);
        
        // Request to update subscription details
        $result = $this->request($request_string, $api_endpoint);
        return $result;
    }

    
    
    /**
     * This function fetches recurring payments profile details
     * 
     * @param type $params
     * @param type $api_endpoint
     * @return array
     */
    public function get_subscription_details($params, $api_endpoint) {

        // Converting array to string
        $request_string = $this->array_to_string($params);
        
        // Request to get subscription details
        $result = $this->request($request_string, $api_endpoint);
        return $result;
    }

    
    /**
     * This function performs curl request with custom api_request parameters
     * 
     * @param type $api_request
     * @param type $api_endpoint
     * @return array
     */
    function request($api_request, $api_endpoint) {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $api_endpoint);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);

        // Uncomment these to turn off server and peer verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        // curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, FALSE );
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);

        // Set the API parameters for this transaction
        curl_setopt($ch, CURLOPT_POSTFIELDS, $api_request);

        // Request response from PayPal
        $response = curl_exec($ch);

        // If no response was received from PayPal there is no point parsing the response
        if (!$response)
            die('Calling PayPal to change_subscription_status failed: ' . curl_error($ch) . '(' . curl_errno($ch) . ')');

        curl_close($ch);

        // An associative array is more usable than a parameter string
        parse_str($response, $parsed_response);

        return $parsed_response;
    }
    
    
    /**
     * This function converts array to NVP string
     * 
     * @param type $request_array
     * @return string
     */
    
    
    function array_to_string($request_array) {

        // Loop through $request_array to generate the NVP string.
        $nvp_string = '';
        foreach ($request_array as $var => $val) {
            $nvp_string .= '&' . $var . '=' . urlencode($val);
        }
        return $nvp_string;
    }

}

?>