PHPUNIT_CMD := vendor/bin/phpunit
PHPBENCH_CMD := phpbench.phar

all: test

test:
	$(PHPUNIT_CMD)

bench:
	$(PHPBENCH_CMD) run --report=default --revs 1000

.PHONY: all bench test
