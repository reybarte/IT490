#!/bin/bash
# Check if running as root
#$1 is user of local machine
if [ "$(id -u)" != "0" ]; then  
echo "This script must be run as root" 1>&2  
exit 1  
fi 
#Update refs
sudo apt update -y

#Upgrade packages
sudo apt upgrade -y

#install php modules
sudo apt install php7.4 -y
sudo apt install php7.4-mysql -y

#install composer
sudo apt install composer -y

#install mysql
sudo apt install mysql-server -y
sudo service mysql start

sudo mkdir repo
sudo chown $1 repo
sudo mkdir backups
sudo chown $1 backups

#create database inside db server mysql and allows access to root
echo "CREATE DATABASE composer; ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'root';" | sudo mysql
