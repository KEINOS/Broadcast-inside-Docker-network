# Sample Container To Send The Broadcast UDP Message (Ash Shell)

## File Description

- Broadcaster: `sender.sh` (Entrypoint script. Sends the broadcast message)

## What It Does

In this sample container:

1. Creates the socket of UDP broadcast message port.
2. Loops the below
    - Sends a broadcast message.
    - Waits (sleeps) for a seconds set in the [ENV_FILE](../../ENV_FILE).

## Requirements

The `socat` command is needed to send and receive the messages. This command is a proxy that connects a socket to others. In this case the UDP port to STDOUT.

This command will be installed in the [Dockerfile](./Dockerfile).
