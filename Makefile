COMPOSER_CMD := composer
PHPUNIT_CMD := vendor/bin/phpunit
PHPBENCH_CMD := build/phpbench.phar

all: test

build:
	mkdir -p build

build/phpbench.phar: build/phpbench.phar.pubkey
	curl -o build/phpbench.phar https://phpbench.github.io/phpbench/phpbench.phar
	chmod +x build/phpbench.phar

build/phpbench.phar.pubkey: build
	curl -o build/phpbench.phar.pubkey https://phpbench.github.io/phpbench/phpbench.phar.pubkey

clean:
	rm -rf build

test: vendor
	$(PHPUNIT_CMD)

bench: build/phpbench.phar vendor
	$(PHPBENCH_CMD) run --report=default --revs 1000

vendor:
	$(COMPOSER_CMD) install

.PHONY: all bench test vendor
