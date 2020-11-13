<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <!-- MDB icon -->
        <link rel="icon" href="{{ URL::to('img/eletronica_raio.png') }}" type="image/x-icon">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
        <!-- Google Fonts Roboto -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
        <!-- Bootstrap core CSS -->
        <link href="{{ URL::to('css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="{{ URL::to('css/mdb.min.css')}}" rel="stylesheet">
        <!-- MDBootstrap Datatables  -->
        <link href="{{ URL::to('css/addons/datatables.min.css')}}" rel="stylesheet">
    </head>
    <body>
        <header>
            @yield('nav')
        </header>

        <div class="container">
            @yield('main')
        </div>

        <!-- Footer -->
        <footer class="page-footer font-small peach-gradient">

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">© 2020 Copyright:
                <a href="#"> Maria Regina Cerbaro</a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->

        <!-- JQuery -->
        <script type="text/javascript" src="{{ URL::to('js/jquery.min.js')}}"></script>
        <!-- Mascara -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="{{ URL::to('js/popper.mn.js')}}"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="{{ URL::to('js/bootstrap.min.js') }}"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="{{ URL::to('js/mdb.min.js')}}"></script>
        <!-- MDBootstrap Datatables  -->
        <script type="text/javascript" src="{{ URL::to('js/addons/datatables.min.js')}}"></script>

        <!-- Your custom scripts (optional) -->
        <script type="text/javascript">
          // JavaScript para paginação e ordenação de tabelas
          $(document).ready(function () {
                $('#dtBasicExample').DataTable({
                    "language": {
                        "sEmptyTable": "Nenhum registro encontrado",
                        "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                        "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                        "sLengthMenu": "_MENU_ resultados por página",
                        "sLoadingRecords": "Carregando...",
                        "sProcessing": "Processando...",
                        "sZeroRecords": "Nenhum registro encontrado",
                        "sSearch": "Pesquisar:",
                        "oPaginate": {
                            "sNext": "Próximo",
                            "sPrevious": "Anterior",
                            "sFirst": "Primeiro",
                            "sLast": "Último"
                        },
                    }
                });

            });
        </script>

        <!-- Start script for specific page -->
        @yield('script_pages')
        <!-- End script for specific page -->

    </body>
</html>
