<?php
// Set sandbox (test mode) to true/false.
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
