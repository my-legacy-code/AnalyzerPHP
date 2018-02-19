<?

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
        echo implode("\n", $technologies);
        echo "\n";
    });

/* Wait for promise to finish */
$promise->wait();