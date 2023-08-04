@extends('layouts.app-front')

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dropify/dist/css/dropify.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .desktop-show {
            display: block;
        }

        .mobile-show {
            display: none;
        }

        @media screen and (max-width: 450px) {
            .desktop-show {
                display: none;
            }

            .mobile-show {
                display: block;
            }
        }

        /* @media screen and (min-width: 350px) {

                        .desktop-show {
                            display: none;
                        }

                        .mobile-show {
                            display: block;
                        }

                    } */


        #tomboladd-mobile {
            display: none;
        }

        button.plus {
            display: none;
        }
    </style>
@endsection

@section('content')
    <section class="service-one my-5 desktop-show">
        <div class="container-fluid">
            <div class="row justify-content-left">
                <div class="col-lg-12">
                    <div class="outer-box p-5 shadow-lg rounded">
                        <div class="block-title text-left">
                            <div class="block-title__text"><span>Edit FAQ</span></div>
                        </div>
                        <form action="{{ route('FAQ.update', $data->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <!-- Date -->
                                <div class="col-sm-5">
                                    <label for="date" class="form-label">Date</label>
                                    <input type="date" class="form-control" name="created_at"
                                        value="{{ $data->created_at }}">
                                </div>
                                <div class="col-sm-5">
                                    <label for="project" class="form-label">Pilih Client</label>
                                    <select class="js-example-basic-single form-control" id="select-project"
                                        name="id_project">
                                        <option value="" selected disabled>Pilih Client</option>
                                        @foreach ($project as $key => $item)
                                            <option value="{{ $key }}"
                                                {{ $data->id_project == $key ? 'selected' : '' }}>
                                                {{ $item }}</option>
                                        @endforeach
                                    </select>
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
                                    <textarea id="{{-- mytextarea_pertanyaan --}}" style="height: 218px" class="form-control" name="pertanyaan"><?php echo strip_tags($data->pertanyaan); ?></textarea>
                                </div>
                                <!-- Jawaban -->
                                <div class="col-sm-5">
                                    <label for="description" class="form-label">Jawaban</label>
                                    <textarea id="{{-- mytextarea_jawaban --}}" style="height: 218px" class="form-control" name="jawaban"><?php echo strip_tags($data->jawaban); ?></textarea>
                                </div>
                            </div>
                            <hr>
                            <button type="button" id="PlusImage" onclick="AddDropify('desktop')" class="btn btn-primary"
                                res="desktop">
                                + Tambah Gambar
                            </button>

                            <div class="row mb-3" id="list_image_desktop">
                                <!-- Image 1 -->
                                <div class="col-sm-3" id="additional_images1_desktop">
                                    @php
                                        $imageUrl1 = $data->image_url ?? null;
                                    @endphp
                                    @if ($imageUrl1)
                                        <label for="image_1" class="form-label">Photo 1</label>
                                        <button type="button" style="margin-left: 95%" id="MoveImage"
                                            onclick="MoveDropify('desktop')" res="desktop" class="btn btn-danger">
                                            <i class="fa fa-close"></i>
                                        </button>
                                        <input type="file" class="dropify" name="image_1" data-max-file-size="1M"
                                            data-allowed-file-extensions="jpg jpeg png gif" image_list="1"
                                            data-default-file="{{ asset('image_info/' . $imageUrl1) }}">
                                    @else
                                        <label for="image_1" class="form-label">Photo 1</label>
                                        <button type="button" style="margin-left: 95%" id="MoveImage"
                                            onclick="MoveDropify('desktop')" res="desktop" class="btn btn-danger">
                                            <i class="fa fa-close"></i>
                                        </button>
                                        <input type="file" class="dropify" name="image_1" data-max-file-size="1M"
                                            data-allowed-file-extensions="jpg jpeg png gif" image_list="1"
                                            data-default-file="">
                                    @endif
                                </div>
                                <div class="col-sm-3" id="additional_images2_desktop">
                                    @php
                                        $imageUrl2 = $data->image_url2 ?? null;
                                    @endphp
                                    @if ($imageUrl2)
                                        <label for="image_2" class="form-label">Photo 2</label>
                                        <button type="button" style="margin-left: 95%" id="MoveImage"
                                            onclick="MoveDropify()" class="btn btn-danger">
                                            <i class="fa fa-close"></i>
                                        </button>
                                        <input type="file" class="dropify" name="image_2" data-max-file-size="1M"
                                            data-allowed-file-extensions="jpg jpeg png gif" image_list="1"
                                            data-default-file="{{ asset('image_info/' . $imageUrl2) }}">
                                    @else
                                        <label for="image_2" class="form-label">Photo 1</label>
                                        <button type="button" style="margin-left: 95%" id="MoveImage"
                                            onclick="MoveDropify()" class="btn btn-danger">
                                            <i class="fa fa-close"></i>
                                        </button>
                                        <input type="file" class="dropify" name="image_2" data-max-file-size="1M"
                                            data-allowed-file-extensions="jpg jpeg png gif" image_list="1"
                                            data-default-file="">
                                    @endif
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-md-6">
                                    <div class="submit-button text-right responsive-button">
                                        <button type="submit" class="btn btn-primary" id="tomboladd"
                                            style=" float: right; background-color: #FFB22B">Edit FAQ List</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="service-one my-5 mobile-show">
        <div class="container-fluid">
            <div class="row justify-content-left">
                <div class="col-lg-12">
                    <div class="outer-box p-5 shadow-lg rounded">
                        <div class="block-title text-left">
                            <div class="block-title__text"><span>Edit FAQ</span></div>
                        </div>
                        <form action="{{ route('FAQ.update', $data->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <!-- Date -->
                                <div class="col-sm-5">
                                    <label for="date" class="form-label">Date</label>
                                    <input type="date" class="form-control" name="created_at"
                                        value="{{ $data->created_at }}">
                                </div>
                                <div class="col-sm-5">
                                    <label for="project" class="form-label">Pilih Client</label>
                                    <select class="js-example-basic-single form-control" id="select-project"
                                        name="id_project">
                                        <option value="" selected disabled>Pilih Client</option>
                                        @foreach ($project as $key => $item)
                                            <option value="{{ $key }}"
                                                {{ $data->id_project == $key ? 'selected' : '' }}>
                                                {{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Pilih Site options -->
                                <div class="col-sm-5">
                                    <label for="project" class="form-label">Nama Site</label>
                                    <select class="js-example-basic-single form-control" id="select-project"
                                        name="id_site">
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
                                    <textarea id="{{-- mytextarea_pertanyaan --}}" style="height: 218px" class="form-control" name="pertanyaan"><?php echo strip_tags($data->pertanyaan); ?></textarea>
                                </div>
                                <!-- Jawaban -->
                                <div class="col-sm-5">
                                    <label for="description" class="form-label">Jawaban</label>
                                    <textarea id="{{-- mytextarea_jawaban --}}" style="height: 218px" class="form-control" name="jawaban"><?php echo strip_tags($data->jawaban); ?></textarea>
                                </div>
                            </div>
                            <hr>
                            <div class="row mb-3" id="list_image_mobile">
                                <!-- Image 1 -->
                                <div class="col-sm-3" id="additional_images1_mobile">
                                    @php
                                        $imageUrl1 = $data->image_url ?? null;
                                    @endphp
                                    @if ($imageUrl1)
                                        <label for="image_1" class="form-label">Photo 1</label>
                                        <button type="button" style="margin-left: 95%" id="MoveImage"
                                            onclick="MoveDropify('mobile')" class="btn btn-danger">
                                            <i class="fa fa-close"></i>
                                        </button>
                                        <input type="file" class="dropify" name="image_1" data-max-file-size="1M"
                                            data-allowed-file-extensions="jpg jpeg png gif" image_list="1"
                                            data-default-file="{{ asset('image_info/' . $imageUrl1) }}">
                                    @else
                                        <label for="image_1" class="form-label">Photo 1</label>
                                        <button type="button" style="margin-left: 95%" id="MoveImage"
                                            onclick="MoveDropify('mobile')" class="btn btn-danger">
                                            <i class="fa fa-close"></i>
                                        </button>
                                        <input type="file" class="dropify" name="image_1" data-max-file-size="1M"
                                            data-allowed-file-extensions="jpg jpeg png gif" image_list="1"
                                            data-default-file="">
                                    @endif
                                </div>
                                <div class="col-sm-3" id="additional_images2_mobile">
                                    @php
                                        $imageUrl2 = $data->image_url2 ?? null;
                                    @endphp
                                    @if ($imageUrl2)
                                        <label for="image_2" class="form-label">Photo 2</label>
                                        <button type="button" style="margin-left: 95%" id="MoveImage"
                                            onclick="MoveDropify()" class="btn btn-danger">
                                            <i class="fa fa-close"></i>
                                        </button>
                                        <input type="file" class="dropify" name="image_2" data-max-file-size="1M"
                                            data-allowed-file-extensions="jpg jpeg png gif" image_list="1"
                                            data-default-file="{{ asset('image_info/' . $imageUrl2) }}">
                                    @else
                                        <label for="image_2" class="form-label">Photo 2</label>
                                        <button type="button" style="margin-left: 95%" id="MoveImage"
                                            onclick="MoveDropify()" class="btn btn-danger">
                                            <i class="fa fa-close"></i>
                                        </button>
                                        <input type="file" class="dropify" name="image_2" data-max-file-size="1M"
                                            data-allowed-file-extensions="jpg jpeg png gif" image_list="1"
                                            data-default-file="">
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 d-flex justify-content-center">
                                    <div class="button responsive-button sb-1">
                                        <button type="button" id="PlusImage" onclick="AddDropify('mobile')"
                                            class="btn btn-primary btn-block"
                                            style="background-color:#2290FF;
                                        ">
                                            + Add Screenshot
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-6 d-flex justify-content-center">
                                    <div class="submit-button responsive-button mt-3">
                                        <button type="submit" class="btn btn-primary btn-block col-md-8" id="tomboladd"
                                            style="background-color:#ECA918;
                                        2B;">
                                            Edit FAQ List
                                        </button>
                                    </div>
                                </div>
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


        var maxImages = 2;
        var currentImageNum = 1;

        function MoveDropify(res) {
            if (res == 'desktop') {
                var lastRow = $('#additional_images2_desktop');
                lastRow.remove();
                if (currentImageNum === 0) {
                    var firstImageRow = $('#additional_images1_desktop');
                    firstImageRow.remove();
                }

                // Add hidden input fields for image deletion
                if (currentImageNum === 0) {
                    $('#list_image_desktop').append('<input type="hidden" name="delete_image_1" value="0">');
                } else if (currentImageNum === 1) {
                    $('#list_image_desktop').append('<input type="hidden" name="delete_image_2" value="0">');
                }
            } else {
                var lastRow = $('#additional_images2_mobile');
                lastRow.remove();
                if (currentImageNum === 0) {
                    var firstImageRow = $('#additional_images1_mobile');
                    firstImageRow.remove();
                }

                // Add hidden input fields for image deletion
                if (currentImageNum === 0) {
                    $('#list_image_mobile').append('<input type="hidden" name="delete_image_1" value="0">');
                } else if (currentImageNum === 1) {
                    $('#list_image_mobile').append('<input type="hidden" name="delete_image_2" value="0">');
                }
            }

            currentImageNum--;
        }
        /*    currentImageNum = 1; */

        function AddDropify(res) {
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
            if (res == 'desktop') {
                document.getElementById('additional_images_desktop').appendChild(newRow);
            } else {
                document.getElementById('additional_images_mobile').appendChild(newRow);
            }

            $('.custom-dropify').last().dropify();
            $('.image' + currentImageNum + ' .dropify').dropify();
        }

        function RemoveDropify(imageNum) {
            var imageContainer = $('#additional_images .col-sm-3').eq(imageNum - 1);
            var dropifyInput = imageContainer.find('.dropify');
            dropifyInput.val('');
            dropifyInput.dropify('resetPreview');
        }



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
                    var hiddenInput = '<input type="hidden" name="' + fieldName +
                        '" value="1">';
                    $(this).after(hiddenInput);
                });

                // Submit the form
                this.submit();
            });
        });
    </script>
@endsection
