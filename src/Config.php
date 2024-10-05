<?php
namespace oldspice;
// class to get configuration data from .env file
use \Exception;
use Dotenv;
use oldspice\Path;

class Config {
    public $debug;

    public function __construct() {
        error_reporting(E_ALL & ~E_DEPRECATED);
        // get path to env file
        $path = Path::getEnvPath(__DIR__);
        $dotenv = Dotenv\Dotenv::createImmutable($path);
        $dotenv -> load();
        $this -> debug = $_ENV['DEBUG'];
        if( !$this -> debug ) {
            error_reporting(E_ALL ^ E_DEPRECATED);
        }
    }
}
?>