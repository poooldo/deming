#/usr/bin/env bash

set -e 

command -v docker-compose >/dev/null
if [ "$(echo $?)" != "0" ]; then
   curl -SL https://github.com/docker/compose/releases/download/v2.20.2/docker-compose-linux-x86_64 -o /tmp/docker-compose
   chmod +x /tmp/docker-compose && sudo cp /usr/local/bin/docker-compose
fi

docker-compose config > docker-compose.configured.yml

docker-compose -f docker-compose.configured.yml up -d 
