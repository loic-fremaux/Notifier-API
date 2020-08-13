FROM phpdockerio/php74-fpm:latest
WORKDIR "/application"

# Install selected extensions and other stuff
RUN apt-get update \
  && apt-get -y --no-install-recommends install  php7.4-mysql php-xdebug libmcrypt-dev \
  && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*
