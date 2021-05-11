#!/bin/bash
#$1 is user of local machine
# Check if running as root
if [ "$(id -u)" != "0" ]; then  
echo "This script must be run as root" 1>&2  
exit 1  
fi 
#Update refs
sudo apt update -y
#Upgrade packages
sudo apt upgrade -y
#install apache server
sudo apt install apache2 -y
sudo service apache2 start
#install php modules
sudo apt install php7.4 -y
sudo apt install composer -y

sudo mkdir repo
sudo chown $1 repo
sudo mkdir backups
sudo chown $1 backups
sudo rm /var/www/html/index.html
sudo ln -s /home/$1/repo /var/www/html/
sudo chmod 777 /var/www/html
#manually edit /etc/apache2/sites-available/000-default.conf
#DocumentRoot /var/www/html/repo/app
