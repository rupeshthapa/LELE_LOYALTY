<footer class="py-4 bg-light" style="
    position: fixed;
    bottom: 0;
    left: 250px;
    right: 0;
    height: 60px;
    padding: 1rem;
    margin: 0;
    z-index: 1030; /* above main content but below modals */
    box-shadow: 0 -2px 5px rgba(0,0,0,0.1);
">
    <div class="container-fluid px-4 h-100 d-flex align-items-center justify-content-between">
        <div class="text-muted fw-bold">Copyright &copy; <strong>Lele Ventures</strong> 2024</div>
        <div>
            <a href="#">Privacy Policy</a>
            &middot;
            <a href="#">Terms &amp; Conditions</a>
        </div>
    </div>
</footer>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap 5 Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- AdminLTE -->
<script src="{{asset('admin/dist/js/adminlte.js')}}"></script>

<!-- ApexCharts -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
    integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8=" crossorigin="anonymous"></script>



    <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->


<script>
    @if (session('success'))

        Toast.fire({
        icon: "success",
        title: "{{ session('success') }}"
        });

    @endif

    @if (session('error'))

    Toast.fire({
        icon: "error",
        title: "{{ session('error') }}"
        });

    @endif
</script>

<!-- ApexCharts Example -->
<script>

    
        const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
        });


    const sales_chart_options = {
        series: [
            { name: 'Digital Goods', data: [28, 48, 40, 19, 86, 27, 90] },
            { name: 'Electronics', data: [65, 59, 80, 81, 56, 55, 40] }
        ],
        chart: { height: 300, type: 'area', toolbar: { show: false } },
        legend: { show: false },
        colors: ['#0d6efd', '#20c997'],
        dataLabels: { enabled: false },
        stroke: { curve: 'smooth' },
        xaxis: {
            type: 'datetime',
            categories: [
                '2023-01-01', '2023-02-01', '2023-03-01',
                '2023-04-01', '2023-05-01', '2023-06-01', '2023-07-01'
            ]
        },
        tooltip: { x: { format: 'MMMM yyyy' } }
    };

    const sales_chart = new ApexCharts(
        document.querySelector('#revenue-chart'),
        sales_chart_options
    );
    sales_chart.render();
</script>
