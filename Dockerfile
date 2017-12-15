FROM ubuntu:16.04

MAINTAINER Ronnie Beltran <rbbeltran.09@gmail.com>

RUN apt-get update -y

RUN DEBIAN_FRONTEND=noninteractive apt-get install vim-tiny tree curl wget unzip htop -y

RUN DEBIAN_FRONTEND=noninteractive apt-get install apache2 -y

RUN DEBIAN_FRONTEND=noninteractive apt-get install php libapache2-mod-php php-mcrypt php-curl -y

RUN a2enmod rewrite

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

RUN sed "s/DirectoryIndex index.html index.cgi index.pl index.php index.xhtml index.htm/DirectoryIndex index.php index.html index.cgi index.pl index.xhtml index.htm/" /etc/apache2/mods-enabled/dir.conf

COPY ./www/ /var/www/html/

EXPOSE 80

CMD /usr/sbin/apache2ctl -D FOREGROUND
