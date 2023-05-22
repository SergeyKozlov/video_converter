# Video converter

A full-featured video file conversion service. Created on the basis of the own development of video hosting [Vide.me](https://vide.me).
The result of the application's work is the converted adaptive video of the HLS format.

Work example
[https://demo.sergeykozlov.ru/video_converter/](https://demo.sergeykozlov.ru/video_converter/)
![Снимок экрана от 2023-05-22 09-41-58-2](https://github.com/SergeyKozlov/video_converter/assets/1781376/ffbe1243-2e65-48c6-8f18-1b3154c2b9a3)


Video adapts for use on any device.
Additionally, posters and thumbnailы are created.

The following technologies are used:

### PHP 8
Maintenance of APIs, applications and web page generation.

### FFMpeg
Responsive video conversion

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

## Used frameworks

### datacraft (Sergey Kozlov)
https://github.com/SergeyKozlov/datacraft

### FFmpegConversion (Sergey Kozlov)
https://github.com/SergeyKozlov/FFmpegConversion
