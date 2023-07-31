@extends('layouts.app-front')

@section('css')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<style>
    .flatpickr-input[readonly]{
        background: #ffffff !important;
    }
</style>
@endsection

@section('content')

    <section class="service-one my-5" id="services">
        <div class="container">
            <div class="block-title text-center">
                <div class="block-title__text"><span>Edit Case</span></div><!-- /.block-title__text -->
            </div><!-- /.block-title -->
            <form method="post" action="{{url('edit-input-cases/'.$data->id)}}" class="mb-5" id="form-case" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    
                    <div class="col-md-2 col-lg-2">
                        <label for="Inputname" class="form-label">Date</label>
                        <input type="text" class="form-control date" autocomplete="off" id="date" name="date"  value="{{ $data->date == "" ? date('d-m-Y') : date('d-m-Y',strtotime($data->date)) }}">
                    </div>
                    <div class="col-md-2 col-lg-2 ">
                        <label for="InputProjectId" class="form-label">Site</label><br>
                        <select class="js-example-basic-single form-control" id="site" name="site">
                            @foreach ($site as $key => $item)
                                <option value="{{ $key }}" {{ $data->site == $key ? 'selected' : '' }}>{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-2 col-lg-2 ">
                        <label for="InputProjectId" class="form-label">Pilih Waktu</label><br>
                        <select class="js-example-basic-single form-control" id="kerja" name="kerja">
                            @foreach ($kerja as $key => $item)
                                <option value="{{ $key }}" {{ $data->kerja == $key ? 'selected' : '' }}>{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3 col-lg-3">
                        <label for="Inputname" class="form-label">User</label>
                        <input type="text" class="form-control" id="user" name="user" value="{{ $data->user }}">
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <label for="Inputname" class="form-label">Case</label>
                        <textarea  id="case" class="form-control" name="masalah" rows="3">{{ $data->masalah }}</textarea>
                    </div>
                </div>
           
                <div class="row">
                    <div class="col-md-2 col-lg-2">
                        <label for="Inputname" class="form-label">Open</label>
                        <input type="text" class="form-control open_time time" id="open_time" name="open_time" value="{{ $data->open_time }}">
                    </div>
                    <div class="col-md-2 col-lg-2">
                        <label for="Inputname" class="form-label">Close</label>
                        <input type="text" class="form-control close_time time" id="close_time" name="close_time" value="{{ $data->close_time }}">
                    </div>
                    <div class="col-md-2 col-lg-2">
                        <label for="Inputname" class="form-label">Resolve Time</label>
                        <input type="text" class="form-control resolve_min" readonly id="resolve_min" name="resolve_min" value="{{ $data->resolve_min }}">
                    </div>
                    <div class="col-md-2 col-lg-2">
                        <label for="Inputname" class="form-label">Response</label>
                        <input type="text" class="form-control response_time time" id="response_time" name="response_time" value="{{ $data->response_time }}">
                    </div>
                    <div class="col-md-2 col-lg-2">
                        <label for="Inputname" class="form-label">Response Time</label>
                        <input type="text" class="form-control response_min" readonly id="response_min" name="response_min" value="{{ $data->response_min }}">
                    </div>
                </div>
                @php
                     $class_selector = "";
                @endphp
                <div id="input-ss-wrapper" class="row mx-0">
                 
                    @if(count($img) > 0)
                        <div class="col-md-12 col-lg-12 case0">
                            <div class="row my-3 baris-ss" id="input-ss0">
                                
                                @foreach ($img as $k => $item)
                                
                                                @php
                                                $class_selector .= ".dropify0_".$k;
                                                if($k != count($img)-1){
                                                    $class_selector .= ",";
                                                }
                                                @endphp
                                <div class="ss-1 col-md-2 col-lg-2">
                                    <label class="labelPhoto">Photo {{ $k+1 }}</label>
                                    <button class="remove btn btn-sm btn-danger" type="button">
                                        <i class="fa fa-times"></i>
                                    </button>
                                    <div class="inputFile mt-2">
                                        <input type="file" id="input-file-max-fs" name="photo0_{{ $k }}" class="dropify0_{{ $k }} fileInputs" accept=".jpg,.png,.jpeg" {{ $item->img != "" ? '' : 'required' }} data-default-file="{{ asset('public/img/ss/'.$item->img) }}" data-allowed-file-extensions="jpg png jpeg" data-max-file-size="1M" />
                                    </div>
                                    <p class="message-danger-input"><i>Format: jpg, jpeg, png maks 1Mb</i></p>                                        
                                    <input type="hidden" name="old_file[]" class="old_file"  value="{{ $item->img }}">
                                    <input type="hidden" name="jumFile[]" class="jumFile" value="{{ '0' }}">
                                </div>
                                @endforeach
                            </div>
                        </div>
                    
                    @else

                    <div class="col-md-12 col-lg-12 case0">
                        <div class="row my-3 baris-ss" id="input-ss0">
                            <div class="ss-1 col-md-2 col-lg-2">
                                <label class="labelPhoto">Photo {{ '1' }}</label>
                                <button class="remove btn btn-sm btn-danger" type="button">
                                    <i class="fa fa-times"></i>
                                </button>
                                <div class="inputFile mt-2">
                                    <input type="file" id="input-file-max-fs" name="photo0_{{ '0' }}" class="dropify0_0 fileInputs" accept=".jpg,.png,.jpeg"   data-allowed-file-extensions="jpg png jpeg" data-max-file-size="1M" />
                                </div>
                                <p class="message-danger-input"><i>Format: jpg, jpeg, png maks 1Mb</i></p>                                        
                                <input type="hidden" name="old_file[]" class="old_file"  value="{{ '' }}">
                                <input type="hidden" name="jumFile[]" class="jumFile" value="{{ '0' }}">
                            </div>
                        </div>
                    </div>

                    @endif
                </div>
                <div class="row my-3">
                    <div class="col-md-2 form-group col-lg-2 pull-right">
                        <button class="btn btn-icon btn-sm btn-noborder btn-info text-white w-100 font-size-sm" id="btn-add-ss" type="button"><i class="fa fa-plus"></i>&nbsp;Add Screenshoot</button>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <table class="table table-bordered w-100" id="table-case">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-center">NO</th>
                                    <th>TANGGAL</th>
                                    <th>SITE/USER</th>
                                    <th>WAKTU CASE</th>
                                    <th>USERS</th>
                                    <th>CASE</th>
                                    <th>OPEN - CLOSE</th>
                                    <th>OPEN - RESPONSE</th>
                                    <th class="text-center">ACTION</th>
                                </tr>
                            </thead>
                            <tbody id="tbody_case">
                                <tr id="kosong">
                                    <td colspan="8" class="text-center">Case Kosong</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> --}}


                <button type="button" class="btn btn-primary mt-5" id="button-submit">Submit</button>
            </form>
        </div><!-- /.container -->
    </section><!-- /.service-one -->
    
