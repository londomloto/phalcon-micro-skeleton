all: run

run:
	php -S localhost:8000 -t public .htrouter.php

init:
	composer install --no-dev

init-dev:
	composer install

clean:
	rm -rf vendor cache/*

test:
	./vendor/bin/phpunit -c ./tests/phpunit.xml --coverage-html public/test

FROM = MyApp
TO   = MyApp
rename:
ifneq ($(FROM), $(TO))
	@if [ -e source/$(FROM) ]; then mv source/$(FROM) source/$(TO); fi
	@find . -name .git -prune -o -name Makefile -prune -o -type f -print | xargs sed -i 's/$(FROM)/$(TO)/g'
	@echo 'Project renamed `$(FROM)` to `$(TO)`.'
endif
