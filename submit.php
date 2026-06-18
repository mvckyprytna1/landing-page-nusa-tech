<?php
session_start();
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Method Not Allowed']);
    exit;
}

if (!isset($_POST['csrf_token'], $_SESSION['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Token keamanan tidak valid. Silakan refresh halaman.']);
    exit;
}

$name = trim((string)filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS));
$phone = trim((string)filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS));
$device = trim((string)filter_input(INPUT_POST, 'device', FILTER_SANITIZE_SPECIAL_CHARS));
$service = trim((string)filter_input(INPUT_POST, 'service', FILTER_SANITIZE_SPECIAL_CHARS));
$issue = trim((string)filter_input(INPUT_POST, 'issue', FILTER_SANITIZE_SPECIAL_CHARS));

if ($name === '' || $phone === '' || $device === '' || $service === '' || $issue === '') {
    http_response_code(422);
    echo json_encode(['status' => 'error', 'message' => 'Semua field wajib diisi.']);
    exit;
}

if (mb_strlen($name) > 50 || mb_strlen($phone) > 20 || mb_strlen($issue) > 500) {
    http_response_code(422);
    echo json_encode(['status' => 'error', 'message' => 'Beberapa input melebihi batas karakter.']);
    exit;
}

$storageDir = __DIR__ . '/storage';
$storageFile = $storageDir . '/leads.csv';
if (!is_dir($storageDir)) {
    mkdir($storageDir, 0755, true);
}

$fileExists = file_exists($storageFile);
$fp = @fopen($storageFile, 'a');
if ($fp) {
    if (!$fileExists) {
        fputcsv($fp, ['Tanggal', 'Nama', 'WhatsApp', 'Perangkat', 'Layanan', 'Keluhan']);
    }
    fputcsv($fp, [date('Y-m-d H:i:s'), $name, $phone, $device, $service, $issue]);
    fclose($fp);
}

$waMessage = "Halo NusaTech Care, saya {$name}, WhatsApp: {$phone}. Perangkat: {$device}. Layanan: {$service}. Keluhan: {$issue}";
$waUrl = 'https://wa.me/6281252580812?text=' . rawurlencode($waMessage);

echo json_encode([
    'status' => 'success',
    'message' => 'Form berhasil dikirim. Mengalihkan ke WhatsApp...',
    'wa_url' => $waUrl,
]);
exit;
?>
