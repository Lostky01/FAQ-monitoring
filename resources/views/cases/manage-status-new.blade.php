@extends('layouts.app-front')

@section('css')
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">

    <style>
        .btn.btn-rounded {
            border-radius: 20% !important;
        }

        .dataTables_filter {
            float: right;
        }

        #example_paginate {
            float: right;
        }
        .hidden{
            display: none;
        }


     .data-case>tbody>tr.selected {
        background-color:#446680;
        color:white;
    }

    .data-case>tbody>tr:hover {
        cursor:pointer;
        
    }

    .dataTables_length, .dataTables_filter {
    display: none;
}

    .tambah {
        width: 125px;
        height: 35px;
        background-color: green;
        border: none;
        border-radius: 6px;
        text-align: center;
        font-size: 12px;
        margin: 1px 1px;
        opacity: 1;
        transition: 0.3s;
        display: inline-block;
        text-decoration: none;
        cursor: pointer;
        color: white;
    }
    .tambah:hover {opacity: 1}

    .manageStatus {
            background-color: #f4511e;
            border: none;
            border-radius: 8px;
            padding: 10px 10px;
            text-align: center;
            font-size: 15px;
            margin: 4px 2px;
            opacity: 0.6;
            transition: 0.3s;
            display: inline-block;
            text-decoration: none;
            cursor: pointer;
            color: white;
        }
    .manageStatus:hover {opacity: 1}

     .lihatSS {
    background-color: #18978F;
    border-radius: 8px;
    padding: 5px 5px;
    font-size: 10px;
    text-align: center;
    color: white;
    cursor: pointer;
    border: solid #18978F;
    }
     
     .pilih {
         width: 125px;
         height: 35px;
         background-color: #93FFD8;
         border: none;
         border-radius: 6px;
         text-align: center;
         font-size: 12px;
         margin: 1px 1px;
         transition: 0.3s;
         display: inline-block;
         text-decoration: none;
         cursor: pointer;
         color: white;
    }
    
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        width: 50%;
    }
    th {
        text-align: center;
    }
    td{
        text-align: center;
    }

    .warna{
        color: green;
    }

    .jarak-kanan{
        margin-right : 15px;
    }

    .jarak-kiri{
        margin-left : 22%;
    }

    .jarak-bawah{
        margin-bottom : 12%;
    }

    .table-bordered-green{
    background-color: green;
    border-radius: 12px;
    padding: 5px;
    width: 15%;
    }

    .table-bordered-red{
    background-color: red;
    border-radius: 12px;
    padding: 5px;
    width: 15%;
    }

    .table-bordered-gray{
    background-color: gray;
    border-radius: 12px;
    padding: 5px;
    width: 15%;
    }

    .table-bordered-blue{
    background-color: blue;
    border-radius: 12px;
    padding: 5px;
    width: 15%;
    }

    </style>
@endsection

