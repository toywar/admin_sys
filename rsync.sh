#!/bin/bash
tar --gzip -c -f /var/www/admin_sys.tar.gz /var/www/
#rsync -avz /var/www/ romek@192.168.163.161:~/admin_sys/
rsync -avz /var/www/admin_sys.tar.gz romek@192.168.163.161:~/
