# Broadcasting And Receiving A UDP Message In The Docker Network

Sample of broadcasting UDP messages inside the Docker network and receiving them with:

- Ash shell, PHP7, PHP8-alpha and Python3.

## What You Need

- Docker
  - Tested version: v19.03.8
- docker-compose
  - Tested version: v1.25.5

## How To Run

**Build the containers and run** with `docker-compose`.

```shellsession
$ # Build/create containers
$ docker-compose build
...

$ # Starts the containers
$ docker-compose up
...
```

<details><summary>What you will see</summary><div><br>

After running the `docker-compose up`, as soon as the `sender` containers are `up` they will start broadcasting a message. Also the `receiver` containers will listen to the broadcasting message as soon as they are `up` and echoes the received message.

```shellsession
$ docker-compose up
Starting receiver-php8 ... done
Starting receiver-php7 ... done
Starting receiver-py3  ... done
Starting receiver-ash  ... done
Starting sender-py3    ... done
Starting sender-ash    ... done
Starting sender-php7   ... done
Starting sender-php8   ... done
Attaching to receiver-php8, receiver-php7, receiver-ash, receiver-py3, sender-php8, sender-py3, sender-php7, sender-ash
receiver-php7    | Msg received: Count:0        Broadcasting meow meow from sender-ash   : receiver-php7
receiver-php8    | Msg received: Count:0        Broadcasting meow meow from sender-ash   : receiver-php8
receiver-php8    | Msg received: Count:0        Broadcasting meow meow from sender-php7  : receiver-php8
receiver-php7    | Msg received: Count:0        Broadcasting meow meow from sender-php7  : receiver-php7
receiver-php8    | Msg received: Count:0        Broadcasting meow meow from sender-php8  : receiver-php8
receiver-ash     | Msg received: Count:0        Broadcasting meow meow from sender-ash   : receiver-ash
receiver-ash     | Msg received: Count:0        Broadcasting meow meow from sender-php7  : receiver-ash
receiver-ash     | Msg received: Count:0        Broadcasting meow meow from sender-php7  : receiver-ash
receiver-ash     | Msg received: Count:0        Broadcasting meow meow from sender-php8  : receiver-ash
receiver-php7    | Msg received: Count:0        Broadcasting meow meow from sender-php8  : receiver-php7
receiver-php7    | Msg received: Count:0        Broadcasting meow meow from sender-py3   : receiver-php7
receiver-php8    | Msg received: Count:0        Broadcasting meow meow from sender-py3   : receiver-php8
receiver-ash     | Msg received: Count:0        Broadcasting meow meow from sender-py3   : receiver-ash
receiver-php8    | Msg received: Count:1        Broadcasting meow meow from sender-php7  : receiver-php8
receiver-ash     | Msg received: Count:1        Broadcasting meow meow from sender-php7  : receiver-ash
receiver-php7    | Msg received: Count:1        Broadcasting meow meow from sender-php7  : receiver-php7
receiver-php7    | Msg received: Count:1        Broadcasting meow meow from sender-php8  : receiver-php7
receiver-ash     | Msg received: Count:1        Broadcasting meow meow from sender-php8  : receiver-ash
receiver-php8    | Msg received: Count:1        Broadcasting meow meow from sender-php8  : receiver-php8
receiver-php7    | Msg received: Count:1        Broadcasting meow meow from sender-ash   : receiver-php7
receiver-php8    | Msg received: Count:1        Broadcasting meow meow from sender-ash   : receiver-php8
receiver-ash     | Msg received: Count:1        Broadcasting meow meow from sender-ash   : receiver-ash
receiver-php7    | Msg received: Count:1        Broadcasting meow meow from sender-py3   : receiver-php7
receiver-ash     | Msg received: Count:1        Broadcasting meow meow from sender-py3   : receiver-ash
receiver-php8    | Msg received: Count:1        Broadcasting meow meow from sender-py3   : receiver-php8
...
```


</div></details>

## What It Does

There are 2 types of Docker containers; `sender` and `receiver`.

The `sender` container sends a message and the `receiver` container receives the message and echoes it. Simple as that.

To send and receive messages, both types of containers follows the same rules. Such as: Same TCP/IP protocol, data type, broadcast address and port.

### Container Types And Protocol

#### Sender Container

The `sender` container broadcasts a message to all the containers in the same Docker network.

- **Msg to echo     :** "`Broadcasting meow meow from [sender name]  [counter]`"
  - **`sender name`   :** Name of the sender container specified by `environment` directive in "docker-compose.yml" as `MY_HOST`.
- **Msg frequency   :** Every 3 seconds which is specified in "[ENV_FILE](./ENV_FILE)" file and given as a env variables to the container.
- Sample Alpine Linux containers for implementation:
  - [/sender/bash/](./sender/bash/)
  - [/sender/php7/](./sender/php7/)
  - [/sender/php8/](./sender/php8/)
  - [/sender/python3/](./sender/python3/)
  - See the `README.md` in each dir for the details

#### Receiver Container

The `receiver` container listens to the broadcast messages and echoes the received message.

- **Message to echo   :** "`[receiver name]  Msg received: [received msg]`"
  - **`receiver name`   :** Name of the sender container specified by `environment` directive in "docker-compose.yml" as `MY_HOST`.
- Sample Alpine Linux containers for implementation:
  - [/receiver/bash/](./receiver/bash/)
  - [/receiver/php7/](./receiver/php7/)
  - [/receiver/php8/](./receiver/php8/)
  - [/receiver/python3/](./receiver/python3/)
  - See the `README.md` in each dir for the details

#### Protocol (Common rules between containers)

Each container follows the below rules to send/receive the message.

- **TCP/IP Protocol Type:** `UDP`
- **Message Type :** [Datagram](https://en.wikipedia.org/wiki/Datagram)
- **Target Host  :** "255.255.255.255" which doesn't specify the target host thus works as broadcasting.
- **Target Port  :** 6666 which is specified in "[ENV_FILE](./ENV_FILE)" as well.
  - **Note** that sending data as `datagram` via `UDP` is fast and lightweight but doesn't ensure if the messages were sent correctly to each host.
