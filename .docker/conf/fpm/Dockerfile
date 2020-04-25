FROM phpdockerio/php73-fpm:latest
#Ubuntu 18.04 (Bionic Beaver)
WORKDIR "/appli"

# Extensions
RUN apt-get update && apt-get install -y composer zip

# Php ext
RUN apt-get install -y php-pear php-psr php-curl php-ds php-mbstring php-xml

# clean
RUN apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*