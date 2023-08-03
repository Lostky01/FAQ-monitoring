@extends('layouts.app-front-v2_1')

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
      <div class="block-title__text"><span>Edit FAQ</span></div>
    </div>
    <div class="col-md-6 offset-md-3">
      <form method="POST" action="" class="mb-5" enctype="multipart/form-data" id="editInfoForm">
        @csrf
        <!-- @method('PUT') -->

        <div class="row">
          <div class="col-md-12 mb-3">
            <label for="InputProjectId" class="form-label">Nama Client</label><br>
            <select class="js-example-basic-single" name="id_client" id="select-client" required>
              <option value="" disabled>Select Client</option>
              @foreach ($client as $key => $clients)
              <option value="{{ $key }}" {{ $data->id_project == $key ? 'selected' : '' }}>
                {{ $clients }}
              </option>
              @endforeach
            </select>
          </div>
          <div class="col-md-12 mb-3">
            <label for="InputProjectId" class="form-label">Nama Site</label><br>
            <select class="js-example-basic-single" name="id_site" id="select-project" required>
              <option value="" disabled>Select Site</option>
              <!-- {{--@foreach ($sites as $key => $site) -->
              <!-- <option value="{{ $key }}" {{ $data->id_site == $key ? 'selected' : '' }}> -->
              <!-- {{ $site }} -->
              <!-- </option> -->
              <!-- @endforeach--}} -->
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 mb-3">
            <label for="title" class="form-label">Pertanyaan</label>
            <textarea id="mytextarea_pertanyaan" name="pertanyaan">{{ $data->pertanyaan }}</textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 mb-3">
            <label for="description" class="form-label">Jawaban</label>
            <textarea id="mytextarea_jawaban" name="jawaban">{{ $data->jawaban }}</textarea>
          </div>
        </div>
        <div class="row">
          {{-- <div class="col-md-12 mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" name="created_at" value="{{ $data->created_at }}">
        </div> --}}
        <div class="col-md-12 mb-3 image1">
          <label for="image_1" class="form-label">Image 1</label>
          <div class="image-preview-container">
            @php
            $imageUrl1 = $data->image_url ?? null;
            @endphp
            @if ($imageUrl1)
            <div class="image-preview">
              <img src="{{ asset('public/image_info/' . $imageUrl1) }}" alt="Image 1" class="w-100">
              <input type="hidden" name="delete_image_1" value="0">
              <button type="button" class="delete-image-btn" data-image-index="1">Remove</button>
            </div>
            @else
            <div class="image-preview">
              <input type="file" class="dropify" name="image_1" data-max-file-size="1M" data-allowed-file-extensions="jpg jpeg png gif">
            </div>
            @endif
          </div>
        </div>
        <div class="col-md-12 mb-3 image2">
          <label for="image_2" class="form-label">Image 2</label>
          <div class="image-preview-container">
            @php
            $imageUrl2 = $data->image_url2 ?? null;
            @endphp
            @if ($imageUrl2)
            <div class="image-preview">
              <img src="{{ asset('public/image_info/' . $imageUrl2) }}" alt="Image 2" class="w-100">
              <input type="hidden" name="delete_image_2" value="0">
              <button type="button" class="delete-image-btn" data-image-index="2">Remove</button>
            </div>
            @else
            <div class="image-preview">
              <input type="file" class="dropify" name="image_2" data-max-file-size="1M" data-allowed-file-extensions="jpg jpeg png gif">
            </div>
            @endif
          </div>
        </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="d-flex align-items-center">
          <button type="button" id="PlusImage" onclick="AddDropify()" class="custom-button">
            <i class="fas fa-plus"></i>
          </button>
          <button type="button" id="MoveImage" onclick="MoveDropify()" class="custom-button">
            <i class="fas fa-trash"></i>
          </button>
        </div>
      </div>
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
<script src="https://cdn.jsdelivr.net/npm/dropify/dist/js/dropify.min.js"></script>
<script src="https://cdn.tiny.cloud/1/iaklx4npf5s3iruz98j0rjkzc7j45t421qjfu97jd0fmmzvs/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
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

    //// trigger click client
    $("#select-client").trigger('change');
  });

  //// jquery show site by select client 
  $("#select-client").on('change', function() {
    var id = this.value;
    let oldSite = "{{ $data->id_site }}";

    // console.log(id);
    // console.log('old site: '+oldSite);
    $.ajax({
      method: 'get',
      url: "{{ url('get-site-by') }}/" + id, // Pass the id parameter
      success: function(result) {
        if (result.msg == 'berhasil') {
          let datas = result.datas;

          // console.log(datas);
          $('#select-project').find('option').remove().end();

          if (datas.length == 0) {
            $('#select-project').append('<option value="#">Not Found</option>');
          } else {

            $('#select-project').append('<option value="">Pilih Site</option>');

            for (let i = 0; i < datas.length; i++) {
              // const element = array[index];
              let indId = datas[i]['id'];

              if (oldSite == indId) {
                // console.log('selected!!!');
                $('#select-project').append('<option value="' + datas[i]['id'] + '" selected>' + datas[i]['name'] + '</option>');
              } else {

                $('#select-project').append('<option value="' + datas[i]['id'] + '">' + datas[i]['name'] + '</option>');
              }
            }
          }
        } else {
          $('#select-project').find('option').remove().end();
          $('#select-project').append('<option value="#">Not Found</option>');
          $('#select-project').trigger('change');
          $('#select-project').select2({
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
@endsection