@extends('layouts.app-front')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

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
                <div class="col-md-4">
                    <a href="{{ route('FAQ.create') }}" class="btn btn-success">Tambah Data</a>
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
                                        <form action="{{ route('FAQ.delete', $item->id) }}" method="POST"
                                            onsubmit="return confirm('Hapus Info Ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-rounded w-100"><i
                                                    class="fa fa-trash"></i> Hapus</button>
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
@endsection

@section('js_after')
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
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
