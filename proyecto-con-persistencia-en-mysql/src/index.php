<?php
$host = 'db';
$dbname = 'imaw';
$user = 'imaw';
$password = 'imaw';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query('SELECT texto FROM mensajes ORDER BY id DESC LIMIT 1');
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $mensaje = $row ? $row['texto'] : 'Conexion PDO correcta';

    echo '<h1>Proyecto con persistencia en MySQL: PHP + MySQL (PDO)</h1>';
    echo '<p>' . htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8') . '</p>';
} catch (Throwable $e) {
    http_response_code(500);
    echo '<h1>Error de conexion PDO</h1>';
    echo '<pre>' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '</pre>';
}