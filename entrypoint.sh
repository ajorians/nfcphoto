#!/bin/bash

echo "doing replacements"
sed -i "s/localhost/${DATABASE_HOST}/g" /var/www/html/index.php
sed -i "s/nfcphotouser/${DATABASE_USER}/g" /var/www/html/index.php
sed -i "s/nfcphotopassword/${DATABASE_PASSWD}/g" /var/www/html/index.php
sed -i "s/nfcphotodb/${DATABASE_DB}/g" /var/www/html/index.php
#exec "$@"
echo "Starting PHP"
#docker-php-entrypoint $@
exec apache2-foreground
