<?php
/**
 * Broadcasts a UDP message to the network.
 *
 * This script does the same thing as below in Bash:
 *    echo 'foo' | socat - UDP4-DATAGRAM:255.255.255.255:6666,so-broadcast
 */

$name_host  = getenv('MY_HOST');
$port       = getenv('PORT_UDP_BROADCAST');
$time_sleep = getenv('TIME_INTERVAL_MSG');

$sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
socket_set_option($sock, SOL_SOCKET, SO_BROADCAST, 1);

$counter = 0;
while (true) {
    $broadcast_string = "Count:${counter}\tBroadcasting meow meow from ${name_host}" . PHP_EOL;
    socket_sendto($sock, $broadcast_string, strlen($broadcast_string), 0, '255.255.255.255', $port);

    $counter++;
    sleep($time_sleep);
}
