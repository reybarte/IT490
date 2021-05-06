#!/bin/sh
#$1 = key name of target machine
#$2 = key name of local machine
#$3 = file/directory name
#$4 = user of target machine
#$5 = ip of target machine
#$6 = ip of local machine
#$7 = location of file relative to /home/($3)
#create the backup
#if $5 is empty do nothing
if [ -z $7 ]
    then
    loc=""
    :
#if $5 is /, make it blank
elif [ $7 = "/" ]
    then
    loc=""
    echo "/"
#if path is
elif [ ${#7} -gt 1 ]
    then
        lastChar=$(echo "$7" | tail -c 2)
        echo "lastChar"
        if ! [ $lastChar = "/" ]
            then
            loc="${7}/"
        fi
else
    loc=$7;
fi
echo "loc=$loc"
firstChar=$(echo "$3" | cut -c1-1)
if [ $firstChar = "*" ]
    then
    echo "copy wildcard"
    for file in $(ls -l /home/$4/repo/$loc$3)
        do
            cp -rf /home/$4/repo/$loc$3 /home/$4/backups/$3
        done
elif [ -e "/home/$4/repo/$loc$3" ];
    then
    echo "copy single"
    dateOfBackup=$(date "+%m-%d-%Y +%H:%M:%S")
    backUpLoc=$(echo $loc | sed 's/\//-/')
    echo "backup $backUpLoc"
    cp -rf /home/$4/repo/$loc$3 "/home/$4/backups/$backUpLoc$3|$dateOfBackup"
fi

#remove old files
if ! [ -f $3 ]
    then
    echo "remove"
    sudo rm -rf /home/$4/repo/$loc$3
fi
#ssh into target machine (eg. qa->dev ) and send over copy of new file/directory
echo "/home/$4/repo/$loc$3"
echo "scp -i /home/$4/$2 -r /home/$4/repo/$loc$3 $4@$6:/home/$4/repo/$loc" | ssh -i $1 $4@$5
echo "exit"
