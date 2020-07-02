# Sample Containers To Send The Broadcast UDP Messages

These are the Docker containers to send the UDP broadcast messages in the same Docker network.

Boot them up with `docker-compose`.

```text
.
├── README.md      // This file
├── ash            // Sender/broadcaster sample in Ash shell
│   ├── README.md
│   ├── Dockerfile
│   └── sender.sh
├── php7           // Sender/broadcaster sample in PHP7
│   ├── README.md
│   ├── Dockerfile
│   └── sender.php
├── php8           // Sender/broadcaster sample in PHP8-alpha
│   ├── README.md
│   ├── Dockerfile
│   └── sender.php
└── python3        // Sender/broadcaster sample in Python3 via socat command
    ├── README.md
    ├── Dockerfile
    ├── meow.py
    └── sender.sh

4 directories, 14 files
```
