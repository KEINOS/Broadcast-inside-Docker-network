#!/bin/sh
# =============================================================================
#  This script receives the broadcast message via "socat" command and pipes the
#  STDOUT output to the Python3 script.
# =============================================================================
socat -u UDP-LISTEN:$PORT_UDP_BROADCAST,fork STDOUT |
  while read line; do
      echo $line | /usr/local/bin/python /app/parrotry.py
  done
