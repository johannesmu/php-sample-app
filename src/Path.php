<?php

namespace oldspice;
// a static class to obtain path to the root of the website
use \Exception;

class Path {
    public static function getAppRoot() {
        // explode path
        $path_components = explode("/",__DIR__);
        $length = count( $path_components );
       return implode ( "/", array_slice( $path_components, 0, $length - 1 ) );
    }

    public static function getEnvPath( $path ) {
        $file_path = self::removeTrailingSlash($path) . "/.env";
        try {
            if( file_exists( $file_path )) {
                return $path;
            }
            else if( file_exists(dirname( dirname($file_path) ) . "/.env" ) ){
                // try one level up
                return dirname( dirname($file_path));
            }
            else {
                throw new Exception("configuration file not found");
            }
        }
        catch ( Exception $exc ) {
            error_log( $exc -> getMessage());
        }
    }
    public static function removeTrailingSlash( $str ) {
        if( substr( $str, strlen($str) - 1, 1) == "/" ) {
            // return without the trailing slash
            return substr( $str, 0, strlen($str)- 1);
        }
        else {
            return $str;
        }
    }
}
?>