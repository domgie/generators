# Requirements
- PHP  8.2
- Composer
# Run the project
```
composer install
```
```
php index.php
```

# Run tests
```
./vendor/bin/phpunit --testdox --color tests/
```

# Run PHPStan
```
./vendor/bin/phpstan analyze src/ --level 9
```

# Run PHP Code Sniffer
```
./vendor/bin/phpcs src/
```
