<?php
function encryptData($data) {
  $encryption_key = "y0u3nd@iY"; // Use a strong key and store it securely
  $iv = openssl_random_pseudo_bytes(16); // Generate a random IV
  $encrypted = openssl_encrypt($data, "AES-256-CBC", $encryption_key, 0, $iv);
  return base64_encode($iv . $encrypted); // Store IV with encrypted data
}

function decryptData($data) {
  if (empty($data)) {
      return null; // or handle it in a way that suits your app
  }

  $encryption_key = "y0u3nd@iY"; // Use the same key as encryption
  $data = base64_decode($data);

  if ($data === false || strlen($data) < 16) {
      return null; // Invalid or corrupted data
  }

  $iv = substr($data, 0, 16);
  $encryptedData = substr($data, 16);

  return openssl_decrypt($encryptedData, "AES-256-CBC", $encryption_key, 0, $iv);
}

