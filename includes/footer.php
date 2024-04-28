</main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="small"style="text-align:center">
                    <div class="text-muted">Copyright &copy; Your Website 2023</div>
                </div>
            </div>
        </footer>
        </div>
    </div>
    <!-- --- jquery cdn link --- -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- ---- using option search box ------- -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <!-- using datatable -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
      $(document).ready(function() {
          $('.mySelect2').select2();
      });
      $(document).ready( function () {
        $('#myTable').DataTable();
      });$(document).ready( function () {
        $('#myTable_customer').DataTable();
      });$(document).ready( function () {
        $('#myTable_categ').DataTable();
      });$(document).ready( function () {
        $('#myTable_prod').DataTable();
      });
    </script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/customer.js"></script>
</body>
</html>
