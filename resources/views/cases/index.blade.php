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
    padding: 5px 5px;
    font-size: 10px;
    text-align: center;
    color: white;
    cursor: pointer;
    border: solid #18978F;
    }

    .lihatSS-rounded {
     border-radius: 8px;
     }

        .pilih {
            width: 50px;
            height: 25px;
            background-color: #B1D0E0;
            border: none;
            font-size: 15px;
            opacity: 1;
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
        margin-left : 10%;
    }

    .jarak-bawah{
        margin-bottom : 8%;
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

    .table-bordered-black{
    background-color: black;
    border-radius: 12px;
    padding: 5px;
    width: 15%;
    }

    .jarak-left{
        margin-left : 2%;
    }

    </style>
@endsection

@section('content')
    @php
        $role = Auth::user()->role;
    @endphp
    <section class="service-one my-5" id="services">
        <div class="container">
            <div class="block-title text-center">
            <a href="{{url('input-cases')}}" class="tambah pull-right">Tambah Data</a>
                <div class="block-title__text"><span>Data Case</span></div><!-- /.block-title__text -->
            </div><!-- /.block-title -->
            <!-- <div class="col-md-12 col-lg-12 jarak-bawah">
                @if($role != "1")
                <a href="{{url('status-cases')}}" class="manageStatus">Manage Status</a>
                @endif

                <form action="" method="get">
                Tanggal <input type ="date" name="tanggal_mulai" value="{{$tanggal_awal}}"> Sampai <input type ="date" name="tanggal_akhir" value="{{$tanggal_selesai}}">
                
                <button type="submit" class="btn-success pilih">Filter</button>
                </form>
                
            </div> -->
        </div><!-- /.container -->
        
        <form action="" method="get" class="jarak-bawah">
                    <!-- Coba Coba -->
                    <div class="row gutters-tiny jarak-kiri" style="font-family:Open Sans font-style:bold height: 1000px;">
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
                    
                    <div class="table-bordered-black jarak-kanan">
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

                            <div class="table-bordered-blue jarak-kanan">
                            <div class="block bg-pulse-dark text-center text-white">
                            <p class="font-size-md font-w600 mb-0 py-10">Total Case</p>
                                </div>
                                <div class="row py-20 text-center">
                                    <div class="col-12">
                                        <div class="font-size-h3 font-w600 text-black" style="background-color:white;">{{ $totalcase }}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-bordered-red">
                            <div class="block bg-pulse-dark text-center text-white">
                            <p class="font-size-md font-w600 mb-0 py-10">Total Penalty</p>
                                </div>
                                <div class="row py-20 text-center">
                                    <div class="col-12">
                                        <div class="font-size-h3 font-w600 text-black" style="background-color:white;">{{ $penalty }}</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                </form>
<!-- Batas -->

                <form action="" method="get" class="py-3 jarak-left">    

                <img src="{{asset('public/img/aset/Icon awesome-calendar-alt.png')}}" alt="" width="1.5%" class="jarak-kanan">
                
                <!-- <h7 style="font-style:Open Sans" class="jarak-kanan"> Tanggal </h7> -->
                
                <input type ="date" name="tanggal_mulai" value="{{$tanggal_awal}}" style="width: 150px; height: 40px"> 

                <h7 style="font-style:Open Sans" class="jarak-kanan"> Sampai </h7> 
                
                <input type ="date" name="tanggal_akhir" value="{{$tanggal_selesai}}" style="width: 150px; height: 40px"> 
                
                <h7 style="font-style:Open Sans" class="jarak-kanan"> PIC </h7>

                    <select name='pic' style="width: 150px; height: 40px">
                    
                    @foreach($namePic as $k => $item_name)
                        <option class="resizedTextbox" value="{{ $item_name->name }}" {{ $filter==$item_name->name?'selected':'' }}>{{ $item_name->name }}</option>
                        @endforeach
                    </select>                        

                    <button type="submit" class="btn-success tambah">PILIH</button>
                </form>


        <div class="mx-2">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>ACTION BY</th>
                                <th>TANGGAL</th>
                                <th>SITE/USER</th>
                                <th>WAKTU CASE</th>
                                <th>USERS</th>
                                <th>CASE</th>
                                <th>Lihat Screenshot</th>
                                <th>OPEN</th>
                                <th>CLOSE</th>
                                <th>RESOL TIME</th>
                                <th>RESPONSE</th>
                                <th>RES TIME</th>
                                <th>STATUS</th>                    
                                <th>ACTION</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            @php $no=1; @endphp
                            @foreach ($data as $k => $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->action_by }}</td>
                                    <td><span class="hidden">{{ $item->date }}</span> {{ Helper::tanggal_indo($item->date,true) }}</td>
                                    <td>{{ $item->sites }}</td>
                                    <td>{{ $item->kerjas }}</td>
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
                                        <button class="lihatSS lihatSS-rounded" type="buton" style="width:100px">Lihat Gambar</button>
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
                                    <td>
                                        <div class="btn-group w-100" role="group" aria-label="Third group">
                                            <button type="button" class="btn btn-outline-secondary btn-rounded w-100" id="toolbarDrop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></button>
                                            <div class="dropdown-menu" aria-labelledby="toolbarDrop">
                                                @php
                                                    $arr_new = [];
                                                    $new = array_filter($img_data, function ($var) use ($item) {
                                                        return (isset($var[$item->id]));
                                                    });
                                                    $new = array_values($new);
    
                                                    // dd($new);
                                                @endphp         
                                                
                                                <!-- @for($i=0;$i<count($new);$i++)
                                                @if($i==0)
                                                
                                                <a class="dropdown-item" data-fslightbox="{{ $k }}-lightbox" href="{{asset('public/img/ss/'.$new[$i][$item->id])}}">Lihat Screenshot</a>
                                                @else
                                                <a class="hidden" data-fslightbox="{{ $k }}-lightbox" href="{{ asset('public/img/ss/'.$new[$i][$item->id]) }}">
                                                    Video
                                                </a>
                                                @endif
                                                
                                                @endfor -->
                                                
                                                {{-- <a class="dropdown-item" data-fslightbox="gallery" href="{{url('screenshoot/'.$item->id)}}">Edit Case</a> --}}
                                                <a class="dropdown-item" href="{{url('edit-cases/'.$item->id)}}">Edit Case</a>
                                                <a class="dropdown-item" href="{{url('delete-cases/'.$item->id)}}" onclick="return confirm('Hapus Case Ini?')" >Hapus Case</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
        </div>
    </section><!-- /.service-one -->
    
@endsection

@section('js_after')

    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{asset('public/js/fslightbox.js')}}"></script>
    <script type="text/javascript">
        $('.dropify').dropify({
            messages: {
                default: 'Upload Image',
            }
        });
        @foreach($data as $k => $item)
        // fsLightboxInstances['{{ $k }}-lightbox'].open(0);
        // fsLightboxInstances['second-lightbox'].props.onOpen = () => console.log('Lightbox open!');
        @endforeach

    </script> 
    
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                responsive: true,
                "scrollX": true
            });
        });
    </script>
@endsection