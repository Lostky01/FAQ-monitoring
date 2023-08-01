@extends('layouts.app-front')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        .table {
            width: 100%;
            margin-bottom: 20px;
        }

        .table th,
        .table td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        .table th {
            background-color: #f2f2f2;
        }

        /* Make the "id" row smaller */
        .table td.smaller-row {
            font-size: 12px;
            text-align: center;
        }

        /* Add styles for the FAQ container */
        .faq-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
        }

        .faq-question {
            margin-bottom: 20px;
        }

        .faq-question h3 {
            margin-bottom: 10px;
            color: #007bff;
        }

        .btn.btn-rounded {
            border-radius: 20% !important;
        }

        .dataTables_filter {
            float: right;
        }

        #example_paginate {
            float: right;
        }

        .info-button {
            border: 1px solid #ccc;
            background-color: #fff;
            color: #333;
            padding: 8px 12px;
            font-size: 14px;
            width: 50%;
            cursor: pointer;
        }

        /* The Modal (background) */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.9);
        }

        /* Modal Content */
        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }

        /* The Close Button */
        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
        }

        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px) {
            .modal-content {
                width: 100%;
            }
        }

        /* Style the image grid */
        .image-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 10px;
            justify-items: center;
        }

        /* Style the individual images */
        .image-item {
            width: 100%;
            height: auto;
            cursor: pointer;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .image-item:hover {
            transform: scale(1.05);
        }

        /* Custom style for the project filter */
        .project-filter-container {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .project-filter-label {
            margin-right: 10px;
            flex-shrink: 0;
        }

        .project-filter-select {
            flex-grow: 1;
            max-width: 200px;
        }

        .btn-tambah-data {
            width: 100%;
            max-width: 150px;
        }

        .modal-confirm {
            color: #636363;
            width: 400px;
        }

        .modal-confirm .modal-content {
            padding: 20px;
            border-radius: 5px;
            border: none;
            text-align: center;
            font-size: 14px;
        }

        .modal-confirm .modal-header {
            border-bottom: none;
            position: relative;
        }

        .modal-confirm h4 {
            text-align: center;
            font-size: 26px;
            margin: 30px 0 -10px;
        }

        .modal-confirm .close {
            position: absolute;
            top: -5px;
            right: -2px;
        }

        .modal-confirm .modal-body {
            color: #999;
        }

        .modal-confirm .modal-footer {
            border: none;
            text-align: center;
            border-radius: 5px;
            font-size: 13px;
            padding: 10px 15px 25px;
        }

        .modal-confirm .modal-footer a {
            color: #999;
        }

        .modal-confirm .icon-box {
            width: 80px;
            height: 80px;
            margin: 0 auto;
            border-radius: 50%;
            z-index: 9;
            text-align: center;
            border: 3px solid #B0D88F;
        }

        .modal-confirm .icon-box i {
            color: #f15e5e;
            font-size: 46px;
            display: inline-block;
            margin-top: 13px;
        }

        .modal-confirm .btn,
        .modal-confirm .btn:active {
            color: #fff;
            border-radius: 4px;
            background: #60c7c1;
            text-decoration: none;
            transition: all 0.4s;
            line-height: normal;
            min-width: 120px;
            border: none;
            min-height: 40px;
            border-radius: 3px;
            margin: 0 5px;
        }

        .modal-confirm .btn-secondary {
            background: #c1c1c1;
        }

        .modal-confirm .btn-secondary:hover,
        .modal-confirm .btn-secondary:focus {
            background: #a8a8a8;
        }

        .modal-confirm .btn-danger {
            background: #f15e5e;
        }

        .modal-confirm .btn-danger:hover,
        .modal-confirm .btn-danger:focus {
            background: #ee3535;
        }

        .trigger-btn {
            display: inline-block;
            margin: 100px auto;
        }
    </style>
@endsection

@section('content')
    <section class="service-one my-5" id="services">
        <div class="container">
            <div class="block-title text-center">
                <div class="block-title__text"><span>FAQ INFO</span><br>
                </div>
            </div>
            <div class="table-responsive">
                <div class="col-md-4" style="margin-left: 85%">
                    <a href="{{ route('FAQ.create') }}" class="btn btn-success" style=" background-color: #FFB22B">+ Add
                        FAQ</a>
                </div>
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Site</th>
                            <th>Pertanyaan</th>
                            <th>Jawaban</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->id_site }}</td>
                                <td><?php echo $item->pertanyaan; ?></td>
                                <td>
                                    {!! $item->jawaban !!}
                                    @php
                                    @endphp
                                    <div class="info-button id-{{ $item->id }}" data-images="{{ $item->id }}">Lihat
                                        Gambar</div>
                                    @if (count($images) > 0)
                                        {{-- <div class="info-button" data-images="{{ json_encode($images) }}">Lihat Gambar</div> --}}
                                    @else
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group w-100" role="group" aria-label="Third group">
                                        <a class="btn btn-outline-secondary btn-rounded w-100"
                                            href="{{ route('FAQ.edit', $item->id) }}"><i class="fa fa-edit"></i> Edit</a>
                                        <form action="{{ route('FAQ.delete', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button"
                                                class="btn btn-outline-danger btn-rounded w-100 delete-btn"
                                                data-toggle="modal" data-target="#myModal2"><i class="fa fa-trash"></i>
                                                Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <div id="myModal" class="modal">
        <span class="close" onclick="closeModal()">&times;</span>
        <div class="modal-content" id="modalContent">
        </div>
    </div>
    <div id="myModal2" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header flex-column">
                    <div class="icon-box" >
                        <i class="material-icons" style="color: #B0D88F">&#xE5CA;</i> 
                    </div>
                    <h4 class="modal-title w-100">HAPUS !</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda Yakin ?</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" style="background-color: #6B6BD9">OK</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_after')
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            let baseid = <?= json_encode($baseid) ?>;
            let baseImg = <?= json_encode($images) ?>;
            for (var i = 0; i < baseid.length; i++) {
                if (baseImg[baseid[i]] == '') {
                    $(".info-button.id-" + baseid[i]).hide();
                }
            }
            $('#example').DataTable();
            // console.log(baseid)

            /* $(".info-button").click(function () {
                var images = $(this).data("images");
                var modal = document.getElementById("myModal");
                var modalContent = document.getElementById("modalContent");
                modalContent.innerHTML = "";

                var imageGrid = document.createElement("div");
                imageGrid.className = "image-grid";

                for (var i = 0; i < 4; i++) {
                    var imgElement = document.createElement("img");
                    imgElement.src = images[i];
                    imgElement.className = "image-item";
                    imgElement.onclick = function () {
                        openModal(this.src, "");
                    };
                    imageGrid.appendChild(imgElement);
                }

                modalContent.appendChild(imageGrid);
                modal.style.display = "block";
            }); */
            $('.delete-btn').click(function() {
                $('#myModal2').modal('show');
            });

            $(".info-button").click(function() {
                var images = $(this).data("images");
                let id = $(this).attr('data-images');
                let baseImg = <?= json_encode($images) ?>;

                var modal = document.getElementById("myModal");
                var modalContent = document.getElementById("modalContent");
                modalContent.innerHTML = "";

                var imageGrid = document.createElement("div");
                imageGrid.className = "image-grid";

                // Adjust the loop to show all available images (up to 4)
                for (var i = 0; i < Math.min(4, baseImg[id].length); i++) {
                    var imgElement = document.createElement("img");
                    imgElement.src = baseImg[id][i];
                    imgElement.className = "image-item";
                    imgElement.onclick = function() {
                        openModal(this.src, "");
                    };
                    imageGrid.appendChild(imgElement);
                }

                modalContent.appendChild(imageGrid);
                modal.style.display = "block";
            });
        });



        function openModal(imageSrc, captionText) {
            var modal = document.getElementById("myModal");
            var modalImg = document.createElement("img");
            modalImg.src = imageSrc;
            modalImg.className = "modal-content";
            modalImg.onclick = function() {
                closeModal();
            };

            var caption = document.getElementById("caption");
            caption.innerHTML = "";

            var modalContent = document.getElementById("modalContent");
            modalContent.innerHTML = "";
            modalContent.appendChild(modalImg);

            modal.style.display = "block";
        }

        function closeModal() {
            var modal = document.getElementById("myModal");
            modal.style.display = "none";
        }

        var indextable = $('#example').DataTable();
        // fitur search data table
        $('#select_project').on('click', function() {
            var values = $(this).val();
            console.log(values)
            indextable.search(values).draw();
        });
    </script>
@endsection
