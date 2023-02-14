rm -rf ~/docker/cw \
&& mkdir ~/docker/cw \
&& cp -TRv /mnt/c/Users/Isaac/Documents/Programming/6130COMPweek1/6130COMPCloud ~/docker/cw \
&& cd ~/docker/cw



sudo docker build . -t fronttest && \
sudo docker run -d -p 80:80 --name front_inst fronttest


docker container stop front_inst && \
docker container rm front_inst && \
docker image rm fronttest:latest