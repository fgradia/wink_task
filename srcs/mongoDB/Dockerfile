FROM debian:buster
RUN apt-get update \
&&	apt-get install -y \
	# --no-install-recommends \
	gnupg \
	ca-certificates \
	wget \
	libcurl4 \
# && wget https://fastdl.mongodb.org/linux/mongodb-linux-x86_64-debian10-5.0.6.tgz \
# && tar -xzf mongodb-linux-x86_64-debian10-5.0.6.tgz \
# && cp -r /mongodb-linux-x86_64-debian10-5.0.6/bin/. /bin/ \
&& mkdir -p /data/db \
# && mongod --dbpath /data/db
&& wget -qO - https://www.mongodb.org/static/pgp/server-5.0.asc \
	| apt-key add - \
&& echo "deb http://repo.mongodb.org/apt/debian buster/mongodb-org/5.0 main" \
	| tee /etc/apt/sources.list.d/mongodb-org-5.0.list \
&& apt-get update \
&& apt-get install -y \
	mongodb-org



# CMD tail -f
# 