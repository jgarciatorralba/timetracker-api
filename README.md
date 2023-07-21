run tests: ./vendor/bin/phpunit
run php container terminal: docker-compose exec php /bin/bash

CodeSniffer:
run analysis: php ./vendor/bin/phpcs <filename|foldername>
correct coding standard violations: php ./vendor/bin/phpcbf <filename|foldername>

PHPStan:
run analysis: vendor/bin/phpstan analyse <foldernames>