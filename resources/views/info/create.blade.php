@extends('layouts.app-front')

@section('css')
    <style>
        .submit-button {
            display: flex;
            justify-content: center;
        }
    </style>
@endsection

@section('content')
    <section class="service-one my-5">
        <div class="container">
            <div class="block-title text-center">
                <div class="block-title__text"><span>Input Info</span></div>
            </div>
            <div class="col-md-6 offset-3">
                <form action="{{ url('info') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="project" class="form-label">Nama Project</label><br>
                            <select class="js-example-basic-single" id="select-project" name="project">
                                <option value="" selected disabled>Pilih Project</option>
                                @foreach ($projects as $key => $item)
                                    <option value="{{ $key }}" {{ old('project') == $key ? 'selected' : '' }}>
                                        {{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="domain" class="form-label">Nama Domain</label><br>
                            <select class="js-example-basic-single form-control" id="select-domain" name="domain">
                                <option value="" selected disabled>Pilih Project Terlebih Dahulu</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea id="mytextarea" name="description">{{ old('description') }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" name="date" value="{{ old('date') }}">
                        </div>
                    </div>
                    <div class="row" id="list_image">
                        <div class="col-md-12 mb-3 image1">
                            <label for="image_1" class="form-label">Image 1</label>
                            <input type="file" class="dropify" name="image_1" data-max-file-size="1M"
                                data-allowed-file-extensions="jpg jpeg png gif" image_list="1">
                        </div>
                        <button type="button" id="PlusImage" onclick="AddDropify()"><i class="fa-solid fa-plus fa-beat"></i></p></button>
                        <button type="button" id="MoveImage" onclick="MoveDropify()">hapus gambar</button>
                    </div>
                    <div class="row submit-button">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('js_after')
    <script src="https://cdn.tiny.cloud/1/iaklx4npf5s3iruz98j0rjkzc7j45t421qjfu97jd0fmmzvs/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea'
        });

        var maxImages = 2;
        var currentImageNum = 1;

        function AddDropify() {
            if (currentImageNum >= maxImages) {
                alert('Maximum ' + maxImages + ' images allowed.');
                return;
            }

            currentImageNum++;
            var newImageInput = '<div class="col-md-12 mb-3 image' + currentImageNum + '">';
            newImageInput += '<label for="image_' + currentImageNum + '" class="form-label">Image ' + currentImageNum + '</label>';
            newImageInput += '<input type="file" class="dropify" name="image_' + currentImageNum + '" data-max-file-size="1M"';
            newImageInput += ' data-allowed-file-extensions="jpg jpeg png gif">';
            newImageInput += '</div>';
            $("#list_image").append(newImageInput);
            $('.dropify').dropify();
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
                url: "{{ route('info.getDomain', ':id') }}".replace(':id', id), // Pass the id parameter
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
