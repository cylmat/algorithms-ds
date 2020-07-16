FROM phpdockerio/php73-fpm:latest
#Ubuntu 18.04 (Bionic Beaver)
WORKDIR "/appli"

# Extensions
RUN apt-get update && apt-get install -y composer

# Php ext
RUN apt-get install -y php-psr php-ds php-mbstring

# clean
RUN apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*