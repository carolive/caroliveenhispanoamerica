#!/bin/bash

#Pull all new changes from github repository caroliveenhispanoamerica
git pull
echo "Updated project Carolive-en-hispanoamerica from repository github"

read -p "Do you want to prepare a sql file for deployment (y/n)?" doSQL
if [ $doSQL == "y" ]
then
	echo -e "\n"
	echo '**********************************************'
	echo '*********** PREPARING SQL FILE ***************'
	echo '**********************************************'
	echo -e "\n"

	#Get the last sql export file name
	cd sql
	workingFile="$(ls -rt *.sql | tail -1)"
	echo "Working file : $workingFile"
	
	#Generates the new file name
	resultFile=$(basename ${workingFile} .sql)-prod.sql
	echo "File will be created here : prod/${resultFile}"
	
	#Creates the new file if !exist
	cd prod
	if [ -e ${resultFile} ] 
	then
		echo "Le fichier ${resultFile} existe déjà dans le répertoire 'prod'"
	else	
		touch ${resultFile}
		echo "Le fichier ${resultFile} a été créé dans le répertoire 'prod'"
	fi
	cd ..
		
	#Writes production file from locl one into the created file 'XXX-prod.sql'
	sed -E 's/localhost|127.0.0.1/www.carolive-en-hispanoamerica.com/g' ${workingFile}> prod/${resultFile}
	echo "All occurences of localhost or 127.0.0.1 were changed to www.carolive-en-hispanoamerica.com in ${resultFile}"
fi

if [ "$(ls -A sql/update/)" ]
then
	echo "Répertoire sql/update n'est pas vide -> execution du script ..."
	
	cd sql/update
	sqlUpdateFile="$(ls -rt *.sql | tail -1)"
	read -p "Enter PHPMyAdmin username : " SQLU
	read -s -p "Enter PHPMyAdmin password : " SQLP
	sqlplus $SQLU/$SQLP@mysql51-69.perso.ovh.net/caroliveamlat @$sqlUpdateFile
fi

echo -e "\n"
echo '**********************************************'
echo '********** COPY FILES TO SERVER **************'
echo '**********************************************'
echo -e "\n"

#FTPS="ftp.carolive-en-hispanoamerica.com" # remote ftp server
#FTPF="/www/" # remote ftp server directory for $FTPU & $FTPP

#read -p "Enter ftp username : " FTPU
#read -s -p "Enter ftp password : " FTPP
echo ''
#read -p "Enter local directory to upload path [.] : " LOCALD

#ncftpput -m -u $FTPU -p $FTPP $FTPS  $FTPF $LOCALD
#echo "commandeFTP $FTPU $FTPP $FTPS  $FTPF $LOCALD"