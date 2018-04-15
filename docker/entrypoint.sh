#!/usr/bin/env bash

# Config /etc/php/7.2/mods-available/xdebug.ini
sed -i "s/xdebug\.remote_host\=.*/xdebug\.remote_host\=$XDEBUG_HOST/g" /etc/php/7.2/mods-available/xdebug.ini

# Run PHP-FPM as current user
if [ ! -z "$WWWUSER" ]; then
    sed -i "s/user\ \=.*/user\ \= $WWWUSER/g" /etc/php/7.2/fpm/pool.d/www.conf

    # Set UID of user "vessel"
    usermod -u $WWWUSER bitopi
fi

# Ensure /.composer exists and is writable
if [ ! -d /.composer ]; then
    mkdir /.composer
fi
chmod -R ugo+rw /.composer

# Run a command or supervisord
if [ $# -gt 0 ];then
    # If we passed a command, run it as current user
    exec gosu $WWWUSER "$@"
else
    # Otherwise start supervisord
    /usr/bin/supervisord
fi
