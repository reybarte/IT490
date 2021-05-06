#!/bin/bash
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
#install php modules
sudo apt install php7.4 -y
sudo apt install composer -y

sudo mkdir repo
sudo rm /var/www/html/index.html
sudo ln -s repo /var/www/html/repo
sduo chmod 777 /var/www/html -R
#manually edit /etc/apache2/sites-available/000-default.conf
#DocumentRoot /var/www/html/repo/app
