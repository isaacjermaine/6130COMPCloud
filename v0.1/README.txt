# Instructions
Change directory to /v1.0/
Then run

docker-compose up --build

to build and start the containers. Once fully installed (can take a while), this should take just over 30 seconds to fully initialise.
Once initilised, connect to localhost:80 (127.0.0.1:80) in a browser to see the form page.
To stop the containers, ctrl-c the command line monitoring the containers, then use

docker-compose down

to stop and delete the containers. This will remove the database completely, so next time the
containers are run, everything will start fresh.

# Testing
## Get players
When loading the initial page, players should be collected from the back end, showing up in the dropdown box.

## Submit response
To test the code submission and voucher return, enter the following details:

Name: Cid
Email: cid@gmail.com
Address: 123 short road
Favourite player: Po Tato
Code: ABCDE12345

Upon clicking submit, the data should be checked, and the voucher code "VOUCH1" should be displayed on the new page.


# Miscellanious

//new

cd /mnt/c/Users/Isaac/Documents/Programming/6130COMPweek1/6130COMPCloud/v1.0/
docker-compose up --build

docker build ./back/ -t backtest && \
docker run -d -p 84:80 --name back_inst backtest

//old

rm -rf ~/docker/cw \
&& mkdir ~/docker/cw \
&& cp -TRv /mnt/c/Users/Isaac/Documents/Programming/6130COMPweek1/6130COMPCloud ~/docker/cw \
&& cd ~/docker/cw/v0.1



sudo docker build . -t fronttest && \
sudo docker run -d -p 80:80 --name front_inst fronttest


docker container stop front_inst && \
docker container rm front_inst && \
docker image rm fronttest:latest

// for restarting front and back

docker container stop front_inst && \
docker container rm front_inst && \
docker image rm fronttest:latest && \
docker container stop back_inst && \
docker container rm back_inst && \
docker image rm backtest:latest && \
docker build ./front/ -t fronttest && \
docker build ./back/ -t backtest && \
docker run -d -p 80:80 --name front_inst fronttest && \
docker run -d -p 84:80 --name back_inst backtest


// individual

docker container stop front_inst && \
docker container rm front_inst && \
docker image rm fronttest:latest && \
docker build ./front/ -t fronttest && \
docker run -d -p 80:80 --name front_inst fronttest

docker container stop back_inst && \
docker container rm back_inst && \
docker image rm backtest:latest && \
docker build ./back/ -t backtest && \
docker run -d -p 84:80 --name back_inst backtest

docker container stop v01-nginx_back-1 && \
docker container rm v01-nginx_back-1 && \
docker image rm v01-nginx_back:latest && \
docker build ./nginx_back/ -t v01-nginx_back && \
docker run -d -p 84:80 --name v01-nginx_back v01-nginx_back-1
