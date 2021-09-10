<footer class="main-footer">
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('public/plugins/jquery/jquery.min.js')}}"></script>

<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('public/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('public/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Select2 -->
<script src="{{ asset('public/plugins/select2/js/select2.full.min.js')}}"></script>

<!-- DataTables -->
<script src="{{ asset('public/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('public/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('public/plugins/datatables-rowreorder/js/dataTables.rowReorder.min.js')}}"></script>
<script src="{{ asset('public/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>  
<script src="{{ asset('public/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('public/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>

<script src="{{ asset('public/plugins/moment/moment.min.js')}}"></script>

<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('public/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->

<!-- AdminLTE App -->
<script src="{{ asset('public/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<!-- Validation -->
<script src="{{ asset('public/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{ asset('public/plugins/jquery-validation/additional-methods.min.js')}}"></script>

<!-- Toastr -->
<script src="{{ asset('public/plugins/toastr/toastr.min.js')}}"></script>

<script>
  toastr.options = {
      "newestOnTop": true,
      "progressBar": true,
      "positionClass": "toast-top-right",
      "closeButton": true,
  }
  @if(Session::has('message'))
      var type="{{Session::get('alert-type','info')}}"

      switch(type){
          case 'info':
               toastr.info("{{ Session::get('message') }}");
               break;
          case 'success':
              toastr.success("{{ Session::get('message') }}");
              break;
          case 'warning':
              toastr.warning("{{ Session::get('message') }}");
              break;
          case 'error':
              toastr.error("{{ Session::get('message') }}");
              break;
      }
  @endif
</script>
@yield('content-script')
</body>
</html>