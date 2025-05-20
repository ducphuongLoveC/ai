<?php
header("Content-Type: application/json");


$env = parse_ini_file(__DIR__ . '/../.env');

$apiKey = $env['OPENAI_API_KEY'] ?? null;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(["error" => "Phương thức không được phép"]);
    exit;
}


$input = json_decode(file_get_contents('php://input'), true);
$messages = $input['messages'] ?? [];

if (empty($messages)) {
    http_response_code(400);
    echo json_encode(["error" => "Không có tin nhắn được gửi"]);
    exit;
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.openai.com/v1/chat/completions");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
    "model" => "gpt-4",
    "messages" => $messages,
    "stream" => true
]));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "Authorization: Bearer $apiKey"
]);


curl_setopt($ch, CURLOPT_WRITEFUNCTION, function ($ch, $data) {
    echo $data;
    flush();
    return strlen($data);
});

curl_exec($ch);
if (curl_errno($ch)) {
    http_response_code(500);
    echo json_encode(["error" => "Lỗi khi gọi API: " . curl_error($ch)]);
}
curl_close($ch);
?>