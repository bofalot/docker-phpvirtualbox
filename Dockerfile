FROM alpine:3.19.1
MAINTAINER Matthew Cornford <matthew.cornford@gmail.com>

RUN apk update && apk add --no-cache bash nginx php81-fpm php81-cli php81-common php81-json php81-soap php81-simplexml php81-session \
    && apk --no-cache --update add --virtual build-dependencies wget unzip \
    && wget --no-check-certificate https://github.com/BartekSz95/phpvirtualbox/archive/main.zip -O phpvirtualbox.zip \
    && unzip phpvirtualbox.zip -d phpvirtualbox \
    && mkdir -p /var/www \
    && mv -v phpvirtualbox/*/* /var/www/ \
    && rm phpvirtualbox.zip \
    && rm phpvirtualbox/ -R \
    && apk del build-dependencies \
    && echo "<?php return array(); ?>" > /var/www/config-servers.php \
    && echo "<?php return array(); ?>" > /var/www/config-override.php \
    && chown nobody:nobody -R /var/www
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# config files
COPY config.php /var/www/config.php
COPY nginx.conf /etc/nginx/nginx.conf

# expose only nginx HTTP port
EXPOSE 80

# write linked instances to config, then monitor all services
CMD php-fpm81 && nginx
