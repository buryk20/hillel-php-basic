FROM nginx:1.24-alpine

COPY ./config/nginx.conf /etc/nginx/nginx.conf
COPY ./config/servers.d /etc/nginx/servers.d
COPY ./config/conf.d /etc/nginx/conf.d

RUN set -x ; \
    addgroup -g 1000 -S www-data ; \
    adduser -u 1000 -D -S -G www-data www-data && exit 0 ; exit 1

CMD ["nginx", "-g", "daemon off;"]
