#!/bin/bash
#File must be in backups folder
#$1 is backup directory or file to revert to have to be in the form of "backups/(file/directory)
#$2 is user of local machine
pathFile=$(echo $1 | sed 's/|.*//' | sed 's/-/\//g')
echo "path+file $pathFile"
if [[ $pathFile == *"/"* ]]
    then
    path=$(echo $pathFile | sed 's/\/[^\/]*$//')
else
    #file located in /home/user/repo
    path=""
fi

echo "path $path"

rm -rf "/home/$2/repo/$pathFile"
if [ -d "$1" ]
    then
    mkdir "/home/$2/repo/$pathFile"
    cp -rf "/home/$2/backups/$1/." "/home/$2/repo/$pathFile"
else
    cp -rf "/home/$2/backups/$1" "/home/$2/repo/$pathFile"
fi

