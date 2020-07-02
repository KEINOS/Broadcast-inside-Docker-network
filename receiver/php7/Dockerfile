FROM php:7-cli-alpine

USER root

RUN \
    # Install the "sockets" PHP extension module since the base image doesn't
    # include this extension.
    docker-php-ext-install sockets
