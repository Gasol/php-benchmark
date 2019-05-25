COMPOSER_CMD := composer
PHPUNIT_CMD := vendor/bin/phpunit
PHPBENCH_CMD := phpbench.phar

all: test

test: vendor
	$(PHPUNIT_CMD)

bench: vendor
	$(PHPBENCH_CMD) run --report=default --revs 1000

vendor:
	$(COMPOSER_CMD) install

.PHONY: all bench test vendor
