    <!-- Footer -->
    <footer class="page-footer font-small peach-gradient">

      <!-- Copyright -->
      <div class="footer-copyright text-center py-3">© 2020 Copyright:
        <a href="#"> Maria Regina Cerbaro</a>
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->

    <!-- jQuery -->
    <script type="text/javascript" src="./interface/js/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="./interface/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="./interface/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="./interface/js/mdb.min.js"></script>
    <!-- MDBootstrap Datatables  -->
    <script type="text/javascript" src="./interface/js/addons/datatables.min.js"></script>

    <!-- Your custom scripts (optional) -->
    <script type="text/javascript">
      // JavaScript para paginação e ordenação de tabelas
      $(document).ready(function () {
        $('#dtBasicExample').DataTable();
        $('.dataTables_length').addClass('bs-select');
        $('#dtBasicExample').mdbEditor({
mdbEditor: true
});
      });

      
    </script>
  </body>
</html>
