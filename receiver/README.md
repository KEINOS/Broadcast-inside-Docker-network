# Sample Containers To Receive The Broadcast UDP Messages

These are the Docker containers to receive the UDP broadcast messages in the same Docker network.

Boot them up with `docker-compose`.

```text
.
├── README.md      // This file
├── ash            // Receiver/listener sample in Ash shell
│   ├── README.md
│   ├── Dockerfile
│   └── receiver.sh
├── php7           // Receiver/listener sample in PHP7
│   ├── README.md
│   ├── Dockerfile
│   └── receiver.php
├── php8           // Receiver/listener sample in PHP8-alpha
│   ├── README.md
│   ├── Dockerfile
│   └── receiver.php
└── python3        // Receiver/listener sample in Python3 via socat command
    ├── README.md
    ├── Dockerfile
    ├── parrotry.py
    └── receiver.sh

4 directories, 14 files
```
