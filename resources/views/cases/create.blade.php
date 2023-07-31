@extends('layouts.app-front')

@section('css')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<style>
    .flatpickr-input[readonly]{
        background: #ffffff !important;
    }
    
    .message-danger-input{
        color: #D00000;
        font-weight: 400;
        font-size: 12px;
        margin-top: 10px;
    }
    .input-file-max-fs > span{
        font-weight: 400;
    }
</style>
@endsection

@section('content')

    <section class="service-one my-5" id="services">
        <div class="container">
            <div class="block-title text-center">
                <div class="block-title__text"><span>Input Case</span></div><!-- /.block-title__text -->
            </div><!-- /.block-title -->
            <form method="post" action="{{url('create-input-cases')}}" class="mb-5" id="form-case" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    
                    <div class="col-md-2 col-lg-2">
                        <label for="Inputname" class="form-label">Date</label>
                        <input type="text" class="form-control date" autocomplete="off" id="date"  value="{{ date('d-m-Y') }}">
                    </div>
                    <div class="col-md-2 col-lg-2 ">
                        <label for="InputProjectId" class="form-label">Site</label><br>
                        <select class="js-example-basic-single form-control" id="site">
                            <!-- <option value="" {{ old('site') == '' ? 'selected' : '' }}>Pilih Site</option> -->
                            @foreach ($site as $key => $item)
                                <option value="{{ $key }}" {{ old('site') == $key ? 'selected' : '' }}>{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-2 col-lg-2 ">
                        <label for="InputProjectId" class="form-label">Waktu Case</label><br>
                        <select name="kerja" class="js-example-basic-single form-control" id="kerja">
                            @foreach ($kerja as $key => $item)
			                    <option value="{{ $key }}" {{ old('kerja') == $item ? 'selected' : '' }}>{{ $item }}</option>
                             @endforeach
                        </select>
                    </div>

                    <!-- <div class="col-md-2 col-lg-2 ">
                        <label for="InputProjectId" class="form-label">Waktu Case</label><br>
                        <select name="kerja" class="js-example-basic-single form-control" id="kerja">
                            @foreach ($kerja as $key => $item)
                                <option value="{{ $key }}" {{ old('kerja') == $key ? 'selected' : '' }}>{{ $item }}</option>
                            @endforeach
                        </select>
                    </div> -->
                    
                    <div class="col-md-3 col-lg-3">
                        <label for="Inputname" class="form-label">Request</label>
                        <input type="text" class="form-control" id="user" placeholder ="Request PC/Group">
                    </div>
                                    <div class="col-md-4 col-lg-4">
                                        <label for="Inputname" class="form-label">Case</label>
                                        <textarea  id="case" class="form-control" rows="3" placeholder ="Tidak Boleh Kosong!"></textarea>
                                    </div>
                </div>
           
                <div class="row">
                    <div class="col-md-2 col-lg-2">
                        <label for="Inputname" class="form-label">Open</label>
                        <input type="text" class="form-control open_time time" id="open_time">
                    </div>
                    <div class="col-md-2 col-lg-2">
                        <label for="Inputname" class="form-label">Close</label>
                        <input type="text" class="form-control close_time time" id="close_time">
                    </div>
                    <div class="col-md-2 col-lg-2">
                        <label for="Inputname" class="form-label">Resolve Time</label>
                        <input type="text" class="form-control resolve_min" readonly id="resolve_min">
                    </div>
                    <div class="col-md-2 col-lg-2">
                        <label for="Inputname" class="form-label">Response</label>
                        <input type="text" class="form-control response_time time" id="response_time">
                    </div>
                    <div class="col-md-2 col-lg-2">
                        <label for="Inputname" class="form-label">Response Time</label>
                        <input type="text" class="form-control response_min" readonly id="response_min">
                    </div>
                </div>
                <div id="input-ss-wrapper" class="row mx-0">
                    <div class="col-md-12 col-lg-12 case0">
                        <div class="row my-3 baris-ss" id="input-ss0">
                            <div class="ss-1 col-md-2 col-lg-2">
                                <label class="labelPhoto">Photo 1</label>
                                <button class="remove btn btn-sm btn-danger" type="button">
                                    <i class="fa fa-times"></i>
                                </button>
                                <div class="inputFile mt-2">
                                    <input type="file" id="input-file-max-fs" name="photo0_0" class="dropify0_0 fileInputs" accept=".jpg,.png,.jpeg" data-allowed-file-extensions="jpg png jpeg" data-max-file-size="500K"/>
                                </div>
                                <p class="message-danger-input"><i>Format: jpg, jpeg, png maks 1Mb</i></p>                                        
                                <input type="hidden" name="jumFile[]" class="jumFile" value="{{ '0' }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-md-2 form-group col-lg-2 pull-right">
                        <button class="btn btn-icon btn-sm btn-noborder btn-warning btn-add text-white w-100 font-size-sm" id="btn-add" type="button"><i class="fa fa-plus"></i>&nbsp;Input Case to List</button>
                    </div>
                    <div class="col-md-2 form-group col-lg-2 pull-right">
                        <button class="btn btn-icon btn-sm btn-noborder btn-info text-white w-100 font-size-sm" id="btn-add-ss" type="button"><i class="fa fa-plus"></i>&nbsp;Add Screenshoot</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <table class="table table-bordered w-100" id="table-case">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-center">NO</th>
                                    <th>TANGGAL</th>
                                    <th>SITE/CLIENT</th>
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
                </div>


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

    $('.dropify0_0').dropify({
        width: '25px',
        height: '100px',
        messages: {
            default: '',
        }
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

jQuery(document).delegate('button.btn-add', 'click', function() {
    //get value form
    var today = new Date();
    var cases = $('#case').val();
    var tanggal = $('#date').val();
    var user = $('#user').val();
    var open_time = $('#open_time').val();
    var close_time = $('#close_time').val();
    var response_time = $('#response_time').val();

    var sites = $("#site option:selected").text();
    var id_sites = $("#site").val();

    var kerjas = $("#kerja option:selected").text();
    var id_kerjas = $("#kerja").val();

    var response_min = $("#response_min").val();
    var resolve_min = $("#resolve_min").val();

    var jam_now = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
    
    var status = 'berhasil';

    //cek value form
    if(cases == ''){
        status = 'gagal';
    }

    if(open_time == ''){
        status = 'gagal';
    }

    if(close_time == ''){
        status = 'gagal';
    }

    if(id_sites == null){
        status = 'gagal';
    }

    if(id_kerjas == null){
        status = 'gagal';
    }

    //alert jika kosong input
    if(status == 'gagal'){
        alert('input tidak boleh kosong');
    }else{
        //hapus tr kosong
        jQuery('#table-case >tbody >tr#kosong').remove();

        //hitung jumlah tr
        size = jQuery('#table-case >tbody >tr').length + 1;
        sizeBaris = jQuery('#table-case >tbody >tr').length;

        
        var len = 0;
        
        var data = $("#input-ss-wrapper .case0:eq(0)").clone(true).appendTo("#input-ss-wrapper");

        if (sizeBaris > 0) {
            sizeBaris = parseInt(sizeBaris);
        }

        
        
        $("#input-ss"+sizeBaris).css({
        'visibility':'hidden',
        'position' : 'absolute',
        });

        
        data.find('.baris-ss').attr('id','input-ss'+size);
        $("#input-ss"+size).css({
        'visibility':'visible',
        'position' : 'relative',
        });
        data.find('.jumFile').val(size);
        data.find("#input-ss"+size).html('<div class="ss-1 col-md-2 col-lg-2"><label class="labelPhoto">Photo 1</label><button class="remove btn btn-sm btn-danger" type="button"><i class="fa fa-times"></i></button><div class="inputFile mt-2"></div><p class="message-danger-input"><i>Format: jpg, jpeg, png maks 1Mb</i></p><input type="hidden" name="jumFile[]" class="jumFile" value="'+size+'"></div>');
        data.find(".inputFile").html('<input type="file" id="input-file-max-fs" name="photo'+size+'_'+len+'" class="dropify'+size+'_'+len+' fileInputs" accept=".jpg,.png,.jpeg"  data-allowed-file-extensions="jpg png jpeg" data-default-file="" data-max-file-size="500K" />');
        data.find(".dropify"+size+"_"+len).dropify({
        width: '25px',
        height: '100px',
            messages: {
                default: '',
            }
        });

        //append tr
        var markup = '<tr id="rec-'+ size +'"><td class="text-center"><span class="sn">'+ size +'</span></td><td>'+ tanggal +'<input type="hidden" name="date[]" value="'+ tanggal +'"><input type="hidden" name="response_min[]" value="'+ response_min +'"><input type="hidden" name="resolve_min[]" value="'+ resolve_min +'"></td><td>'+ sites +'<input type="hidden" name="site[]" value="'+ id_sites +'"></td><td>'+ kerjas +'<input type="hidden" name="kerja[]" value="'+ id_kerjas +'"></td><td>'+ user +'<input type="hidden" name="user[]" value="'+ user +'"></td><td>'+ cases +'<input type="hidden" name="masalah[]" value="'+ cases +'"></td><td>'+ open_time +' - '+ close_time +'<input type="hidden" name="open_time[]" value="'+ open_time +'"><input type="hidden" name="close_time[]" value="'+ close_time +'"></td><td>'+ open_time +' - '+ response_time +'<input type="hidden" name="response_time[]" value="'+ response_time +'"></td><td class="text-center"><button class="btn btn-icon btn-sm btn-danger btn-delete" data-id="'+ size +'"><i class="fa fa-trash"></i></button></td></tr>';
        $("table tbody").append(markup);


        //kosongkan input setelah submit
        $('#case').val('');
        $('#user').val('');
        $('#open_time').val();
        $('#close_time').val('');
        $('#response_time').val('');
        $('#site').val('').trigger("change");
        $('#kerja').val('').trigger("change");
        $('#response_min').val('');
        $('#resolve_min').val('');
        
    }
});

jQuery(document).delegate('#button-submit', 'click', function(e) {

    var valueSS = $('#input-file-max-fs').val();

    if (valueSS == "") {
        alert("DATA TIDAK BOLEH KOSONG!");
    } else {
        $(this).attr("disabled","disabled");
    $('#form-case').submit();
    }

    // $(this).attr("disabled","disabled");
    // $('#form-case').submit();
});

jQuery(document).delegate('button.btn-delete', 'click', function(e) {
    var id = jQuery(this).attr('data-id');
    jQuery('#rec-' + id).remove();
    i = parseInt(id-1);
    jQuery('#input-ss'+i).remove();

    $('#input-ss-wrapper .baris-ss').each(function(index) {
      //alert(index);
      $(this).attr('id','input-ss'+index);
      $(this).find('.jumFile').val(index);

      $('#input-ss'+index+' .fileInputs').each(function(k) {
            $(this).attr('class','dropify'+index+'_'+k);
            $(this).attr('name','photo'+index+'_'+k);
      });
      
    });

    $('#tbody_case tr').each(function(index) {
      //alert(index);
      $(this).find('span.sn').html(index+1);
    });
});

jQuery(document).delegate('#btn-add-ss', 'click', function() {
        size = jQuery('#table-case >tbody >tr:not(#kosong)').length;
        var len = $('#input-ss'+size+' .ss-1').length;

        if(len > 3){
        alert('Tidak Boleh Lebih dari 4 Gambar');
        $('#btn-add-ss').stop();
    }else{
        var data = $("#input-ss"+size+" .ss-1:eq(0)").clone(true).appendTo("#input-ss"+size);
    }

        data.find('.labelPhoto').html('Photo '+parseInt(len+1));
        data.find(".inputFile").html('<input type="file" id="input-file-max-fs" name="photo'+size+'_'+len+'" class="dropify'+size+'_'+len+' fileInputs" accept=".jpg,.png,.jpeg"  data-allowed-file-extensions="jpg png jpeg" data-default-file="" data-max-file-size="1M" />');
        data.find(".dropify"+size+"_"+len).dropify({
            width: '25px',
            height: '100px',
            messages: {
                default: '',
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
    
</script>

@endsection