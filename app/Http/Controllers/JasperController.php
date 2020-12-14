<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JasperPHP;

class JasperController extends Controller
{
    public function getConection()
    {
        $jdb_dir = 'C:\xampp\htdocs\GerenciadorOS\vendor\copam\phpjasper\src\JasperStarter\jdbc';
        return[
            'driver' => 'generic',
            'host' => env('DB_HOST'),
            'port' => env('DB_PORT'),
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'database' => env('DB_DATABASE'),
            'jdbc_driver' => 'org.postgresql.Driver',
            'jdbc_url' => 'jdbc:postgresql://localhost:5432/projetointegrador',
            'jdbc_dir' => $jdb_dir,
        ];
    }

}
