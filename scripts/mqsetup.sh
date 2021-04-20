#!/bin/bash

#Check if running as root
if [ "$(id -u)" != "0" ]; then  
echo "This script must be run as root" 1>&2  
exit 1  
fi 

#Update refs
sudo apt update -y
#Upgrade packages
sudo apt upgrade -y

#Install rabbitmq-server
sudo apt install rabbitmq-server -y
#Create new user for MQ
sudo rabbitmqctl add_user admin admin
#Set user tags
sudo rabbitmqctl set_user_tags admin administrator
#Set user permissions
sudo rabbitmqctl set_permissions admin “.*” “.*” “.*”
#Enable MQ management plugin
sudo rabbitmq-plugins enable rabbitmq_management
