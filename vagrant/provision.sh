#!/bin/bash

# Install Apache and PHP (and any needed extensions).
export DEBIAN_FRONTEND=noninteractive
sudo apt-get install -y git curl apache2 php5 php5-curl php5-mysql mysql-server

# Mount synced folder as apache
sudo mount -t vboxsf -o uid=`id -u www-data`,gid=`id -g www-data` /var/www/txtmindus /var/www/txtmindus

# Make sure the timezone is set in php.ini.
sudo sed -i".bak" "s/^\;date\.timezone.*$/date\.timezone = \"America\\/New_York\" /g" /etc/php5/apache2/php.ini
sudo sed -i".bak" "s/^\;date\.timezone.*$/date\.timezone = \"America\\/New_York\" /g" /etc/php5/cli/php.ini

# Copy the conf file to where Apache will find it.
sudo cp /vagrant/txtmindus-vhost.conf /etc/apache2/sites-available/
sudo a2ensite txtmindus-vhost.conf

# Enable mod_rewrite
sudo a2enmod rewrite

# Restart Apache.
sudo service apache2 restart

# Restart MySQL
sudo service mysql restart

# Create the necessary tables/users for MySQL.
/vagrant/createdb.sh txtmindus txtmindus txtmindus
/vagrant/createdb.sh txtmindus_test txtmindus_test txtmindus_test