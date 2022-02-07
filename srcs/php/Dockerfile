FROM debian:buster
RUN apt-get update \
&& apt-get install -y \
	--no-install-recommends \
	wget \
	pkg-config \
	build-essential \
	autoconf \
	bison \
	re2c \
    libxml2-dev \
	libsqlite3-dev \
	libmongoc-1.0-0 \
	libssl-dev \
	git \
	ca-certificates \
&& wget https://www.php.net/distributions/php-8.0.15.tar.gz \
&& tar -xzf php-8.0.15.tar.gz \
&& cd php-8.0.15 \
&& ./buildconf \
&& ./configure \
	--enable-debug \
	--with-openssl \
	# --with-zlib \
&& make -j3 \
&& make install \
&& cp php.ini-development /usr/local/lib/php.ini \
&& echo "extension=mongodb.so" \
	>> /usr/local/lib/php.ini \
&& cd / \
&& wget https://pecl.php.net/get/mongodb-1.12.0.tgz \
&& tar -xzf mongodb-1.12.0.tgz \
&& cd mongodb-1.12.0 \
&& phpize \
&& ./configure \
&& make all \
&& make install \
&& wget https://getcomposer.org/download/2.2.5/composer.phar \
&& mv composer.phar /usr/local/bin/composer \
&& chmod +x /usr/local/bin/composer \
&& cd / \
&& composer require mongodb/mongodb \
&& apt-get clean \
&& apt-get autoremove -y \
&& rm -rf php-8.0.15.tar.gz mongodb-1.12.0.tgz
# && rm -rf /var/lib/{apt, dpkg, cache, log}/ \
CMD php -S 172.16.6.3:9000 -t /API
