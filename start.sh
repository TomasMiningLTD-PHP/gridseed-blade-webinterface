#!/bin/bash
/var/www/bfgminer --scrypt -S gridseed:/dev/ttyACM$1 --set-device gridseed:clock=$2 --retries=2 -c /var/www/conf/active_miner_$3.conf

