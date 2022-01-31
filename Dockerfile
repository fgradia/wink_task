FROM debian:buster
RUN apt-get update \
&&	apt-get install -y \
	--no-install-recommends \
	gnupg \
	ca-certificates \
	wget 
	# php8.0
&& wget -qO - https://www.mongodb.org/static/pgp/server-5.0.asc \
	| apt-key add - \
# RUN echo "deb http://repo.mongodb.org/apt/debian buster/mongodb-org/5.0 main" \
# 	| tee /etc/apt/sources.list.d/mongodb-org-5.0.list 
# RUN apt-get update \
# && apt-get install -y mongodb-org

CMD tail -f
