# video_converter

Upload your video and converted for use.

Work example
[https://demo.sergeykozlov.ru/video_converter/](https://demo.sergeykozlov.ru/video_converter/)

![Снимок экрана от 2023-05-22 09-41-58](https://github.com/SergeyKozlov/video_converter/assets/1781376/b4f5da39-f9a3-4723-95c3-636f65d6ef42)


A full-featured video file conversion service. Created on the basis of the own development of video hosting Vide.me.

The following technologies are used:

### PHP 8
Maintenance of APIs, applications and web page generation.

### Nginx
Web service.

### PostgreSQL
Storing the List of Media Files and the Task Queue.

### Redis
Storage of temporary user tickets.


## Run in Docker

git clone https://github.com/SergeyKozlov/video_converter.git

cd video_converter

docker-compose up -d

### To update existing images with docker-compose
docker-compose up --force-recreate --build -d
docker image prune -f

### Follow log output

docker-compose logs -f

### To rebuild docker container in docker-compose.yml

docker-compose up --build --force-recreate --no-deps -d app
