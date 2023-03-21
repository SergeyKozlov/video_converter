<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/model/PostgreSQL.php');

class PG_elaboration extends PostgreSQL
{
    public function pgConnect()
    {
        //$host = 'insight.vide.me';
        $host = '192.168.1.102';
        $port = '5432';
        $username = 'pgvideme';
        $password = 'Pilsner1';
        $database = 'elaboration';
        try {
            $conn = pg_pconnect("host=$host port=$port dbname=$database user=$username password=$password") or die("No base connect");
            return $conn;
        } catch (Exception $e) {
            echo 'No DB. ' . $e;
            return false;
        }
    }
}