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
#COPY tasks-cron /etc/cron.d/crontab
COPY tasks-cron /etc/cron.d/tasks-cron

# Give execution rights on the cron job
RUN chmod 0644 /etc/cron.d/tasks-cron

RUN echo "* * * * * curl nginx/system/log/scheduler.php >> /var/log/cron.log 2>&1" >> /etc/crontab

# Apply cron job
RUN crontab /etc/cron.d/tasks-cron
#RUN echo "* * * * * root php /var/www/artisan schedule:run >> /var/log/cron.log 2>&1" >> /etc/crontab
# Create the log file to be able to run tail
RUN touch /var/log/cron.log

#EXPOSE 9000

##CMD bash -c "cron && php-fpm"

# Run the command on container startup
#CMD cron && tail -f /var/log/cron.log

# Add the cron job
#-- RUN echo '* * * * * echo "Hello world" >> /var/log/cron.log 2>&1' >> /etc/crontabs/root

# Run crond  -f for Foreground
#-CMD ["/usr/sbin/crond", "-f"]
