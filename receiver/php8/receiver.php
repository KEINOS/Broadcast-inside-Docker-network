<?php
/**
 * Receives the broadcasted UDP message in the network.
 *
 * This script does the same thing as below in Bash:
 *    socat -u UDP-LISTEN:$PORT_UDP_BROADCAST,fork STDOUT
 */

$name_host = getenv('MY_HOST');
$port      = intval(getenv('PORT_UDP_BROADCAST'));
$len_msg_max = strlen(str_repeat('あ', 255));

$sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
socket_bind($sock, '0.0.0.0', $port);
socket_set_option($sock, SOL_SOCKET, MCAST_JOIN_GROUP, 1);

while (true) {
    $buff = '';
    $flag = 0;
    $from_add = ''; // 送信元のアドレスが入る
    $from_port = 0;
    $result = socket_recvfrom($sock, $buff, $len_msg_max, $flag, $from_add, $from_port);
    if ($result === false) {
        continue;
    }
    if (empty(trim($buff))) {
        continue;
    }

    echo "Msg received: " . trim($buff) . "\t : ${name_host}" . PHP_EOL;
}
