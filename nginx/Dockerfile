#FROM nginx:latest
FROM nginx:alpine
#COPY ./default.conf /etc/nginx/conf.d/default.conf
#COPY ./vide.me-location.conf /etc/nginx/conf.d/vide.me-location.conf
MAINTAINER hello@sergeykozlov.ru

#RUN echo "* * * * * /bin/bash /usr/src/app/scripts/somescript.sh" >> /var/spool/cron/crontabs/root
RUN echo "* * * * * curl http://localhost/system/log/scheduler.php >> /var/log/cron.log 2>&1" >> /var/spool/cron/crontabs/root

#RUN apt-get update && apt-get -y install cron

# Copy hello-cron file to the cron.d directory
#COPY hello-cron /etc/cron.d/hello-cron

# Give execution rights on the cron job
#RUN chmod 0644 /etc/cron.d/hello-cron

# Apply cron job
#RUN crontab /etc/cron.d/hello-cron

# Create the log file to be able to run tail
RUN touch /var/log/cron.log

# Run the command on container startup
#CMD cron && tail -f /var/log/cron.log

CMD crond