@endsection

@section('js_after')

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    $(".date").flatpickr({
        dateFormat: "d-m-Y",
    });

    const setTimeFormat = {
        dateFormat: "H:i",
        time_24hr: true,
        enableTime: true,
        noCalendar: true,
    };
    $(".time").flatpickr(setTimeFormat);

    function getDif(jam,menit,jam_selesai_get,menit_selesai_get){
        var today_mulai = new Date(2020, 10, 21, jam, menit, 0, 0);
        var today_selesai = new Date(2020, 10, 21, jam_selesai_get, menit_selesai_get, 0, 0);
        var difference = today_selesai.getTime() - today_mulai.getTime();

        return difference;
   }

   function diffMin(diff){
        return Math.round(diff / 60000);
   }

    jQuery(document).delegate('#open_time', 'change', function(e) {
    var jam_selesai = $('#close_time').val();
    var jam_mulai = $(this).val();
    if (jam_selesai != "") {
        var explode_selesai = jam_selesai.split(":");
        var jam_selesai_get = explode_selesai[0];
        var menit_selesai_get = explode_selesai[1];
        var jam_set = new Date(2020, 10, 21, jam_selesai_get, menit_selesai_get, 0, 0);
        // $('#close_time').flatpickr({defaultDate: jam_set});
    }else{
        var jam_set = new Date(2020, 10, 21, 12, 0, 0, 0);
        
        // $('#close_time').flatpickr({defaultDate: jam_set});
        var jam_selesai_get = 12;
        var menit_selesai_get = 00;
    }

    $('#close_time').flatpickr(setTimeFormat);

    if (jam_mulai != "") {
        var explode = jam_mulai.split(":");
        var jam = explode[0];
        var menit = explode[1];

       
    }else{
        var jam_set = new Date(2020, 10, 21, 12, 0, 0, 0);
        $('#open_time').flatpickr(setTimeFormat);
        // $('#open_time').flatpickr({defaultDate: jam_set});
        var jam = 12;
        var menit = 00;

     
    }

        var difference = getDif(jam,menit,jam_selesai_get,menit_selesai_get);
        var diffMins = diffMin(difference);
        $('#resolve_min').val(diffMins);
        $('#response_time').trigger('change');
});

    jQuery(document).delegate('#close_time', 'change', function(e) {
    var jam_selesai = $(this).val();
    var jam_mulai = $('#open_time').val();
    if (jam_selesai != "") {
        var explode_selesai = jam_selesai.split(":");
        var jam_selesai_get = explode_selesai[0];
        var menit_selesai_get = explode_selesai[1];
        var jam_set = new Date(2020, 10, 21, jam_selesai_get, menit_selesai_get, 0, 0);

        $('#close_time').flatpickr(setTimeFormat);
        // $('#close_time').flatpickr({defaultDate: jam_set});
    }else{
        var jam_set = new Date(2020, 10, 21, 12, 0, 0, 0);

        $('#close_time').flatpickr(setTimeFormat);
        // $('#close_time').flatpickr({defaultDate: jam_set});
        var jam_selesai_get = 12;
        var menit_selesai_get = 00;
    }

    if (jam_mulai != "") {
        var explode = jam_mulai.split(":");
        var jam = explode[0];
        var menit = explode[1];

       
    }else{
        var jam_set = new Date(2020, 10, 21, 12, 0, 0, 0);

        $('#open_time').flatpickr(setTimeFormat);
        // $('#open_time').flatpickr({defaultDate: jam_set});
        var jam = 12;
        var menit = 00;

        
    }

    var difference = getDif(jam,menit,jam_selesai_get,menit_selesai_get);
    var diffMins = diffMin(difference);
    $('#resolve_min').val(diffMins);
});

