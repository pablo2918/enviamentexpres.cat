<?php
// CONFIGURACIÓ DE L'ENLLAÇ (Dades reals del teu Odoo i Ngrok)
$odoo_url   = 'https://nursing-greeting-footboard.ngrok-free.dev/jsonrpc';
$odoo_db    = 'enviamentexpress';
$odoo_user  = 'pamofr@inspalamos.cat';
$odoo_pass  = 'P@ssw0rd';
$channel_id = 6;

// 1. RECEPCIÓ DE LES DADES DE WOOCOMMERCE
$json_data = file_get_contents('php://input');
$data = json_decode($json_data, true);

if (!$data) {
    die("No s'han rebut dades vàlides de WooCommerce.");
}

$line_items = $data['line_items'];
$missatge_productes = "";

foreach ($line_items as $item) {
    $sku = $item['sku'];
    $qty = $item['quantity'];
    $missatge_productes .= "• <b>Producte (SKU):</b> $sku | <b>Quantitat:</b> $qty<br>";
}

// 2. AUTENTICACIÓ AMB L'ERP ODOO (LOGIN)
$login_payload = json_encode([
    "jsonrpc" => "2.0",
    "method" => "call",
    "params" => [
        "service" => "common",
        "method" => "login",
        "args" => [$odoo_db, $odoo_user, $odoo_pass]
    ],
    "id" => 1
]);

$ch = curl_init($odoo_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $login_payload);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
$response = curl_exec($ch);
$result = json_decode($response, true);
$uid = $result['result'] ?? null;

if (!$uid) {
    die("Error en l'autenticació. Revisa la base de dades o credencials.");
}

// 3. ENVIAMENT DEL MISSATGE AL CANAL DE DISCUSSIÓ
$html_body = "🚨 <b>NOVA COMANDA REBUDA A LA BOTIGA WEB!</b><br>" . $missatge_productes . "⚠️ <i>Si us plau, prepareu el paquet per al seu enviament urgent.</i>";

$message_payload = json_encode([
    "jsonrpc" => "2.0",
    "method" => "call",
    "params" => [
        "service" => "object",
        "method" => "execute_kw",
        "args" => [
            $odoo_db,
            $uid,
            $odoo_pass,
            "mail.channel",
            "message_post",
            [$channel_id],
            ["body" => $html_body, "message_type" => "comment"]
        ]
    ],
    "id" => 2
]);

curl_setopt($ch, CURLOPT_POSTFIELDS, $message_payload);
$final_response = curl_exec($ch);
curl_close($ch);

echo "Notificació de comanda tramesa amb èxit cap a l'Odoo.";
?>
