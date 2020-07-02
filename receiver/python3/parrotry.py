# =============================================================================
#  This script just echoes the message from STDIN which are piped from the
#  receiver shell script that receives the actual broadcasted message.
#  See the "./receiver.sh" script as well.
# =============================================================================
import os
import sys

name_host = os.environ['MY_HOST']

msg_received = ''
for line in sys.stdin:
    msg_received = msg_received+str(line)

msg_result = f"Msg received: {msg_received.strip()}\t : {name_host}"

print(msg_result, end='')
