
@extends('header')
@section('css')
<link rel="stylesheet" media="screen, print" href="css/datagrid/datatables/datatables.bundle.css">
<link rel="stylesheet" media="screen, print" href="css/notifications/sweetalert2/sweetalert2.bundle.css">

<style type="text/css">
    /* Set the size of the div element that contains the map */
    #map {
      height: 520px;
      /* The height is 400 pixels */
      width: 100%;
      /* The width is the width of the web page */
    }
  </style>
@endsection
@section('content')
<main id="js-page-content" role="main" class="page-content">
                        <div class="subheader">
                            <h1 class="subheader-title">
                                <i class='subheader-icon'></i> Inventory
                            </h1>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div id="panel-1" class="panel">
                                    <div class="panel-container show">
                                        <div class="panel-content">
                                        <a type="button" class="btn btn-primary" href="/tambah-inventory">
                                + Insert
                              </a><br><br><br><br>
                                            <!-- datatable start -->
                                            <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Barang</th>
                                                        <th>Kode Barang</th>
                                                        <th>Jumlah Barang</th>
                                                        <th>Tanggal</th>
                                                        <th>Action</th>


                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                    <th>No</th>
                                                        <th>Nama Barang</th>
                                                        <th>Kode Barang</th>
                                                        <th>Jumlah Barang</th>
                                                        <th>Tanggal</th>
                                                        <th>Action</th>

                                                    </tr>
                                                </tfoot>
                                            </table>
                                            <!-- datatable end -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>

    @endsection


    @section('javascript')
    <script src="js/datagrid/datatables/datatables.bundle.js"></script>


    <script src="js/notifications/sweetalert2/sweetalert2.bundle.js"></script>
    <script>
            $(document).ready(function()
            {
                var table =  $('#dt-basic-example').DataTable(
                {
                    responsive: true,
                    ajax: '/api/inventory-view',
                });

            });
        </script>
         <script>
        function hapus(id) {
        Swal.fire({
            title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Yes, delete it!"
}).then(function(result){
  /* Read more about isConfirmed, isDenied below */
  if (result.value) {
    $.ajax({
            type:"POST",
            url: '/api/hapus-inventory',
            data: {id: id},
            dataType: 'json',
            success: function(rows)
            {
                Swal.fire("Deleted!", "Your file has been deleted.", "success");
    location.reload();
            }
        });
  }
})
        }
</script>
    @endsection
