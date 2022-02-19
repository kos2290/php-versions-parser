# PHP Versions Parser
Detects the latest stable version of the PHP

## Requirements
* PHP >= 7.4
* "libxml" php extension
* "dom" php extension

## Installation
```bash
$ composer require konstantin-dmitrienko/php-versions-parser
```

## Usage
```PHP
$parser = new PHPVersionsParser();

// Current stable PHP version is: 8.1.3
echo "Current stable PHP version is: " . $parser->getCurrentStableVersion();
```

## License
[The MIT License (MIT)](LICENSE)
