#!/bin/sh
#
# Broadcasts a UDP message from Python3 to the network.
#

i=0
while :
do
    echo -e "Count:${i}\t$(/usr/local/bin/python /app/meow.py)" | socat - UDP4-DATAGRAM:255.255.255.255:$PORT_UDP_BROADCAST,so-broadcast
    let i++
    sleep $TIME_INTERVAL_MSG
done
