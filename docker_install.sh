#!/bin/bash

which docker && exit



	# DOCKER INSTALLATION
	# https://docs.docker.com/engine/install/debian/
apt-get update

apt-get install -y \
    curl \
    gnupg

curl -fsSL https://download.docker.com/linux/debian/gpg | sudo gpg --dearmor -o /usr/share/keyrings/docker-archive-keyring.gpg

echo \
  "deb [arch=$(dpkg --print-architecture) signed-by=/usr/share/keyrings/docker-archive-keyring.gpg] https://download.docker.com/linux/debian \
  $(lsb_release -cs) stable" | sudo tee /etc/apt/sources.list.d/docker.list > /dev/null

apt-get update

apt-get install docker-ce docker-ce-cli containerd.io

#	DOCKER-COMPOSE INST	
#	https://docs.docker.com/compose/cli-command/#install-on-linux
curl -SL https://github.com/docker/compose/releases/download/v2.2.2/docker-compose-linux-x86_64 \
	-o /usr/libexec/docker/cli-plugins/docker-compose

chmod +x /usr/libexec/docker/cli-plugins/docker-compose

cp -l /usr/libexec/docker/cli-plugins/docker-compose /bin/docker-compose

