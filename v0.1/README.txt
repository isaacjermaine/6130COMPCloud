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