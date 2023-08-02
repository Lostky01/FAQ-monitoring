@extends('layouts.app-front')


@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
@endsection


@section('content')
    <section class="service-one my-5">
        <div class="container-fluid">
            <div class="row justify-content-left">
                <div class="col-lg-12">
                    <div class="outer-box p-5 shadow-lg rounded">
                        <div class="block-title text-left">
                            <div class="block-title__text"><span>FAQ</span></div>
                        </div>
                        <div class="col-md-4" style="margin-left: 85%">
                            <div class="input-group">
                                <input type="text" class="form-control" id="searchInput" placeholder="Search">
                            </div>
                            <a href="{{ route('FAQ.create') }}" class="btn btn-success"
                                style="width: 30%; text-align: center; height:10%; background-color: #FFB22B">+
                                Add
                                FAQ</a>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table">
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($data as $item)
                                    <tbody>
                                        <tr>
                                            <div class="col-sm-3">
                                                {{-- <td class="col-sm-1">{{ $no++ }}</td> --}}
                                                <td>
                                                    <p><strong>{{ $no++ }}</strong></p>
                                                </td>
                                                <td>
                                                    
                                                    <p><strong>Q:</strong> {!! strip_tags($item->pertanyaan) !!}</p>
                                                    <p><strong>A:</strong> {!! strip_tags($item->jawaban) !!}</p>
                                                    <div class="col-md-5" style="margin-right:40%">
                                                        <span class="badge bg-default">{{ date('M d, Y', strtotime($item->created_at)) }}</span>
                                                        <span style="color: white" class="badge bg-success">{{ strip_tags($item->id_site) }}</span>
                                                        <form action="{{ route('FAQ.delete', $item->id) }}" method="POST" style="display: inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm" style="height: 20%; width: 20%">Hapus</button>
                                                        </form>
                                                        <a class="btn btn-warning btn-sm" style="height: 20%; width: 20%; color:white; background-color:#F88B09" href="{{ route('FAQ.edit', $item->id) }}">Edit</a>
                                                        {{-- <div class="btn btn-primary id-{{ $item->id }} btn-sm" style="height: 20%; width: 40%" data-images="{{ $item->id }}">Lihat Gambar</div> --}}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="col-sm-5 d-flex justify-content-start">
                                                        @php
                                                            if ($item->image_url) {
                                                                $image = 'image_url';
                                                                $images = [asset('image_info/' . $item->$image)];
                                                                for($i = 1; $i <= 2; $i++) {
                                                                    $image = 'image_url' . $i;
                                                                    if ($item->$image) {
                                                                        $images[] = asset('image_info/' . $item->$image);
                                                                    }
                                                                }
                                                            }
                                                        @endphp
                                                        @if (count($images) > 0)
                                                            @foreach ($images as $image)
                                                                <img src="{{ $image }}" alt="Image" style="max-width: 150px; max-height: 150px; margin: 5px;">
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                </td>                                                                                                
                                            </div>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                            <hr>
                        </div>
                    </div>
                </div>
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

             function performSearch() {
                var keyword = $('#searchInput').val();
                indextable.search(keyword).draw();
            }

            // Bind the keyup event of the search input field to perform the search
            $('#searchInput').on('keyup', function() {
                performSearch();
            });
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
                for (var i = 0; i < Math.min(2, baseImg[id].length); i++) {
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
