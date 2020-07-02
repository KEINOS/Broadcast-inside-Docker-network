# Sample Container To Send The Broadcast UDP Message (PHP7)

## File Description

- Broadcaster: `sender.php` (Entrypoint script. Sends the broadcast message)

## What It Does

In this sample container:

1. Creates the socket of UDP broadcast message port.
2. Loops the below
    - Sends a broadcast message.
    - Waits (sleeps) for a seconds set in the [ENV_FILE](../../ENV_FILE).

## Requirements

The `sockets` PHP extension module is needed to send and receive the messages. This extension is a proxy that connects a socket to others. In this case the UDP port to a variable.

This extension will be installed in the [Dockerfile](./Dockerfile).
