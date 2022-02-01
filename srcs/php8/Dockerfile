FROM debian:buster
RUN apt-get update \
&& apt-get install -y \
	wget \
&& wget https://www.php.net/distributions/php-8.0.15.tar.gz \
&& tar -xzf php-8.0.15.tar.gz \
&& apt-get install -y \
	pkg-config \
	build-essential \
	autoconf \
	bison \
	re2c \
    libxml2-dev \
	libsqlite3-dev \
	libmongoc-1.0-0 \
&& cd php-8.0.15 \
&& ./buildconf \
&& ./configure \
&& make -j3 \
&& make install \
&& cd .. \
&& wget https://pecl.php.net/get/mongodb-1.12.0.tgz \
&& tar -xzf mongodb-1.12.0.tgz \
&& cd mongodb-1.12.0 \
&& phpize \
&& ./configure \
&& make all \
&& make install

# && apt-get install -y \
# 	php-pear \
# && pecl channel-update pecl.php.net \
# && pecl install mongodb 
