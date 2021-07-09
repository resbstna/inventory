
@extends('header')
@section('css')



<link rel="stylesheet" media="screen, print" href="css/datagrid/datatables/datatables.bundle.css">
  @endsection

@section('content')
<main id="js-page-content" role="main" class="page-content">
                        <div class="subheader">
                            <h1 class="subheader-title">
                                <i class='subheader-icon'></i>Insert Inventory
                              </h1>
                        </div>

                        <form action="{{ route('insert_inventory.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                        <div class="row">
                            <div class="col-xl-12">
                                <div id="panel-1" class="panel">
                                    <div class="panel-hdr">
                                        <h2>
                                            Inventory
                                        </h2>
                                    </div>
                                    <div class="panel-container show">
                                        <div class="panel-content">
                                        <div class="form-group">
                                            <label class="form-label" for="example-time-2">Nama Barang</label>
                                            <input class="form-control" id="example-time-2" type="text" name="nama_barang" >
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="example-time-2">Kode Barang</label>
                                            <input class="form-control" id="example-time-2" type="text" name="kode_barang">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="example-time-2">Jumlah Barang</label>
                                            <input class="form-control" id="example-time-2" type="number" name="jumlah_barang" >
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="example-time-2">Tanggal</label>
                                            <input class="form-control" id="example-time-2" type="date" name="tanggal" >
                                        </div>

                                    </div>
                                  </div>
                                </div>
                            </div>
                                  
                            
                            <button type="submit" class="btn btn-primary"> Insert</button>
                        <a  href="/" class="btn btn-primary"> Cancel</a>

                              </div>
                              </form>
                          
                    </main>

    @endsection

    @section('javascript')
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://unpkg.com/@google/markerclustererplus@4.0.1/dist/markerclustererplus.min.js"></script>
    <script>



function initMap() {
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 12,
          center: { lat: -6.200000, lng: 106.816666 },
        });

        setMarkers(map);
      }

    function setMarkers(map) {
        // const image = get_colored(ibu[3]);

        $.ajax({
            type:"GET",
            url: '/api/dashboard',
            dataType: 'json',
            success: function(rows){
                for(var i in rows.data){
                    var row = rows.data[i];
            // const ibu = bumil[i];
            // const image = get_colored(ibu[3]);
            // console.log(image);
            new google.maps.Marker({
                position: {
                    lat: row.latitude,
                    lng: row.longitude
                },
                map,
                icon: "{{ asset('img/biru2.png') }}",
                // title: ibu[0],
            });
        }

    }
        });
    };
    </script>

    <!-- <script>
        $(document).ready(function() {
    setInterval(document.getElementById("timestamp"), 1000);
});
    </script> -->
<script src="js/datagrid/datatables/datatables.bundle.js"></script>
        <script>
// setTimeout(function(){
//    window.location.reload(1);
// }, 20000);

$(document).ready(function()
            {
                $('#dt-basic-example').dataTable(
                {
                    responsive: true,
                    stateSave: true, //remembers your table settings (filter, scroll point, sort, etc)
                    processing: true,
                    pageLength: false,
                    sAjaxSource: '',
                    deferRender: true,
                    scrollY: 1000,
                    scrollCollapse: true,
                    scroller: true
                });

            });

            $(document).ready(function()
            {
                $('#dt-basic-example2').dataTable(
                {
                    responsive: true,
                    stateSave: true, //remembers your table settings (filter, scroll point, sort, etc)
                    processing: true,
                    pageLength: false,
                    deferRender: true,
                    scrollY: 1000,
                    scrollCollapse: true,
                    scroller: true
                });
            });
</script>
    @endsection
