#!/bin/sh
#$1 = key name of target machine
#$2 = key name of local machine
#$3 = file/directory name
#$4 = user of target machine
#$5 = ip of target machine
#$6 = user of local machine
#$7 = ip of local machine
#$8 = location of file relative to /home/($3)
#create the backup
#if location to be placed is empty do nothing
if [ -z $8 ]
    then
    loc=""
#if location to be placed is /, make it blank
elif [ $8 = "/" ]
    then
    loc=""
    echo "/"
#if path is given
elif [ ${#8} -gt 1 ]
    then
        lastChar=$(echo "$8" | tail -c 2)
        echo "lastChar"
        if ! [ $lastChar = "/" ]
            then
            loc="${8}/"
        fi
else
    loc=$8
fi
echo "loc=$loc"
wildcard=$(echo "$3" | grep "*")

if [ $wildcard ]
    then
    echo "copy wildcard"
    dateOfBackup=$(date "+%m-%d-%Y +%H:%M:%S")
    backUpLoc=$(echo $loc | sed 's/\//-/')
    for file in $(ls /home/$6/repo/$loc$3)
        do
                filename=$(basename $file)
                echo $filename
                cp -rf "/home/$6/repo/$loc$filename" "/home/$6/backups/$backUpLoc$filename|$dateOfBackup"
		chmown $6 "/home/$6/backups/$backUpLoc$filename|$dateOfBackup"
	done
elif [ -e "/home/$6/repo/$loc$3" ];
    then
    echo "copy single"
    dateOfBackup=$(date "+%m-%d-%Y +%H:%M:%S")
    backUpLoc=$(echo $loc | sed 's/\//-/')
    echo "backup $backUpLoc"
    cp -rf /home/$6/repo/$loc$3 "/home/$6/backups/$backUpLoc$3|$dateOfBackup"
    chown $6 "/home/$6/backups/$backUpLoc$3|$dateOfBackup"
fi

#remove old files
for file in $(ls /home/$6/repo/$loc$3)
        do
                filename=$(basename $file)
                echo $filename
                if ! [ -f /home/$6/repo/$loc$filename ]
                        then
                            echo "remove"

                            sudo rm -rf /home/$6/repo/$loc$filename
                fi
done
#ssh into target machine (eg. qa->dev ) and send over copy of new file/directory
echo "/home/$4/repo/$loc$3"
echo "scp -i /home/$4/$2 -r /home/$4/repo/$loc$3 $6@$7:/home/$6/repo/$loc" | ssh -i $1 $4@$5
echo "exit"