jQuery(document).delegate('#response_time', 'change', function(e) {
    var jam_selesai = $(this).val();
    var jam_mulai = $('#open_time').val();
    if (jam_selesai != "") {
        var explode_selesai = jam_selesai.split(":");
        var jam_selesai_get = explode_selesai[0];
        var menit_selesai_get = explode_selesai[1];
        var jam_set = new Date(2020, 10, 21, jam_selesai_get, menit_selesai_get, 0, 0);

        $('#response_time').flatpickr(setTimeFormat);
        // $('#close_time').flatpickr({defaultDate: jam_set});
    }else{
        var jam_set = new Date(2020, 10, 21, 12, 0, 0, 0);

        $('#response_time').flatpickr(setTimeFormat);
        // $('#close_time').flatpickr({defaultDate: jam_set});
        var jam_selesai_get = 12;
        var menit_selesai_get = 00;
    }

    if (jam_mulai != "") {
        var explode = jam_mulai.split(":");
        var jam = explode[0];
        var menit = explode[1];

       
    }else{
        var jam_set = new Date(2020, 10, 21, 12, 0, 0, 0);

        $('#open_time').flatpickr(setTimeFormat);
        // $('#open_time').flatpickr({defaultDate: jam_set});
        var jam = 12;
        var menit = 00;

        
    }

    var difference = getDif(jam,menit,jam_selesai_get,menit_selesai_get);
    var diffMins = diffMin(difference);
    $('#response_min').val(diffMins);
});


jQuery(document).delegate('#button-submit', 'click', function(e) {
    $(this).attr("disabled","disabled");
    $('#form-case').submit();
});

jQuery(document).delegate('#btn-add-ss', 'click', function() {
        size = 0;
        var len = $('#input-ss'+size+' .ss-1').length;
        var data = $("#input-ss"+size+" .ss-1:eq(0)").clone(true).appendTo("#input-ss"+size);
        data.find(".old_file").val('');
        data.find('.labelPhoto').html('Photo '+parseInt(len+1));
        data.find(".inputFile").html('<input type="file" id="input-file-max-fs" name="photo'+size+'_'+len+'" class="dropify'+size+'_'+len+' fileInputs" accept=".jpg,.png,.jpeg"  data-allowed-file-extensions="jpg png jpeg" data-default-file="" data-max-file-size="1M" />');
        data.find(".dropify"+size+"_"+len).dropify({
            messages: {
                default: 'Upload Image',
            }
        });
    })

jQuery(document).delegate('.remove', 'click', function() {

    var trIndex = $(this).closest("div.ss-1").index();
    if(trIndex>0) {
        var trIndex = $(this).closest("div.ss-1").remove();
    }else{
        alert("Sorry!! Can't remove first row!");
    }
});

$("{{ $class_selector == '' ? '.dropify0_0' : $class_selector }}").dropify({
    messages: {
        default: 'Upload Image',
    }
});



    
</script>

@endsection