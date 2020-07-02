# Sample Container To Receive The Broadcast UDP Messages (Python3)

## File Description

- Listener: `receiver.sh` (Entrypoint script. Receives the broadcasted message)
- Logic: `parrotry.py` (Processes the received message)

## What It Does

In this sample container:

1. We receive the broadcast messages via `socat` command. in the shell script "receiver.sh".
2. The "receiver.sh" script pipes the received message to the Python3 script "parrotry.py".
3. The "parrotry.py" script just echoes the message from STDIN.

## Requirements

The `socat` command is needed to send and receive the messages. This command is a proxy that connects a socket to others. In this case the UDP port to STDOUT.

This command will be installed in the [Dockerfile](./Dockerfile).
