#!/bin/bash

docker run -d \
    -p 9090:80 \
    --name=ganglia \
    --privileged=true \
    -v /home/mohsen/docker/ganglia/ganglia_conf:/etc/ganglia \
    -v /home/mohsen/docker/ganglia/ganglia_data:/var/lib/ganglia \
    -v /home/mohsen/docker/ganglia/logs:/var/log/supervisor \
    -v /etc/localtime:/etc/localtime:ro \
    ganglia:1.0
