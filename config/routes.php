


<?php


class Route{
    public static function getRoute(){
        $URI =   $_SERVER["REQUEST_URI"];

        echo $URI;
    }
}