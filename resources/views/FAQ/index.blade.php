@extends('layouts.app-front')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        .card-header {
            height: 3rem;
            font-size: 1rem;
        }

        @media (max-width: 767.98px) {
            .card-header {
                height: 2.5rem;
                font-size: 0.9rem;
            }
        }
    </style>
@endsection

@section('content')
    <section class="service-one my-5">
        <div class="container-fluid">
            <div class="row justify-content-left">
                <div class="col-lg-12">
                    <div class="outer-box p-5 shadow-lg rounded">
                        <div class="block-title__text"><span>FAQ</span></div>
                        <div class="table-responsive">
                            <div id="dataInfo"></div>
                            <div class="d-flex justify-content-end mb-3">
                                <div class="col-md-9 offset-md-2">
                                    <input type="text" class="form-control" id="searchInput" placeholder="Search">
                                </div>
                                <div class="col-md-2">
                                    <a href="{{ route('FAQ.create') }}" class="btn btn-success ml-3"
                                        style="width: 80%; text-align: center; height:100%; background-color: #FFB22B">+ Add
                                        FAQ</a>
                                </div>
                            </div>
                            <table class="table" id="faq_data">
                                @php
                                    $no = 1;
                                @endphp
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>
                                                @if ($no <= 1)
                                                <div class="col-lg-12">
                                                    <div class="card">
                                                        <div class="card-header"
                                                            style="height: 3rem; background-color:#1C7B85; color:white; font-size:1rem">
                                                            TIPE KATEGORI CASE PAMA</div>
                                                        <div class="card-body">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="check1" name="option1" value="something"
                                                                    checked>
                                                                <label class="form-check-label">ASMI</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="check2" name="option2" value="something"
                                                                    checked>
                                                                <label class="form-check-label">KPCS</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="check3" name="option3" value="something"
                                                                    checked>
                                                                <label class="form-check-label">ABKL</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="check3" name="option3" value="something"
                                                                    checked>
                                                                <label class="form-check-label">MTBU</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="check3" name="option3" value="something"
                                                                    checked>
                                                                <label class="form-check-label">KIDE</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="check3" name="option3" value="something"
                                                                    checked>
                                                                <label class="form-check-label">SMMS</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="check3" name="option3" value="something"
                                                                    checked>
                                                                <label class="form-check-label">BAYA</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if ($no == 2)
                                                <div class="col-lg-12">
                                                    <div class="card">
                                                        <div class="card-header"
                                                            style="height: 3rem; background-color:#1C7B85; color:white; font-size:1rem">
                                                            TIPE KATEGORI CASE KPP</div>
                                                        <div class="card-body">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="check1" name="option1" value="something"
                                                                    checked>
                                                                <label class="form-check-label">ASTO</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="check2" name="option2" value="something"
                                                                    checked>
                                                                <label class="form-check-label">INDE</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="check3" name="option3" value="something"
                                                                    checked>
                                                                <label class="form-check-label">HCGS</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="check3" name="option3" value="something"
                                                                    checked>
                                                                <label class="form-check-label">SAM</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="check3" name="option3" value="something"
                                                                    checked>
                                                                <label class="form-check-label">SBY</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if ($no == 3)
                                                <div class="col-lg-12">
                                                    <div class="card">
                                                        <div class="card-header"
                                                            style="height: 3rem; background-color:#1C7B85; color:white; font-size:1rem">
                                                            TIPE KATEGORI CASE SMART SAFETY</div>
                                                        <div class="card-body">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="check1" name="option1" value="something"
                                                                    checked>
                                                                <label class="form-check-label">ABB</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="check2" name="option2" value="something"
                                                                    checked>
                                                                <label class="form-check-label">SMM</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="check2" name="option2" value="something"
                                                                    checked>
                                                                <label class="form-check-label">INDEXIM COALINDO</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            </td>
                                            <div class="col-sm-3">
                                                <td>
                                                    <p><strong>{{ $no++ }}</strong></p>
                                                </td>
                                                <td>
                                                    <p><strong>Q:</strong> {!! strip_tags($item->pertanyaan) !!}</p>
                                                    <p><strong>A:</strong> {!! strip_tags($item->jawaban) !!}</p>
                                                    <div class="col-md-5" style="margin-right:40%">
                                                        <span
                                                            class="badge bg-default">{{ date('M d, Y', strtotime($item->created_at)) }}</span>
                                                        <span style="color: white" class="badge bg-warning">{{ $item->project->name ?? 'N/A' }}</span>
                                                        <span style="color: white"
                                                            class="badge bg-success">{{ strip_tags($item->id_site) }}</span>
                                                        <form action="{{ route('FAQ.delete', $item->id) }}" method="POST"
                                                            style="display: inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                style="height: 20%; width: 20%">Hapus</button>
                                                        </form>
                                                        <a class="btn btn-warning btn-sm"
                                                            style="height: 20%; width: 20%; color:white; background-color:#F88B09"
                                                            href="{{ route('FAQ.edit', $item->id) }}">Edit</a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="col-sm-5 d-inline-flex justify-content-start">
                                                        @php
                                                            $images = [];
                                                            if ($item->image_url) {
                                                                $image = 'image_url';
                                                                $images[] = asset('image_info/' . $item->$image);
                                                                for ($i = 1; $i <= 2; $i++) {
                                                                    $image = 'image_url' . $i;
                                                                    if ($item->$image) {
                                                                        $images[] = asset('image_info/' . $item->$image);
                                                                    }
                                                                }
                                                            }
                                                        @endphp
                                                        @if (count($images) == 0)
                                                            <span></span>
                                                        @else
                                                            @foreach ($images as $image)
                                                                <img src="{{ $image }}" alt="Image"
                                                                    style="max-width: 218px; max-height: 218px; margin: 5px;">
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                </td>
                                            </div>
                                        </tr>
                                    @endforeach
                                </tbody>
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
        <div class="modal-content" id="modalContent"></div>
    </div>
@endsection

@section('js_after')
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // Code for initializing DataTables
            new DataTable('#faq_data');

            // Code for handling search and update data information
            function performSearch() {
                var keyword = $('#searchInput').val();
                indextable.search(keyword).draw();
            }

            $('#searchInput').on('keyup', function() {
                performSearch();
            });

            function updateDataInfo() {
                var info = indextable.page.info();
                var dataInfoDiv = $('#dataInfo');
                dataInfoDiv.html('Results ' + (info.start + 1) + '-' + (info.end + 1) + ' of ' + info.recordsTotal +
                    ' Result');
            }

            updateDataInfo();

            indextable.on('draw', function() {
                updateDataInfo();
            });

            // Code for displaying images in modal
            $(".info-button").click(function() {
                var images = $(this).data("images");
                let id = $(this).attr('data-images');
                let baseImg = <?= json_encode($images) ?>;

                var modal = document.getElementById("myModal");
                var modalContent = document.getElementById("modalContent");
                modalContent.innerHTML = "";

                var imageGrid = document.createElement("div");
                imageGrid.className = "image-grid";

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
    </script>
@endsection
