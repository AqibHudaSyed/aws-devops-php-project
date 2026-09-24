#!/bin/bash
TIMESTAMP=$(date +%Y%m%d_%H%M%S)
BACKUP_FILE="/home/ubuntu/backup_$TIMESTAMP.sql"

docker exec devops-project-mysql-1 mysqldump -u root -prootpassword123 devops_db > $BACKUP_FILE

aws s3 cp $BACKUP_FILE s3://aqib-devops-backups-2026/

rm $BACKUP_FILE

echo "Backup completed: $TIMESTAMP"
