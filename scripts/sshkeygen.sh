#!/bin/bash
#$1 = name of file
#$2 = username of remote server account
#$3 = ip address of remote server
#$4 = type of server target is
#create key with $1 as name of key and empty passphrase
ssh-keygen -t rsa -f $1 -N ""
#send public key over to user $2 and ip address $3
ssh-copy-id -i $1.pub $2@$3
sudo chmod 400 $1 $1.pub
case $4 in
    app)
        #send over app related files
        echo app
		scp -i $1 appsetup.sh $2@$3:/home/$2
		scp -i $1 migration.sh $2@$3:/home/$2
		scp -i $1 revert.sh $2@$3:/home/$2
		scp -i $1 sshkeygen.sh $2@$3:/home/$2	
	;;
    mq)
        #send over mq related files
        echo mq
		scp -i $1 mqsetup.sh $2@$3:/home/$2
	;;
    api)
        #send over api related files
        echo api
		scp -i $1 apisetup.sh $2@$3:/home/$2
		scp -i $1 migration.sh $2@$3:/home/$2
		scp -i $1 revert.sh $2@$3:/home/$2
        	scp -i $1 sshkeygen.sh $2@$3:/home/$2	
        ;;
    db)
        #send over db related files
        echo db
		scp -i $1 dbsetup.sh $2@$3:/home/$2
		scp -i $1 migration.sh $2@$3:/home/$2
		scp -i $1 revert.sh $2@$3:/home/$2
        	scp -i $1 sshkeygen.sh $2@$3:/home/$2	
        ;;
esac
