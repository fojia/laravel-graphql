#!/bin/bash
#Checking if exists docker
if ! command -v docker > /dev/null; then
    # Install docker 18.09.4
    # Update package index
    sudo apt-get update
    #Install packages to allow apt to user a repository over https
    sudo apt-get install  apt-transport-https  ca-certificates curl software-properties-common
    # Add Docker official gpg key
    curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -
    # Verify fingerpirng
    sudo apt-key fingerprint 0EBFCD88
    # Add stable repository for our ubuntu version
    sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable"
    # Update package index
    sudo apt-get update
    # Install docker ce/cli and containerd for our version
    sudo apt-get install docker-ce=5:18.09.4~3-0~ubuntu-$(lsb_release -cs)
    sudo apt-get install docker-ce-cli=5:18.09.4~3-0~ubuntu-$(lsb_release -cs)
    sudo apt-get install containerd.io
    #Post install add group and user
    sudo groupadd docker
    sudo usermod -aG docker $USER
    sudo systemctl enable docker
    sudo systemctl start docker
    echo "Docker installed succefully!"
    echo $(docker --version)
else
    echo "Docker installed - " $(docker --version)
fi

#Checking if exists docker-compose
if ! command -v docker-compose > /dev/null; then
    #Install docker-compose 1.24.0
   sudo curl -L "https://github.com/docker/compose/releases/download/1.24.0/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
   sudo chmod +x /usr/local/bin/docker-compose
   echo "Docker-compose installed succefully!"
   echo $(docker-compose --version)
else
    echo "Docker compose installed - " $(docker-compose --version)
fi
