@extends('layouts.app-front')

@section('css')
    <!-- Include your CSS libraries here -->
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .submit-button {
            display: flex;
            justify-content: center;
        }

        .custom-button {
            border: none;
            background-color: transparent;
            cursor: pointer;
            font-size: 24px;
            outline: none;
            color: #007bff;
        }

        .custom-button:hover {
            color: #ff0000;
        }

        .form-container {
            background-color: #f5f5f5;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            padding: 20px;
        }

        .form-title {
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 30px;
        }

        /* Restyle the form elements */
        .form-label {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .form-control {
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            padding: 10px;
            font-size: 16px;
            transition: box-shadow 0.2s;
        }

        .form-control:focus {
            outline: none;
            box-shadow: 0 0 5px #007bff;
        }

        .custom-button {
            border: 1px solid #007bff;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            font-size: 24px;
            padding: 8px 16px;
            border-radius: 5px;
            transition: background-color 0.2s;
        }

        .custom-button:hover {
            background-color: #0056b3;
        }

        .submit-button {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            content: "+ Add to List";
        }


        .image-input-container {
            margin-bottom: 20px;
        }



        .image-input-container .form-label {
            display: block;
        }

        .image-input-container .form-control {
            display: block;
            margin-top: 10px;
        }

        /* For mobile phones and tablets: */
        @media (max-width: 991.98px) {
            .form-container {
                padding: 10px;
            }

            .submit-button {}

            .responsive-button::before {
                display: none;
            }


            .submit-button.responsive-button::before {
                content: "+";

            }
        }

        .outer-box {
            width: 95%;
            margin: 0 auto;
        }

        .form-label {
            text-align: left;
        }
    </style>
@endsection

@section('content')
    <section class="service-one my-5">
        <div class="container-fluid">
            <div class="row justify-content-left">
                <div class="col-lg-12">
                    <div class="outer-box p-5 shadow-lg rounded">
                        <div class="block-title text-left">
                            <div class="block-title__text"><span>Input FAQ</span></div>
                        </div>
                        <form action="{{ route('FAQ.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <!-- Date -->
                                <div class="col-sm-5">
                                    <label for="date" class="form-label">Date</label>
                                    <input type="date" class="form-control" name="created_at"
                                        value="{{ old('created_at') }}">
                                </div>
                                <!-- Pilih Site options -->
                                <div class="col-sm-5">
                                    <label for="project" class="form-label">Nama Site</label>
                                    <select class="js-example-basic-single form-control" id="select-project" name="id_site">
                                        <option value="" selected disabled>Pilih Site</option>
                                        @foreach ($sites as $key => $item)
                                            <option value="{{ $key }}"
                                                {{ old('id_site') == $key ? 'selected' : '' }}>
                                                {{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-5">
                                    <label for="title" class="form-label">Pertanyaan</label>
                                    <textarea id="mytextarea_pertanyaan" class="form-control" name="pertanyaan">{{ old('pertanyaan') }}</textarea>
                                </div>
                                <div class="col-sm-5">
                                    <label for="description" class="form-label">Jawaban</label>
                                    <textarea id="mytextarea_jawaban" class="form-control" name="jawaban">{{ old('jawaban') }}</textarea>
                                </div>
                            </div>
                            <hr>
                            <button type="button" id="PlusImage" onclick="AddDropify()" class="btn btn-primary">
                                + Tambah Gambar
                            </button>
                            <div class="row mb-3">
                                <!-- Image 1 -->
                                <div class="col-sm-3">
                                    <label for="image_1" class="form-label">Photo 1</label>
                                    <button type="button" style="margin-left: 95%" id="MoveImage" onclick="MoveDropify()"
                                        class="btn btn-danger">
                                        <i class="fa fa-close"></i>
                                    </button>
                                    <input type="file" class="dropify" name="image_1" data-max-file-size="1M"
                                        data-allowed-file-extensions="jpg jpeg png gif" image_list="1" data-default-file="">
                                </div>
                                {{-- class buat nambah col dropify setiap diulang, biar horizontal posisinya --}}
                                <div class="col-sm-3" id="additional_images">

                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex align-items-center">

                                </div>
                            </div>
                            <div class="submit-button text-right responsive-button">
                                <button type="submit" class="btn btn-primary"
                                    style="margin-left: 90%; background-color: #FFB22B">+ Add FAQ To List</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js_after')
    <script src="https://cdn.tiny.cloud/1/iaklx4npf5s3iruz98j0rjkzc7j45t421qjfu97jd0fmmzvs/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea_pertanyaan, #mytextarea_jawaban'
        });

        var maxImages = 2;
        var currentImageNum = 1;

        function AddDropify() {
            if (currentImageNum >= maxImages) {
                alert('Maximum ' + maxImages + ' images allowed.');
                return;
            }
            

            currentImageNum++;
            var newImageInput = '<label for="image_' + currentImageNum + '" class="form-label">Photo ' + currentImageNum +
                '</label>';
            newImageInput += '<button type="button" style="margin-left: 95%" onclick="RemoveDropify(' + currentImageNum +
                ')" class="btn btn-danger"><i class="fa fa-close"></i></button>';
            newImageInput += '<input type="file" class="dropify custom-dropify" name="image_' + currentImageNum +
                '" data-max-file-size="1M" data-allowed-file-extensions="jpg jpeg png gif" data-default-file="">';
            newImageInput += '</div>';

            var newRow = document.createElement('div');
            newRow.className = 'row';
            newRow.innerHTML = newImageInput;

            document.getElementById('additional_images').appendChild(newRow);

            $('.custom-dropify').last().dropify();
            $('.image' + currentImageNum + ' .dropify').dropify();
        }

        function RemoveDropify(imageNum) {
            if (currentImageNum <= 1) {
                alert('At least one image required.');
                return;
            }

            var lastRow = $('#additional_images .row:last-child');
            lastRow.remove();
            currentImageNum--;
        }



        function MoveDropify() {
            if (currentImageNum <= 1) {
                alert('At least one image required.');
                return;
            }

            var lastRow = $('#additional_images .row:last-child');
            lastRow.remove();
            currentImageNum--;
        }
    </script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $("#select-project").on('change', function() {
            var id = this.value;
            console.log(id);
            $.ajax({
                method: 'get',
                url: "{{ route('FAQ.getName', ':id') }}".replace(':id', id), // Pass the id parameter
                success: function(result) {
                    if (result.msg == 'berhasil') {
                        $('#select-domain').find('option').remove().end();
                        $('#select-domain').append(result.data);
                    } else {
                        $('#select-domain').find('option').remove().end();
                        $('#select-domain').append(result.data);
                        $('#select-domain').trigger('change');
                        $('#select-domain').select2({
                            theme: "bootstrap",
                            width: "100%"
                        });
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log(xhr.responseText);
                    alert(xhr.responseText);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {

            $('.dropify').dropify();
            $('.custom-dropify').last().dropify({
                messages: {
                    default: 'Upload', 
                    replace: 'Replace Image',
                    remove: 'Remove',
                    error: 'Error: File upload failed.'
                }
            });

            $('.dropify').on('dropify.fileReady', function(event, file) {
                var $input = $(this);
                var maxFiles = parseInt($input.attr('data-max-files'), 2);
                var maxSize = parseInt($input.attr('data-max-file-size'), 10) * 1024; // Convert to bytes
                var files = $input.dropify('getFilesCount');

                if (files > maxFiles) {
                    $input.dropify('resetPreview');
                    $input.val('');
                    alert('You can upload a maximum of ' + maxFiles + ' files.');
                } else if (file.size > maxSize) {
                    $input.dropify('resetPreview');
                    $input.val('');
                    alert('File size should not exceed ' + $input.attr('data-max-file-size') + '.');
                }
            });

            $('.dropify').on('dropify.errors', function(event, element) {
                var validExtensions = $(this).attr('data-allowed-file-extensions');
                var fileName = element.name;
                var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1).toLowerCase();

                if (validExtensions.indexOf(fileNameExt) == -1) {
                    alert('File type must be ' + validExtensions + '.');
                    $(this).dropify('resetPreview');
                    $(this).val('');
                }
            });
        });
    </script>
    <style>
        .custom-dropify {
            width: 100%;
            height: 100%;
        }
    </style>
@endsection
