@extends('layouts.app-front')

@section('css')
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
    .btn.btn-rounded {
        border-radius: 20% !important;
    }
    .dataTables_filter {
        float: right;
    }

        /* #example_paginate {
            float: right;
        }
        .hidden{
            display: none;
        }*/


    .data-case>tbody>tr.selected {
        background-color:#446680;
        color:white;
    }

    .data-case>tbody>tr:hover {
        cursor:pointer;
        
    }

    /*.dataTables_length, .dataTables_filter {
    display: none;
    }*/ 

    #snackbar1 {
      visibility: hidden;
      min-width: 250px;
      margin-left: -125px;
      background-color: #333;
      color: #fff;
      text-align: center;
      border-radius: 2px;
      padding: 16px;
      position: fixed;
      z-index: 1;
      left: 50%;
      bottom: 30px;
      font-size: 17px;
    }

        #snackbar1.show {
      visibility: visible;
      -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
      animation: fadein 0.5s, fadeout 0.5s 2.5s;
    }

        #snackbar2 {
      visibility: hidden;
      min-width: 250px;
      margin-left: -125px;
      background-color: #333;
      color: #fff;
      text-align: center;
      border-radius: 2px;
      padding: 16px;
      position: fixed;
      z-index: 1;
      left: 50%;
      bottom: 30px;
      font-size: 17px;
    }

        #snackbar2.show {
      visibility: visible;
      -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
      animation: fadein 0.5s, fadeout 0.5s 2.5s;
    }

        #snackbar3 {
      visibility: hidden;
      min-width: 250px;
      margin-left: -125px;
      background-color: #333;
      color: #fff;
      text-align: center;
      border-radius: 2px;
      padding: 16px;
      position: fixed;
      z-index: 1;
      left: 50%;
      bottom: 30px;
      font-size: 17px;
    }

        #snackbar3.show {
      visibility: visible;
      -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
      animation: fadein 0.5s, fadeout 0.5s 2.5s;
    }

        #snackbar4 {
      visibility: hidden;
      min-width: 250px;
      margin-left: -125px;
      background-color: #333;
      color: #fff;
      text-align: center;
      border-radius: 2px;
      padding: 16px;
      position: fixed;
      z-index: 1;
      left: 50%;
      bottom: 30px;
      font-size: 17px;
    }

        #snackbar4.show {
      visibility: visible;
      -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
      animation: fadein 0.5s, fadeout 0.5s 2.5s;
    }

        #snackbar5 {
      visibility: hidden;
      min-width: 250px;
      margin-left: -125px;
      background-color: #333;
      color: #fff;
      text-align: center;
      border-radius: 2px;
      padding: 16px;
      position: fixed;
      z-index: 1;
      left: 50%;
      bottom: 30px;
      font-size: 17px;
    }

    #snackbar5.show {
      visibility: visible;
      -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
      animation: fadein 0.5s, fadeout 0.5s 2.5s;
    }

    @-webkit-keyframes fadein {
      from {bottom: 0; opacity: 0;} 
      to {bottom: 30px; opacity: 1;}
    }

    @keyframes fadein {
      from {bottom: 0; opacity: 0;}
      to {bottom: 30px; opacity: 1;}
    }

    @-webkit-keyframes fadeout {
      from {bottom: 30px; opacity: 1;} 
      to {bottom: 0; opacity: 0;}
    }

    @keyframes fadeout {
      from {bottom: 30px; opacity: 1;}
      to {bottom: 0; opacity: 0;}
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

    .btn-penalty {
        background-color: #2C3333;
        border: none;
        border-radius: 6px;
        color: white;
        padding: 12px 16px;
        font-size: 20px;
        cursor: pointer;
        }
        
    .btn-penalty:hover {
      background-color: #100F0F;
      }

    .btn-invalid {
        background-color: #FF1E00;
        border: none;
        border-radius: 6px;
        color: white;
        padding: 12px 16px;
        font-size: 20px;
        cursor: pointer;
        }
        
    .btn-invalid:hover {
      background-color: #990000;
      }

    .btn-valid {
        background-color: #3CCF4E;
        border: none;
        border-radius: 6px;
        color: white;
        padding: 12px 16px;
        font-size: 20px;
        cursor: pointer;
        }
        
    .btn-valid:hover {
      background-color: #1A4D2E;
      }

    .btn-performance {
        background-color: DodgerBlue;
        border: none;
        border-radius: 6px;
        color: white;
        padding: 12px 16px;
        font-size: 20px;
        cursor: pointer;
        }
        
    .btn-performance:hover {
      background-color: RoyalBlue;
      }

    .btn-inval-performance {
        background-color: #FFC23C;
        border: none;
        border-radius: 6px;
        color: white;
        padding: 12px 16px;
        font-size: 20px;
        cursor: pointer;
        }
        
    .btn-inval-performance:hover {
      background-color: #F2DF3A;
      }

/*    .btn-inval {
         width: 125px;
         height: 35px;
         background-color: red;
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

    .btn-penalty {
         width: 125px;
         height: 35px;
         background-color: blue;
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
    } */
    
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
        margin-bottom : 12%;
    }

    .table-bordered-green{
    background-color: green;
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

    .table-bordered-red{
    background-color: red;
    border-radius: 12px;
    padding: 5px;
    width: 15%;
    }

    .resizedTextbox {
        width: 100px; height: 20px
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
                    <div class="row gutters-tiny jarak-kiri jarak-bawah" style="font-family:Open Sans font-style:bold">
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
                    
                    <form action="" method="get">

                    <div class="row">
                    
                        <!-- <div class="col-md-12">
                        <input type="text" name="cari" id="cari" class="pull-right" placeholder="Search..." style="font-style:italic; font-family:open sans"></input>
                        </div> -->
                    <div class="col-md-12">

                    <button onmouseover="myFunction1()" type="button" class="btn-penalty simpan-btn my-3 pull-right mr-2 dropbtn" tipe="penalty"><i class="fa fa-warning"></i></button><div id="snackbar1">Penalty</div>

                    <button onmouseover="myFunction2()" type="button" class="btn-invalid simpan-btn my-3 pull-right jarak-kanan" tipe="non-valid"><i class="fa fa-remove"></i></button><div id="snackbar2">Response Invalid</div>

                    <button onmouseover="myFunction3()" type="button" class="btn-valid simpan-btn my-3 pull-right jarak-kanan" tipe="valid"><i class="fa fa-check"></i></button><div id="snackbar3">Valid Response</div>

                    <button onmouseover="myFunction4()" type="button" class="btn-performance simpan-btn my-3 pull-right jarak-kanan" tipe="performance"><i class="fa fa-tachometer"></i></button><div id="snackbar4">Valid Performance</div>

                    <button onmouseover="myFunction5()" type="button" class="btn-inval-performance simpan-btn my-3 pull-right jarak-kanan" tipe="inval-performance"><i class="fa fa-thumbs-down"></i></button><div id="snackbar5">Invalid Performance</div>

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
                    </div>
                </div>
                </form>

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
                            <th>WAKTU CASE</th>
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
                            </tr>
                        @endforeach
                    </tbody>

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

    <script>
    function myFunction() {
        var x = document.getElementById("snackbar1","snackbar2","snackbar3","snackbar4","snackbar5");
        x.className = "show";
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
        }
    </script>

        <script>
    function myFunction1() {
        var x = document.getElementById("snackbar1");
        x.className = "show";
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
        }
    </script>

        <script>
    function myFunction2() {
        var x = document.getElementById("snackbar2");
        x.className = "show";
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
        }
    </script>

        <script>
    function myFunction3() {
        var x = document.getElementById("snackbar3");
        x.className = "show";
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
        }
    </script>

        <script>
    function myFunction4() {
        var x = document.getElementById("snackbar4");
        x.className = "show";
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
        }
    </script>

        <script>
    function myFunction5() {
        var x = document.getElementById("snackbar5");
        x.className = "show";
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
        }
    </script>
@endsection