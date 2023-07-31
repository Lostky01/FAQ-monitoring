@extends('layouts.app-front')

@section('css')
    <!-- Include your CSS libraries here -->
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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
        }

        /* Additional styling */
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
        }

        .outer-box {
        width: 95%; 
        max-width: 900px;
        margin: 0 auto;
    }
        .form-label {
            text-align: left; 
        }
    </style>
@endsection

@section('content')
    <section class="service-one my-5">
        <div class="container">
            <div class="row justify-content-left">
                <div class="col-md-10">
                    <div class="outer-box p-4 shadow-lg rounded">
                        <div class="block-title text-left">
                            <div class="block-title__text"><span>Input FAQ</span></div>
                        </div>
                        <form action="{{ route('FAQ.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <!-- Date -->
                                <div class="col-md-6">
                                    <label for="date" class="form-label">Date</label>
                                    <input type="date" class="form-control" name="created_at"
                                        value="{{ old('created_at') }}">
                                </div>
                                <!-- Pilih Site options -->
                                <div class="col-md-6">
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
                                <!-- Pertanyaan -->
                                <div class="col-md-6">
                                    <label for="title" class="form-label">Pertanyaan</label>
                                    <textarea id="mytextarea_pertanyaan" class="form-control" name="pertanyaan">{{ old('pertanyaan') }}</textarea>
                                </div>
                                <!-- Jawaban -->
                                <div class="col-md-6">
                                    <label for="description" class="form-label">Jawaban</label>
                                    <textarea id="mytextarea_jawaban" class="form-control" name="jawaban">{{ old('jawaban') }}</textarea>
                                </div>
                            </div>
                            <hr>
                            <div class="row mb-3">
                                <!-- Image 1 -->
                                <div class="col-md-6">
                                    <label for="image_1" class="form-label">Image 1</label>
                                    <input type="file" class="dropify" name="image_1" data-max-file-size="1M"
                                        data-allowed-file-extensions="jpg jpeg png gif" image_list="1">
                                </div>
                                <!-- Additional Images -->
                                <div class="col-md-6" id="additional_images">
                                    <!-- Here, you can add additional image inputs as needed -->
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex align-items-center">
                                    <button type="button" id="PlusImage" onclick="AddDropify()" class="custom-button">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                    <button type="button" id="MoveImage" onclick="MoveDropify()" class="custom-button">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="submit-button text-left"> <!-- Align to the left -->
                                <button type="submit" class="btn btn-primary">Submit</button>
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
            var newImageInput = '<div class="col-md-6 mb-3 image' + currentImageNum + '">';
            newImageInput += '<label for="image_' + currentImageNum + '" class="form-label">Image ' + currentImageNum +
                '</label>';
            newImageInput += '<input type="file" class="dropify" name="image_' + currentImageNum +
                '" data-max-file-size="1M"';
            newImageInput += ' data-allowed-file-extensions="jpg jpeg png gif">';
            newImageInput += '</div>';

            var newRow = document.createElement('div');
            newRow.className = 'row';
            newRow.innerHTML = newImageInput;

            document.getElementById('list_image').appendChild(newRow);

            $('.image' + currentImageNum + ' .dropify').dropify();
        }

        function MoveDropify() {
            if (currentImageNum <= 1) {
                alert('At least one image required.');
                return;
            }

            $('.image' + currentImageNum).remove();
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

            $('.dropify').on('dropify.fileReady', function(event, file) {
                var $input = $(this);
                var maxFiles = parseInt($input.attr('data-max-files'), 4);
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
@endsection
