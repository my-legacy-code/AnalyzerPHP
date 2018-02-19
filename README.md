# Technology Analyzer Library for PHP

## Prerequisites
- PHP 7.1.7
- Composer

## Installation
To install the application, please navigate to project directory and run:
```bash
composer install
```

If you are including `AnalyzerService` as a part of your app, please copy the content of `composer.json` and paste it into the overall `composer.json` file.
Please don't forget copying everything inside `src` into the root directory of your app as well. 

## Running
To get the list of technologies used by `salesforce.com`, navigate to `src` directory and run:
```
php example.php https://analyzer-api-stackrapp.herokuapp.com http://www.wpi.edu
```

Here is the corresponding output
```bash
[Technology name=Adobe Experience Manager version= icon=Adobe Experience Manager.svg website=http://www.adobe.com/au/marketing-cloud/enterprise-content-management.html]
[Technology name=Apache version= icon=Apache.svg website=http://apache.org]
[Technology name=Lo-dash version= icon=Lo-dash.png website=http://www.lodash.com]
[Technology name=Segment version= icon=Segment.png website=http://segment.com]
[Technology name=jQuery version= icon=jQuery.svg website=https://jquery.com]
[Technology name=Java version= icon=Java.png website=http://java.com]
```

## Usage

Here is an example using AnalyzerService

```php
require_once '../vendor/autoload.php';
require_once 'Analyzer/Services/AnalyzerService.php';

use Stackr\Analyzer\Service\AnalyzerService;

/* Get base url and app url from command line */
$baseURL = $argv[1];
$appURL = $argv[2];

$analyzerService = new AnalyzerService($baseURL);

$promise = $analyzerService->getTechnologies($appURL)
    ->then(function ($technologies){
        /* Do some thing here */
    });

/* Wait for promise to finish */
$promise->wait();
```

## Authors

- [Yang Liu](https://github.com/byliuyang) - **Initial works**

## License

This project is maintained under MIT license.