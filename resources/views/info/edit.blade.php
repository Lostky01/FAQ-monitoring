@extends('layouts.app-front')

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dropify/dist/css/dropify.min.css">
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
    </style>
@endsection

@section('content')
    <section class="service-one my-5" id="services">
        <div class="container">
            <div class="block-title text-center">
                <div class="block-title__text"><span>Edit Info</span></div>
            </div>
            <div class="col-md-6 offset-md-3">
                <form method="POST" action="{{ route('info.update', $data->id) }}" class="mb-5"
                    enctype="multipart/form-data" id="editInfoForm">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="InputProjectId" class="form-label">Nama Project</label><br>
                            <select class="js-example-basic-single" name="project" id="select-project">
                                <option value="" disabled>Pilih Project</option>
                                @foreach ($projects as $key => $item)
                                    <option value="{{ $key }}" @if ($key == $data->project_id) selected @endif>
                                        {{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="InputProjectId" class="form-label">Nama Domain</label><br>
                            <select class="js-example-basic-single" name="domain" id="select-domain">
                                <option value="" disabled>Pilih Domain</option>
                                @foreach ($domains as $key => $item)
                                    <option value="{{ $key }}" @if ($key == $data->domain_id) selected @endif>
                                        {{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="Inputname" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $data->title }}">
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="Inputname" class="form-label">Description</label>
                            <textarea id="mytextarea" name="description">{{ $data->description }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="Inputname" class="form-label">Date</label>
                            <input type="date" class="form-control" name="date" value="{{ $data->date }}">
                        </div>
                    </div>
                    <div id="list_image">
                        <!-- Image 1 -->
                        <div class="col-md-12 mb-3 image1">
                            <label for="image_1" class="form-label">Image 1</label>
                            <div class="image-preview-container">
                                @php
                                    $imageUrl1 = $data->image_url ?? null;
                                @endphp
                                @if ($imageUrl1)
                                    <div class="image-preview">
                                        <img src="{{ asset('image_info/' . $imageUrl1) }}" alt="Image 1">
                                        <input type="hidden" name="delete_image_1" value="0">
                                        <button type="button" class="delete-image-btn" data-image-index="1">Remove</button>
                                    </div>
                                @else
                                    <div class="image-preview">
                                        <input type="file" class="dropify" name="image_1" data-max-file-size="1M"
                                            data-allowed-file-extensions="jpg jpeg png gif">
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Image 2 -->
                        <div class="col-md-12 mb-3 image2">
                            <label for="image_2" class="form-label">Image 2</label>
                            <div class="image-preview-container">
                                @php
                                    $imageUrl2 = $data->image_url2 ?? null;
                                @endphp
                                @if ($imageUrl2)
                                    <div class="image-preview">
                                        <img src="{{ asset('image_info/' . $imageUrl2) }}" alt="Image 2">
                                        <input type="hidden" name="delete_image_2" value="0">
                                        <button type="button" class="delete-image-btn" data-image-index="2">Remove</button>
                                    </div>
                                @else
                                    <div class="image-preview">
                                        <input type="file" class="dropify" name="image_2" data-max-file-size="1M"
                                            data-allowed-file-extensions="jpg jpeg png gif">
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Image 3 -->
                        <div class="col-md-12 mb-3 image3">
                            <label for="image_3" class="form-label">Image 3</label>
                            <div class="image-preview-container">
                                @php
                                    $imageUrl3 = $data->image_url3 ?? null;
                                @endphp
                                @if ($imageUrl3)
                                    <div class="image-preview">
                                        <img src="{{ asset('image_info/' . $imageUrl3) }}" alt="Image 3">
                                        <input type="hidden" name="delete_image_3" value="0">
                                        <button type="button" class="delete-image-btn" data-image-index="3">Remove</button>
                                    </div>
                                @else
                                    <div class="image-preview">
                                        <input type="file" class="dropify" name="image_3" data-max-file-size="1M"
                                            data-allowed-file-extensions="jpg jpeg png gif">
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Image 4 -->
                        <div class="col-md-12 mb-3 image4">
                            <label for="image_4" class="form-label">Image 4</label>
                            <div class="image-preview-container">
                                @php
                                    $imageUrl4 = $data->image_url4 ?? null;
                                @endphp
                                @if ($imageUrl4)
                                    <div class="image-preview">
                                        <img src="{{ asset('image_info/' . $imageUrl4) }}" alt="Image 4">
                                        <input type="hidden" name="delete_image_4" value="0">
                                        <button type="button" class="delete-image-btn" data-image-index="4">Remove</button>
                                    </div>
                                @else
                                    <div class="image-preview">
                                        <input type="file" class="dropify" name="image_4" data-max-file-size="1M"
                                            data-allowed-file-extensions="jpg jpeg png gif">
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <button type="button" id="PlusImage" onclick="AddDropify()">
                        Tambah gambar
                    </button>
                    <button type="button" id="MoveImage" onclick="MoveDropify()">
                        Hapus gambar
                    </button>

                    <button type="submit" class="btn btn-primary mt-5">Submit</button>
                </form>
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
            selector: '#mytextarea'
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

            // Initialize Dropify on page load
            initializeDropify();

            // Attach click event to delete image button
            $('.image-preview-container').on('click', '.delete-image-btn', function() {
                var imageIndex = $(this).data('image-index');
                removeImage(imageIndex);
            });

            // Function to remove the image and delete button
            function removeImage(index) {
                var $imagePreview = $('.image' + index);
                $imagePreview.find('img').remove();
                $imagePreview.find('input[type="file"]').remove();
                $imagePreview.find('input[type="hidden"]').val('1');
                $imagePreview.find('.delete-image-btn').remove();
                $imagePreview.append('<input type="file" class="dropify" name="image_' + index +
                    '" data-max-file-size="1M" data-allowed-file-extensions="jpg jpeg png gif">');
                initializeDropify();
            }

            // Function to handle the maximum number of files
            $('.dropify').on('dropify.afterClear', function(event, element) {
                var maxFiles = 4;
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
