FROM ubuntu:latest
MAINTAINER hello@sergeykozlov.ru

RUN apt-get update && apt-get -y install curl cron

# Copy tasks-cron file to the cron.d directory
COPY tasks-cron /etc/cron.d/tasks-cron

# Give execution rights on the cron job
RUN chmod 0644 /etc/cron.d/tasks-cron

# Apply cron job
RUN crontab /etc/cron.d/tasks-cron

# Create the log file to be able to run tail
RUN touch /var/log/cron.log

# Run the command on container startup
CMD cron && tail -f /var/log/cron.log