@section('content')
    
    <section class="service-one my-5" id="services">
        <div class="container">
            <div class="block-title text-center">
                <a href="{{url('input-cases')}}" class="tambah pull-right">Tambah Data</a>
                <div class="block-title__text"><span>Data Case</span></div><!-- /.block-title__text -->
                <!-- <a href="{{url('status-cases')}}" class="manageStatus">Manage Status</a> -->
            </div><!-- /.block-title -->
        </div><!-- /.container -->

        <div class="col-md-12 col-lg-12">
                
                <form action="" method="get">
                    <!-- Coba Coba -->
                    <div class="row gutters-tiny jarak-kiri">
                            <div class="table-bordered-green jarak-kanan">
                                <div class="block bg-pulse-dark text-center text-white">
                                    <p class="font-size-md font-w600 mb-0 py-10" style="">Valid</p>
                                </div>
                                <div class="row py-20 text-center">
                                    <div class="col-12">
                                        <div class="font-size-h3 font-w600 text-black" style="background-color:white;">{{ $jumlahValid }}</div>
                                    </div>
                                </div>
                            </div>
                    
                    <div class="table-bordered-red jarak-kanan">
                                <div class="block bg-pulse-dark text-center text-white">
                                    <p class="font-size-md font-w600 mb-0 py-10">Invalid</p>
                                </div>
                                <div class="row py-20 text-center">
                                    <div class="col-12">
                                        <div class="font-size-h3 font-w600 text-black table-bordered" style="background-color:white;">{{ $jumlahNotValid }}</div>
                                    </div>
                                </div>
                            </div>

                    <div class="table-bordered-gray jarak-kanan">
                                <div class="block bg-pulse-dark text-center text-white">
                                    <p class="font-size-md font-w600 mb-0 py-10">Waiting Check</p>
                                </div>
                                <div class="row py-20 text-center">
                                    <div class="col-12">
                                        <div class="font-size-h3 font-w600 text-black" style="background-color:white;">{{ $dalamproses }}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-bordered-blue">
                            <div class="block bg-pulse-dark text-center text-white">
                            <p class="font-size-md font-w600 mb-0 py-10">Total Case</p>
                                </div>
                                <div class="row py-20 text-center">
                                    <div class="col-12">
                                        <div class="font-size-h3 font-w600 text-black" style="background-color:white;">{{ $totalcase }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
<!-- Batas -->

                <form action="{{ url('update-status-cases') }}" id="form-case" method="post">
                    @csrf
                    <input type="hidden" name="status" id="status">
                <table id="example" class="table table-striped table-bordered data-case" style="width:100% text-align: 'center'">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA PIC</th>
                            <th>TANGGAL</th>
                            <th>SITE</th>
                            <th>REQUEST</th>
                            <th>CASE</th>
                            <th>ACTION</th>
                            <th>OPEN</th>
                            <th>CLOSE</th>
                            <th>RESOL TIME</th>
                            <th>RESPONSE</th>
                            <th>RES TIME</th>           
                            <th>STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no=1; @endphp
                        @foreach ($data as $k => $item)
                            <tr data-id="{{ $item->id }}">
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->action_by }}</td>
                                <td><input type="checkbox" style="opacity:0" value="{{ $item->id }}" id="cases-{{ $item->id }}" name="masalah[]"><span class="hidden">{{ $item->date }}</span> {{ Helper::tanggal_indo($item->date,true) }}</td>
                                <td>{{ $item->sites }}</td>
                                <td>{{ $item->user }}</td>
                                <td>{{ $item->masalah }}</td>
                                <td>
                                    <div class="btn-group w-100" role="group" aria-label="Third group">
                                        @php
                                        $arr_new = [];
                                        $new = array_filter($img_data, function ($var) use ($item) {
                                            return (isset($var[$item->id]));
                                        });
                                        $new = array_values($new);

                                        // dd($new);
                                    @endphp   
                                        @for($i=0;$i<count($new);$i++)
                                        @if($i==0)
                                        <a data-fslightbox="{{ $k }}-lightbox" href="{{asset('public/img/ss/'.$new[$i][$item->id])}}">
                                        <button class="lihatSS" type="buton" style="width:100px">Lihat Gambar</button>
                                        </a>
                                        @else
                                        <a class="hidden" data-fslightbox="{{ $k }}-lightbox" href="{{asset('public/img/ss/'.$new[$i][$item->id])}}">-</a>
                                        @endif
                                        @endfor
                                        
                                    </div>
                                </td>
                                <td>{{ $item->open_time }}</td>
                                <td>{{ $item->close_time }}</td>
                                <td>{{ $item->resolve_min }} Min</td>
                                <td>{{ $item->response_time }}</td>
                                <td>{{ $item->response_min }} Min</td>
                                <td>
                                    @php echo Helper::statusCase($item->status); @endphp
                                </td>
                                {{-- <td class="text-center"><img src="{{ asset('public/img/logo/'.$item->logo) }}" alt="" width="30%"> </td> --}}
                            </tr>
                        @endforeach
                    </tbody>

                    <div class="row">
                        <div class="col-md-12">
                        <input type="text" name="cari" id="cari" class="pull-right" placeholder="Search"></input>
                        </div>
                    <div class="col-md-12">
                    <button type="button" class="btn simpan-btn tambah my-3 pull-right" tipe="valid">Checked Valid</button>
                    <button type="button" class="btn simpan-btn pilih my-3 pull-right mr-2" tipe="non-valid">Checked Invalid</button>
                    </div>
                </div>

                <form action="" method="get" class="jarak-bawah">
                    
                <input type ="date" name="tanggal_mulai" value="{{$tanggal_awal}}"> S/D <input type ="date" name="tanggal_akhir" value="{{$tanggal_selesai}}" class="jarak-kanan">

                    <select name='pic' class="jarak-kanan">
                    <option value="">Semua PIC</option>
                        @foreach($namePic as $k => $item_name)
                        <option value="{{ $item_name->name }}" {{ $filter==$item_name->name?'selected':'' }}>{{ $item_name->name }}</option>
                        @endforeach
                    </select>

                    <button type="submit" class="btn-success pilih">PILIH</button>                    
                </form>

                </select>

                </table>
            </form>

            </div>
    </section><!-- /.service-one -->
    
@endsection

@section('js_after')

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{asset('public/js/fslightbox.js')}}"></script>
    <script type="text/javascript">
        $('.dropify').dropify({
            messages: {
                default: 'Upload Image',
            }
        });
       
        jQuery(document).delegate('.simpan-btn', 'click', function() {
            var tipe = $(this).attr('tipe');
            $('#status').val(tipe);
            if(confirm("Apakah anda yakin ingin mengganti status?")){
                $("#form-case").submit();
            }
            else{
                return false;
            }
            

        });

        $('#example tbody').on( 'click', 'tr', function () {
            $(this).toggleClass('selected');
            var id = $(this).attr("data-id");
            
            var checkBoxes = $("#cases-"+id);
            checkBoxes.attr("checked", !checkBoxes.attr("checked"));
            // checkBoxes.prop("checked", !checkBoxes.prop("checked"));
        } );

       

    </script> 
    
    <script>
        $(document).ready(function() {
            var Table = $('#example').DataTable({
                responsive: true,
                "scrollX": true
            });

            $('#cari').on('keyup',function(){
                Table.search(this.value).draw();
            });
        });
    </script>
@endsection