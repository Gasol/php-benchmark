PHPUNIT_CMD := vendor/bin/phpunit

all: test

test:
	$(PHPUNIT_CMD)

.PHONY: test
