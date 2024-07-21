<!-- App footer start -->
<div class="app-footer">
  <span>© Peduli Diri 2024</span>
</div>
<!-- App footer end -->
</div>
<!-- App container ends -->
</div>
<!-- Main container end -->
</div>
<!-- Page wrapper end -->

<script src="{{ asset('assets/adminlte') }}/plugins/jquery/jquery.min.js"></script>
<!-- *************
			************ JavaScript Files *************
		************* -->
<!-- Required jQuery first, then Bootstrap Bundle JS -->
<!-- <script src="{{ asset('assets/mars') }}/js/jquery.min.js"></script> -->
<script src="{{ asset('assets/mars') }}/js/bootstrap.bundle.min.js"></script>

<!-- *************
			************ Vendor Js Files *************
		************* -->

<!-- Overlay Scroll JS -->
<script src="{{ asset('assets/mars') }}/vendor/overlay-scroll/jquery.overlayScrollbars.min.js"></script>
<script src="{{ asset('assets/mars') }}/vendor/overlay-scroll/custom-scrollbar.js"></script>

<!-- Moment JS -->
<script src="{{ asset('assets/mars') }}/js/moment.min.js"></script>

<!-- Date Range JS -->
<script src="{{ asset('assets/mars') }}/vendor/daterange/daterange.js"></script>
<script src="{{ asset('assets/mars') }}/vendor/daterange/custom-daterange.js"></script>

<!-- Custom JS files -->
<script src="{{ asset('assets/mars') }}/js/custom.js"></script>

<!-- DataTables  & Plugins -->
<script src="{{ asset('assets/adminlte') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('assets/adminlte') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('assets/adminlte') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('assets/adminlte') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('assets/adminlte') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('assets/adminlte') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('assets/adminlte') }}/plugins/jszip/jszip.min.js"></script>
<script src="{{ asset('assets/adminlte') }}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{ asset('assets/adminlte') }}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{ asset('assets/adminlte') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('assets/adminlte') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('assets/adminlte') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- SweetAlert2 -->
<script src="../../plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/adminlte') }}/dist/js/adminlte.min.js"></script>
<!-- sweetalert2 -->
<script src="{{ asset('assets/adminlte') }}/plugins/sweetalert2/sweetalert2.min.js"></script>

<script>
  $('#modal-penduduk').on('show.bs.modal', function(e) {
    console.log('penduduk')
    const btn = $(e.relatedTarget)
    const mode = btn.data('mode')
    const id = btn.data('id')
    const nama = btn.data('nama')
    const nik = btn.data('nik')
    const jk = btn.data('jk')
    const alamat = btn.data('alamat')
    const modal = $(this)
    if (mode == 'edit') {
      modal.find('.modal-title').text('Edit Data Penduduk')
      modal.find('#nama').val(nama)
      modal.find('#nik').val(nik)
      modal.find('#jk').val(jk)
      modal.find('#alamat').val(alamat)
      modal.find('.modal-content form').attr('action', '{{ url("/penduduk") }}/' + id)
      modal.find('#method').html('@method("PATCH")')
    } else {
      modal.find('.modal-title').text('Daftar Penduduk')
      modal.find('#nama').val('')
      modal.find('#nik').val()
      modal.find('#jk').val('')
      modal.find('#alamat').val('')
      modal.find('#method').html('')
      modal.find('.modal-content form').attr('action', '{{ route("penduduk.store")}}')
    }
  });
</script>

<script>
  $('#modal-catatan').on('show.bs.modal', function(e) {
    console.log('catatan')
    const btn = $(e.relatedTarget)
    const mode = btn.data('mode')
    const id = btn.data('id')
    const tanggal = btn.data('tanggal')
    const jam = btn.data('jam')
    const lokasi = btn.data('lokasi')
    const suhu = btn.data('suhu')
    const modal = $(this)
    if (mode == 'edit') {
      modal.find('.modal-title').text('Edit Catatan')
      modal.find('#tanggal').val(tanggal)
      modal.find('#jam').val(jam)
      modal.find('#lokasi').val(lokasi)
      modal.find('#suhu').val(suhu)
      modal.find('.modal-content form').attr('action', '{{ url("catatan") }}/' + id)
      modal.find('#method').html('@method("PATCH")')
    } else {
      modal.find('.modal-title').text('Tambah Catatan')
      modal.find('#tanggal').val('')
      modal.find('#jam').val()
      modal.find('#lokasi').val('')
      modal.find('#suhu').val('')
      modal.find('#method').html('')
      modal.find('.modal-content form').attr('action', '{{ route("catatan.store")}}')
    }
  });
</script>

<script>
  $('.delete-data').click(function(e) {
    e.preventDefault()
    const data = $(this).closest('tr').find('td:eq(1)').text()
    Swal.fire({
        title: 'Data akan hilang!',
        text: `Apakah penghapusan data ${data} akan dilanjutkan?`,
        icon: 'warning',
        showDenyButton: true,
        confirmButtonText: 'Ya',
        denyButtonText: 'Tidak',
        focusConfirm: false
      })
      .then((result) => {
        if (result.isConfirmed) $(e.target).closest('form').submit()
        else swal.close()
      })
  })
</script>
@if ($message = Session::get('success'))
<script>
  Swal.fire({
    title: "Berhasil!",
    text: '{{ $message }}',
    icon: "success",
  });
</script>
@endif
@if ($message = Session::get('failed'))
<script>
  Swal.fire({
    title: "Oops...",
    text: '{{ $message }}',
    icon: "error",
  });
</script>
@endif
<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>

</html>