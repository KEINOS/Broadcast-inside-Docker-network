# Sample Container To Receive The Broadcast UDP Message (PHP8-alpha)

## File Description

- Listener: `receiver.php` (Entrypoint script. Receives and processes the broadcasted message)

## What It Does

In this sample container:

1. Creates the socket of UDP broadcast message port and starts to listen the messages.
2. If we receive the broadcast message then it just echoes the message.

## Requirements

The `sockets` PHP extension module is needed to send and receive the messages. This extension is a proxy that connects a socket to others. In this case the UDP port to a variable.

This extension is already installed in the base-image of Dockerfile. To install see the [other Dockerfile such as PHP7](../php7/Dockerfile).
