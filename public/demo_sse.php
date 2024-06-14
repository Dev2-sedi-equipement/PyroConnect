<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

$message = $_POST['message'] ?? 'Notification: Nouveau dossier créé.';

echo "data: {$message}\n\n";
flush();
?>
