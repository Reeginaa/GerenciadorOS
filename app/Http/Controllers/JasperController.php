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

    public function generateReport()
    {
        // extensão que o arquivo irá ser gerado
        $extensao = 'pdf';
        // o nome
        $nome = 'ClientePorCidade';
        $filename = $nome.time();
        // onde vai ser exportado
        $output = base_path('/public/reports/'.$filename);

        // jasper pronto para chamar
        JasperPHP::compile(storage_path('app/public').'/relatorios/ClientePorCidade.jrxml')->output();

        // fazendo o processo
        JasperPHP::process(
            // arquivo que vai processar
            storage_path('app/public/relatorios/ClientePorCidade.jasper'),
            // para onde o arquivo vai, a saída
            $output,
            // extensão
            array($extensao),
            // parametros
            array(),
            // Conexão com o bd
            $this->getConection(),
            "pt_BR"
        )->execute();

        $file = $output.'.'.$extensao;

        // verifica se tem o arquivo
        if(!file_exists($file)){
            // se não existir aborta
            abort(404);
        }

        // se a extensão for PDF
        if($extensao == 'pdf'){
            return response()->file($file);
        }
    }

    // public function index()
    // {
    //     // coloca na variavel o caminho do novo relatório que irá ser gerado
    //     $output = base_path('public\reports\clientePorCidade');

    //     // instancia um novo objeto jasper
    //     //$report = new JasperPHP;

    //     // Chama o método que irá gerar o relatório
    //     // passando por parâmetro
    //         // o arquivo do relatório com seu caminho completo
    //         // o nome do arquivo que será gerado
    //         // o tipo da saída
    //         // parametros
    //         // conexão com o banco
    //     JasperPHP::process(
    //         base_path('public\reports\ClientePorCidade.jrxml'),
    //         $output,
    //         ['pdf'],
    //         [],
    //         $this->getConection(),
    //     )->execute();

    //     $file = $output . '.pdf';
    //     $path = $file;

    //     // caso o arquivo não tenha sido gerado retorno um erro 404
    //     if (!file_exists($file)) {
    //         abort(404);
    //     }

    //     //caso tenha sido gerado pego o conteudo
    //     $file = file_get_contents($file);

    //     //deleto o arquivo gerado, pois iremos mandar o conteudo para o navegador
    //     unlink($path);

    //     // retornamos o conteudo para o navegador que íra abrir o PDF
    //     return response($file, 200)
    //         ->header('Content-Type', 'application/pdf')
    //         ->header('Content-Disposition', 'inline; filename="clientePorCidade.pdf"');
    // }

}
