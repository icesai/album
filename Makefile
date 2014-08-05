#!/usr/bin/make -f

all: update pux
	test -d tmp || mkdir tmp
	test -d img || mkdir img
	chmod 777 tmp img

sql:
	echo '<?php define("BASE_DIR", __DIR__);require("vendor/autoload.php");(new Fruit\Config(__DIR__))->getDb()->exec(file_get_contents("test/sql/structure.sql"));' | php

check:
	find src -name '*.php' -exec php -l {} \;
	find src -name '*.php' -exec phpcs --standard=PSR2 {} \;

composer.phar:
	curl -sS https://getcomposer.org/installer | php

update: composer.phar
	./composer.phar install

update-dep: composer.phar
	./composer.phar selfupdate
	./composer.phar update

pux:
	vendor/corneltek/pux/pux compile -o route/compiled.php route/mux.php

.PHONY: test update-dep check update all