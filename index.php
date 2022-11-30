<?php

require_once 'src/createCSV.class.php';
require_once "src/AWS_Bucket.php";
require_once "src/split.class.php";
require_once 'src/functions.php';
use Dotenv\Dotenv;

        $dotenv = Dotenv::createImmutable(__DIR__);
        $dotenv->load();

        $key = $_ENV['KEY'];
        $secret = $_ENV['SECRET'];
        $region = $_ENV['REGION'];
        $version = $_ENV['VERSION'];
        $Bucket = $_ENV['BUCKET'];
        $endpoint = $_ENV['ENDPOINT'];


        $path=AWS_Bucket::recent_object($key, $secret,$region,$version, $Bucket, $endpoint);

        $split = new Split();

        $split->Split($path);

        $csv = new CSV();

        $filename = pathinfo($path, PATHINFO_FILENAME);
        $mydir = $split->Split($path);

        $myfiles = array_diff(scandir($mydir), array('.', '..')); 

        foreach ($myfiles as $filepart) :
               $part = $filepart;
               $csv->createCSV($part,$mydir,$rows,$path);
        endforeach;

?>
