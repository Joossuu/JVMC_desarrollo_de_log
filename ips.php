<?php
// Rango de IPs permitidas
global $rango;
$rango = array(
    "127.0.0.1/32",               // localhost
    "192.168.1.0/24",             // red local común
    "::ffff:192.168.1.0/120",     // IPv6 mapeado a IPv4
    "192.168.1.27",               // IP específica
    "10.0.0",                     // subred general
    "172.16.10.1-172.16.10.50"    // rango específico
);

// Función para validar si la IP está en alguno de los rangos
function ip_in_ranges($ip, $rango) {
    // Convertir IPv6 localhost a IPv4
    if ($ip === '::1') {
        $ip = '127.0.0.1';
    }

    // Asegurar que es una IP válida para comparar
    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) === false) {
        return false;
    }

    foreach ($rango as $range) {
        if (strpos($range, '/') !== false) {
            list($subnet, $bits) = explode('/', $range);
            $ip_dec = ip2long($ip);
            $subnet_dec = ip2long($subnet);
            if ($ip_dec === false || $subnet_dec === false) continue;
            $mask = -1 << (32 - $bits);
            if (($ip_dec & $mask) === ($subnet_dec & $mask)) {
                return true;
            }
        } elseif (strpos($range, '-') !== false) {
            list($start, $end) = explode('-', $range);
            $ip_dec = ip2long($ip);
            $start_dec = ip2long($start);
            $end_dec = ip2long($end);
            if ($ip_dec === false || $start_dec === false || $end_dec === false) continue;
            if ($ip_dec >= $start_dec && $ip_dec <= $end_dec) {
                return true;
            }
        } else {
            if ($ip === $range || strpos($ip, $range) === 0) {
                return true;
            }
        }
    }
    return false;
}
?>
