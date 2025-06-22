<footer class="py-4 bg-light mt-auto" style="margin-left: 250px; padding: 1rem; position: fixed; bottom: 0; width: calc(100% - 250px); z-index: 1030;">
  <div class="container-fluid px-4">
    <div class="d-flex align-items-center justify-content-between small">
      <div class="text-muted" style="font-weight: bold;">Copyright &copy; <strong>Lele Ventures</strong> 2024</div>
      <div>
        <a href="#">Privacy Policy</a>
        &middot;
        <a href="#">Terms &amp; Conditions</a>
      </div>
    </div>
  </div>
</footer>


<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap 5 Bundle (includes Popper) -->
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> --}}

<script src="{{ asset('js/admin/bootstrap.min.js') }}"></script>

<!-- DataTables -->
{{-- <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script> --}}

<script src="{{ asset('js/admin/jquery.dataTables.min.js') }}"></script>




<!-- SweetAlert2 -->
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}

<script src="{{ asset('js/admin/sweetalert2.min.js') }}"></script>






<!-- AdminLTE -->
<script src="{{asset('admin/dist/js/adminlte.js')}}"></script>







<script>
    function showToast(icon, title) {
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: icon,  // 'success', 'error', 'warning', 'info', 'question'
        title: title,
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });
}
</script>


