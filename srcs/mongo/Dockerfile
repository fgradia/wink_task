FROM debian:buster
RUN apt-get update \
&&	apt-get install -y \
	--no-install-recommends \
	gnupg \
	ca-certificates \
	wget \
	libcurl4 \
&& mkdir -p /data/db \
&& wget -qO - https://www.mongodb.org/static/pgp/server-5.0.asc \
	| apt-key add - \
&& echo "deb http://repo.mongodb.org/apt/debian buster/mongodb-org/5.0 main" \
	| tee /etc/apt/sources.list.d/mongodb-org-5.0.list \
&& apt-get update \
&& apt-get install -y \
	mongodb-org \
&& apt-get clean \
&& apt-get autoremove -y 
CMD mongod --bind_ip 172.16.6.2,127.0.0.1
