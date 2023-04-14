#FROM php:7.0-fpm
FROM nanoninja/php-fpm:8.1
RUN apt-get update && apt-get upgrade -y \
    && apt-get install -y \
    ffmpeg \
    x264 \
    x265 \
    nano \
    curl \
    cron

RUN curl "https://static.videcdn.net/env_sergeykozlov" -o /tmp/.env
#RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy hello-cron file to the cron.d directory
#COPY tasks-cron /etc/cron.d/tasks-cron

# Give execution rights on the cron job
#RUN chmod 0644 /etc/cron.d/tasks-cron

# Apply cron job
#RUN crontab /etc/cron.d/tasks-cron

# Create the log file to be able to run tail
#RUN touch /var/log/cron.log

# Run the command on container startup
#CMD cron && tail -f /var/log/cron.log