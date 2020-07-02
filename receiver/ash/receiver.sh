#!/bin/sh

socat -u UDP-LISTEN:$PORT_UDP_BROADCAST,fork STDOUT |
  while read line; do
      echo -e "Msg received: ${line}\t : ${MY_HOST}"
  done
