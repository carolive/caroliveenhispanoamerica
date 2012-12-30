#!/bin/bash

#Pull all new changes from github repository caroliveenhispanoamerica
git pull


read -p "Voulez vous préparer le fichier de déploiement pour la prod (y/n)?" doSQL
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
	echo "Fichier sql le plus récent (utilisé pour créé le nouveau) : $workingFile"
	
	#Generates the new file name
	resultFile=$(basename ${workingFile} .sql)-prod.sql
	echo "Le fichier généré sera enregistré ici : prod/${resultFile}"
	
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
		
	#Writes production file from local one into the created file 'XXX-prod.sql'
	sed -E 's/localhost|127.0.0.1/www.carolive-en-hispanoamerica.com/g' ${workingFile}> prod/${resultFile}
	echo "Toutes les occurences de localhost ou 127.0.0.1 ont été remplacées par www.carolive-en-hispanoamerica.com dans ${resultFile}"
    cd ..
fi

if [ "$(ls -A sql/update)" ]
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

# Prepare wp-config.php for production server
cp wp-config-prod.php carolive-hispanoamerica/wp-config.php

# Remote ftp server
FTPS="ftp.carolive-en-hispanoamerica.com"
# Remote ftp server directory for $FTPU & $FTPP
FTPF="/www"
#read -p "Enter ftp username : " FTPU
#read -s -p "Enter ftp password : " FTPP
# Local directory contents
LOCALD="carolive-hispanoamerica/*"

echo -e "\n"
ncftpput -m -u $FTPU -p $FTPP $FTPS  $FTPF $LOCALD

# Reconfigure local parameters with local wp-config file
cp wp-config-olivier.php carolive-hispanoamerica/wp-config.php
