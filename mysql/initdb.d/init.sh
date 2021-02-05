#! /bin/bash
mysql -u $MYSQL_ROOT_USER -p$MYSQL_ROOT_PASSWORD -e "DROP DATABASE IF EXISTS $MYSQL_DATABASE; CREATE DATABASE $MYSQL_DATABASE CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci"
mysql -u $MYSQL_ROOT_USER -p$MYSQL_ROOT_PASSWORD -e "CREATE USER $MYSQL_USER; GRANT ALL PRIVILEGES ON $MYSQL_DATABASE.* TO $MYSQL_USER"
cat init.sql | mysql -u $MYSQL_USER $MYSQL_DATABASE
