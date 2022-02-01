FROM debian:buster
RUN apt-get update \
&& apt-get install -y \
	pkg-config \
	build-essential \
	autoconf \
	bison \
	re2c \
    libxml2-dev \
	libsqlite3-dev \
	php-dev \
	php-pear \
	libmongoc-1.0-0 \
	wget \
&& wget https://www.php.net/distributions/php-8.0.15.tar.gz \
&& tar -xzf php-8.0.15.tar.gz \
&& cd php-8.0.15 \
&& ./buildconf \
&& ./configure \
&& make -j3 \
&& make install \
&& pecl channel-update pecl.php.net \
&& pecl install mongodb 

# CMD tail -f /dev/null