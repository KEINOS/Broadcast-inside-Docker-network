# Sample Container To Receive The Broadcast UDP Message (Ash Shell)

## File Description

- Listener: `receiver.sh` (Entrypoint script. Receives and processes the broadcasted message)

## What It Does

In this sample container:

1. Creates the socket of UDP broadcast message port and starts to listen the messages.
2. If we receive the broadcast message then it just echoes the message.

## Requirements

The `socat` command is needed to send and receive the messages. This command is a proxy that connects a socket to others. In this case the UDP port to STDOUT.

This command will be installed in the [Dockerfile](./Dockerfile).
