#!/usr/bin/env sh

docker stop mysql
docker rm mysql --volumes

docker run --name mysql \
    -e MYSQL_USER=user \
    -e MYSQL_PASSWORD=secret \
    -e MYSQL_DATABASE=testing \
    -e MYSQL_ROOT_PASSWORD=secret \
    -p 3306:3306 \
    -d mysql:8.0

until mysql --host 127.0.0.1 --port=3306 --user=user --password=secret --execute="SHOW DATABASES"; do
    sleep 1;
done
