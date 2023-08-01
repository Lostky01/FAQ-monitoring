@extends('layouts.app-front')

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dropify/dist/css/dropify.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .image-preview-container {
            display: flex;
            flex-wrap: wrap;
            margin-top: 10px;
        }

        .image-preview {
            position: relative;
            margin-right: 10px;
            margin-bottom: 10px;
        }

        .delete-image-btn {
            position: absolute;
            top: -10px;
            right: -10px;
        }

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
                            <div class="block-title__text"><span>Edit FAQ</span></div>
                        </div>
                        <form action="{{ route('FAQ.update', $data->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <!-- Date -->
                                <div class="col-sm-5">
                                    <label for="date" class="form-label">Date</label>
                                    <input type="date" class="form-control" name="created_at"
                                        value="{{ $data->created_at }}">
                                </div>
                                <!-- Pilih Site options -->
                                <div class="col-sm-5">
                                    <label for="project" class="form-label">Nama Site</label>
                                    <select class="js-example-basic-single form-control" id="select-project" name="id_site">
                                        <option value="" selected disabled>Pilih Site</option>
                                        @foreach ($sites as $key => $site)
                                            <option value="{{ $key }}"
                                                {{ $data->id_site == $key ? 'selected' : '' }}>
                                                {{ $site }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <!-- Pertanyaan -->
                                <div class="col-sm-5">
                                    <label for="title" class="form-label">Pertanyaan</label>
                                    <textarea id="mytextarea_pertanyaan" class="form-control" name="pertanyaan">{{ $data->pertanyaan }}</textarea>
                                </div>
                                <!-- Jawaban -->
                                <div class="col-sm-5">
                                    <label for="description" class="form-label">Jawaban</label>
                                    <textarea id="mytextarea_jawaban" class="form-control" name="jawaban">{{ $data->jawaban }}</textarea>
                                </div>
                            </div>
                            <hr>
                            <button type="button" id="PlusImage" onclick="AddDropify()" class="btn btn-primary">
                                + Tambah Gambar
                            </button>

                            <div class="row mb-3">
                                <!-- Image 1 -->
                                <div class="col-sm-3">
                                    @php
                                        $imageUrl1 = $data->image_url ?? null;
                                    @endphp
                                    @if ($imageUrl1)
                                        <label for="image_1" class="form-label">Photo 1</label>
                                        <button type="button" style="margin-left: 95%" id="MoveImage"
                                            onclick="MoveDropify()" class="btn btn-danger">
                                            <i class="fa fa-close"></i>
                                        </button>
                                        <input type="file" class="dropify" name="image_1" data-max-file-size="1M"
                                            data-allowed-file-extensions="jpg jpeg png gif" image_list="1"
                                            data-default-file="{{ asset('image_info/' . $imageUrl1) }}">
                                    @else
                                        <label for="image_1" class="form-label">Photo 1</label>
                                        <button type="button" style="margin-left: 95%" id="MoveImage"
                                            onclick="MoveDropify()" class="btn btn-danger">
                                            <i class="fa fa-close"></i>
                                        </button>
                                        <input type="file" class="dropify" name="image_1" data-max-file-size="1M"
                                            data-allowed-file-extensions="jpg jpeg png gif" image_list="1"
                                            data-default-file="">
                                    @endif
                                </div>
                                @php
                                    $additionalImages = $data->image_url2;
                                @endphp
                                <!-- Additional Images -->
                                <div class="col-sm-3" id="additional_images">
                                    @if (is_array($additionalImages) || is_object($additionalImages))
                                        @foreach ($additionalImages as $index => $imageUrl)
                                            <div class="image-preview image{{ $index }}">
                                                <label class="form-label">Photo {{ $index + 1 }}</label>
                                                <button type="button" class="btn btn-danger delete-image-btn"
                                                    data-image-index="{{ $index }}">
                                                    <i class="fa fa-close"></i>
                                                </button>
                                                <input type="file" class="dropify custom-dropify"
                                                    name="image_{{ $index + 1 }}" data-max-file-size="1M"
                                                    data-allowed-file-extensions="jpg jpeg png gif"
                                                    data-default-file="{{ asset('image_info/' . $imageUrl) }}">
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex align-items-center">

                                </div>
                            </div>
                            <div class="submit-button text-right responsive-button">
                                <button type="submit" class="btn btn-primary"
                                    style="margin-left: 90%; background-color: #FFB22B">+ Save FAQ To List</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js_after')
    <script src="https://cdn.jsdelivr.net/npm/dropify/dist/js/dropify.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/iaklx4npf5s3iruz98j0rjkzc7j45t421qjfu97jd0fmmzvs/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea_pertanyaan, #mytextarea_jawaban'
        });

        $(document).ready(function() {
            // Function to initialize Dropify
            function initializeDropify() {
                $('.dropify').dropify({
                    messages: {
                        default: 'Upload Image',
                        replace: 'Replace Image',
                        remove: 'Remove',
                        error: 'Error: File upload failed.'
                    }
                });
            }
            var currentImageNum = 1;

            // Initialize Dropify on page load
            initializeDropify();

            // Attach click event to delete image button
            $('.image-preview-container').on('click', '.delete-image-btn', function() {
                var imageIndex = $(this).data('image-index');
                removeImage(imageIndex);
            });

            function AddDropify() {
                if (currentImageNum >= maxImages) {
                    alert('Maximum ' + maxImages + ' images allowed.');
                    return;
                }

                currentImageNum++;
                var newImageInput = '<label for="image_' + currentImageNum + '" class="form-label">Photo ' +
                    currentImageNum +
                    '</label>';
                newImageInput += '<button type="button" style="margin-left: 95%" onclick="RemoveDropify(' +
                    currentImageNum +
                    ')" class="btn btn-danger"><i class="fa fa-close"></i></button>';
                newImageInput += '<input type="file" class="dropify custom-dropify" name="image_' +
                    currentImageNum +
                    '" data-max-file-size="1M" data-allowed-file-extensions="jpg jpeg png gif" data-default-file="">';

                // Remove this line: newImageInput += '</div>';

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

            function removeImage(index) {
                var $imagePreview = $('.image' + index);
                $imagePreview.remove();
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


            // Function to handle the maximum number of files
            $('.dropify').on('dropify.afterClear', function(event, element) {
                var maxFiles = 2;
                var files = $('.dropify').dropify('getFilesCount');
                if (files > maxFiles) {
                    $('.dropify').val('');
                    alert('You can only upload a maximum of ' + maxFiles + ' files.');
                }
            });

            $('.dropify').on('dropify.errors', function(event, errors) {
                var $input = $(this);
                var invalidFiles = errors.join(', ');

                $input.dropify('resetPreview');
                $input.val('');
                alert('Invalid file(s) selected: ' + invalidFiles + '.');
            });

            // Function to handle form submission
            $('#editInfoForm').on('submit', function(e) {
                // Prevent default form submission
                e.preventDefault();

                // Remove the deleted images from the form submission
                $('.image-preview-container input[type="hidden"]').each(function() {
                    var index = $(this).data('image-index');
                    var fieldName = 'image_' + index;
                    var hiddenInput = '<input type="hidden" name="' + fieldName + '" value="1">';
                    $(this).after(hiddenInput);
                });

                // Submit the form
                this.submit();
            });
        });
    </script>
@endsection
