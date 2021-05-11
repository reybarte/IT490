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
#install php modules
sudo apt install php7.4 -y
#install php-curl for api calls
sudo apt install php-curl -y

sudo apt install composer -y

sudo mkdir repo
sudo chown $1 repo
sudo mkdir backups
sudo chown $1 backups

