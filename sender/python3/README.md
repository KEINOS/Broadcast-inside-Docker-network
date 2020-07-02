# Sample Container To Send The Broadcast UDP Messages (Python3)

## File Description

- Generator: `meow.py` (Creates and echoes the broadcast message)
- Broadcaster: `sender.sh` (Entrypoint script. Calls the python3 script and broadcasts it's message)

## What It Does

In this sample container:

1. Loops the below
    - Calls the Python3 script and pipes it's STDOUT to `socat` command's STDIN.
    - The `socat` command broadcasts the STDIN to the socket.
    - Waits (sleeps) for a seconds set in the [ENV_FILE](../../ENV_FILE).

## Requirements

The `socat` command is needed to send and receive the messages. This command is a proxy that connects a socket to others. In this case the UDP port to STDOUT.

This command will be installed in the [Dockerfile](./Dockerfile).
