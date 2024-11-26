<?php
// logout.php
session_start(); // Ensure the session is active
session_destroy(); // Destroy the session
echo json_encode(['status' => 'success', 'message' => 'Session destroyed']);
