<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Intervention\Image\Facades\Image;
use App\Domain;
use App\Project;
use App\Cases;
use App\CasesImage;
use View;
use File;
use DB;
use Carbon\Carbon;
use Helper;
use Redirect;
use Auth;

class CasesController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     
     public function index(Request $request)
     {

        $tanggal_awal = $request->tanggal_mulai;
        $tanggal_selesai = $request->tanggal_akhir;
        $tanggal_mulai = date('Y-m-d',strtotime('-1 year'));
        $tanggal_akhir = date('Y-m-d');

        if ($request->tanggal_mulai != "") {
            
            $tanggal_mulai = date('Y-m-d',strtotime($tanggal_awal));
        }

        if ($request->tanggal_akhir != "") {
            
            $tanggal_akhir = date('Y-m-d',strtotime($request->tanggal_akhir));
        }

        $filter = $request->filtertgl;
        $role = Auth::user()->role;
        $id = Auth::user()->id;

        $namePic = DB::table('users')
        ->select('users.name', 'users.role')
        ->where(function($q) use ($role,$id){
            if ($role == "1") {
                $q->where('users.id', $id);
            }
        })
        ->where(function($q) use ($filter){
            if ($filter != "") {
                $q->where('users.name',$filter);
            }
        })
        ->get();

        $jumlahValid = DB::table('cases')
        ->join('users', 'users.id', '=', 'cases.created_by','left')
        ->where(function($q) use ($filter){
            if ($filter != "") {
                $q->where('users.name',$filter);
            }
        })
        ->where(function($q) use ($id){
            if ($id != "") {
                $q->where('users.id',$id);
            }
        })
        ->whereBetween('cases.date',[$tanggal_mulai,$tanggal_akhir])
        ->where('status',1)
        ->count();

        $jumlahNotValid = DB::table('cases')
        ->join('users', 'users.id', '=', 'cases.created_by','left')
        ->where(function($q) use ($filter){
            if ($filter != "") {
                $q->where('users.name',$filter);
            }
        })
        ->where(function($q) use ($id){
            if ($id != "") {
                $q->where('users.id',$id);
            }
        })
        ->whereBetween('cases.date',[$tanggal_mulai,$tanggal_akhir])
        ->where('status',2)
        ->count();

        $dalamproses = DB::table('cases')
        ->join('users', 'users.id', '=', 'cases.created_by','left')
        ->where(function($q) use ($filter){
            if ($filter != "") {
                $q->where('users.name',$filter);
            }
        })
        ->where(function($q) use ($id){
            if ($id != "") {
                $q->where('users.id',$id);
            }
        })
        ->whereBetween('cases.date',[$tanggal_mulai,$tanggal_akhir])
        ->where('status',0)
        ->count();

        $totalcase = DB::table('cases')
        ->join('users', 'users.id', '=', 'cases.created_by','left')
        ->where(function($q) use ($filter){
            if ($filter != "") {
                $q->where('users.name',$filter);
            }
        })
        ->where(function($q) use ($id){
            if ($id != "") {
                $q->where('users.id',$id);
            }
        })
        ->whereBetween('cases.date',[$tanggal_mulai,$tanggal_akhir])
        ->count('status');

        $penalty = DB::table('cases')
        ->join('users', 'users.id', '=', 'cases.created_by','left')
        ->where(function($q) use ($filter){
            if ($filter != "") {
                $q->where('users.name',$filter);
            }
        })
        ->where(function($q) use ($id){
            if ($id != "") {
                $q->where('users.id',$id);
            }
        })
        ->whereBetween('cases.date',[$tanggal_mulai,$tanggal_akhir])
        ->where('status',3)
        ->count();

        $data = DB::table('cases')
        ->join('kerjas', 'cases.kerja', '=', 'kerjas.id','left')
        ->join('sites', 'cases.site', '=', 'sites.id','left')
        ->join('users', 'users.id', '=', 'cases.created_by','left')
        ->select('cases.*', 'sites.name as sites' ,'kerjas.name as kerjas','users.name as action_by')
                ->where(function($q) use ($role,$id){
                    if ($role == "1") {
                        $q->where('cases.created_by',$id);
                    }
                })
                ->where(function($q) use ($filter){
                    if ($filter != "") {
                        $q->where('users.name',$filter);
                    }
                })
                ->whereBetween('cases.date',[$tanggal_mulai,$tanggal_akhir])
                ->orderBy('cases.date','desc')
                ->get();

        $img = DB::table('case_images')
        ->join('cases', 'case_images.case_id', '=', 'cases.id')
        ->select('case_images.*')
        ->where(function($q) use ($role,$id){
            if ($role == "1") {
                $q->where('cases.created_by',$id);
            }
        })
        ->orderBy('case_images.id','asc')
        ->get();

        $img_data = [];
        $no = 0;
        foreach ($img as $key => $value) {
            $img_data[$no][$value->case_id] = $value->img;
            $no++;
        }
        
        
        return View::make('cases.index', compact('data',
        'img_data',
        'tanggal_awal',
        'tanggal_selesai',
        'tanggal_mulai',
        'tanggal_akhir',
        'filter',
        'jumlahValid',
        'jumlahNotValid',
        'tanggal_awal',
        'tanggal_selesai',
        'tanggal_mulai',
        'tanggal_akhir',
        'dalamproses',
        'totalcase',
        'penalty',
        'namePic',
    ));
    }

    // public function up()
    // {
    //     Schema::create('registrants', function (Blueprint $table) {
    //         $table->id();
    //         $table->string('users.name');
    //         $table->string('cases.uploaded_at')->unique();
    //         $table->timestamps();
    //     });
    // }

        public function indexbackup (Request $request)
    {

        $tanggal_awal = $request->tanggal_mulai;
        $tanggal_selesai = $request->tanggal_akhir;
        $tanggal_mulai = date('Y-m-d',strtotime('-1 year'));
        $tanggal_akhir = date('Y-m-d');

        if ($request->tanggal_mulai != "") {
            
            $tanggal_mulai = date('Y-m-d',strtotime($tanggal_awal));
        }

        if ($request->tanggal_akhir != "") {
            
            $tanggal_akhir = date('Y-m-d',strtotime($request->tanggal_akhir));
        }

        $filter = $request->filtertgl;
        $role = Auth::user()->role;
        $id = Auth::user()->id;

        $namePic = DB::table('users')
        ->select('users.name', 'users.role')
        ->where(function($q) use ($role,$id){
            if ($role == "1") {
                $q->where('users.id', $id);
            }
        })
        ->where(function($q) use ($filter){
            if ($filter != "") {
                $q->where('users.name',$filter);
            }
        })
        ->get();

        $nameKerja = DB::table('kerjas')
        ->select('kerjas.name')
        ->where(function($q) use ($filter){
            if ($filter != "") {
                $q->where('kerjas.name',$filter);
            }
        })
        ->get();

        // dd($nameKerja);

        $jumlahValid = DB::table('cases')
        ->join('users', 'users.id', '=', 'cases.created_by','left')
        ->where(function($q) use ($filter){
            if ($filter != "") {
                $q->where('users.name',$filter);
            }
        })
        ->where(function($q) use ($id){
            if ($id != "") {
                $q->where('users.id',$id);
            }
        })
        ->whereBetween('cases.date',[$tanggal_mulai,$tanggal_akhir])
        ->where('status',1)
        ->count();

        $jumlahNotValid = DB::table('cases')
        ->join('users', 'users.id', '=', 'cases.created_by','left')
        ->where(function($q) use ($filter){
            if ($filter != "") {
                $q->where('users.name',$filter);
            }
        })
        ->where(function($q) use ($id){
            if ($id != "") {
                $q->where('users.id',$id);
            }
        })
        ->whereBetween('cases.date',[$tanggal_mulai,$tanggal_akhir])
        ->where('status',2)
        ->count();

        $dalamproses = DB::table('cases')
        ->join('users', 'users.id', '=', 'cases.created_by','left')
        ->where(function($q) use ($filter){
            if ($filter != "") {
                $q->where('users.name',$filter);
            }
        })
        ->where(function($q) use ($id){
            if ($id != "") {
                $q->where('users.id',$id);
            }
        })
        ->whereBetween('cases.date',[$tanggal_mulai,$tanggal_akhir])
        ->where('status',0)
        ->count();

        $totalcase = DB::table('cases')
        ->join('users', 'users.id', '=', 'cases.created_by','left')
        ->where(function($q) use ($filter){
            if ($filter != "") {
                $q->where('users.name',$filter);
            }
        })
        ->where(function($q) use ($id){
            if ($id != "") {
                $q->where('users.id',$id);
            }
        })
        ->whereBetween('cases.date',[$tanggal_mulai,$tanggal_akhir])
        ->count('status');

        $penalty = DB::table('cases')
        ->join('users', 'users.id', '=', 'cases.created_by','left')
        ->where(function($q) use ($filter){
            if ($filter != "") {
                $q->where('users.name',$filter);
            }
        })
        ->where(function($q) use ($id){
            if ($id != "") {
                $q->where('users.id',$id);
            }
        })
        ->whereBetween('cases.date',[$tanggal_mulai,$tanggal_akhir])
        ->where('status',3)
        ->count();

        $data = DB::table('cases')
                ->join('kerjas', 'cases.kerja', '=', 'kerjas.id','left')
                ->join('sites', 'cases.site', '=', 'sites.id','left')
                ->join('users', 'users.id', '=', 'cases.created_by','left')
                ->select('cases.*', 'sites.name as sites' ,'kerjas.name as kerjas','users.name as action_by')
                ->where(function($q) use ($role,$id){
                    if ($role == "1") {
                        $q->where('cases.created_by',$id);
                    }
                })
                ->where(function($q) use ($filter){
                    if ($filter != "") {
                        $q->where('kerjas.name',$filter);
                    }
                })
                ->where(function($q) use ($filter){
                    if ($filter != "") {
                        $q->where('users.name',$filter);
                    }
                })
                ->whereBetween('cases.date',[$tanggal_mulai,$tanggal_akhir])
                ->orderBy('cases.id','desc')
                ->get();

        $img = DB::table('case_images')
        ->join('cases', 'case_images.case_id', '=', 'cases.id')
        ->select('case_images.*')
        ->where(function($q) use ($role,$id){
            if ($role == "1") {
                $q->where('cases.created_by',$id);
            }
        })
        ->orderBy('case_images.id','asc')
        ->get();

        $img_data = [];
        $no = 0;
        foreach ($img as $key => $value) {
            $img_data[$no][$value->case_id] = $value->img;
            $no++;
        }
        
        
        return View::make('cases-backup.index', compact('data',
        'img_data',
        'tanggal_awal',
        'tanggal_selesai',
        'tanggal_mulai',
        'tanggal_akhir',
        'filter',
        'jumlahValid',
        'jumlahNotValid',
        'tanggal_awal',
        'tanggal_selesai',
        'tanggal_mulai',
        'tanggal_akhir',
        'dalamproses',
        'totalcase',
        'penalty',
        'namePic',
        'nameKerja',
    ));
    }

    public function status(Request $request)
    {
        // $tanggal_awal = $request->tanggal_mulai == '' ? date('Y-m-d') : $request->tanggal_mulai;
        // $tanggal_selesai = $request->tanggal_akhir == '' ? date('Y-m-d') : $request->tanggal_akhir;
        $tanggal_awal = $request->tanggal_mulai;
        $tanggal_selesai = $request->tanggal_akhir;
        $tanggal_mulai = date('Y-m-d',strtotime('-1 year'));
        $tanggal_akhir = date('Y-m-d');

        // dd($tanggal_mulai.'   '.$tanggal_akhir);

        // $tanggal_mulai = "";
        // $tanggal_akhir = "";

        if ($request->tanggal_mulai != "") {
            
            $tanggal_mulai = date('Y-m-d',strtotime($tanggal_awal));
        }

        if ($request->tanggal_akhir != "") {
            
            $tanggal_akhir = date('Y-m-d',strtotime($request->tanggal_akhir));
        }

        // dd($tanggal_mulai.'   '.$tanggal_akhir);

        $filter = $request->pic;
        $role = Auth::user()->role;
        $id = Auth::user()->id;

        $namePic = DB::table('cases')
        ->join('users', 'users.id', '=', 'cases.created_by','left')
        ->select('users.name')
        ->groupBy('users.name', 'cases.created_by')
        ->get();

        // dd($namePic);

        $jumlahValid = DB::table('cases')
        ->join('users', 'users.id', '=', 'cases.created_by','left')
        ->where(function($q) use ($filter){
            if ($filter != "") {
                $q->where('users.name',$filter);
            }
        })
        ->whereBetween('cases.date',[$tanggal_mulai,$tanggal_akhir])
        ->where('status',1)
        ->count();

        $jumlahNotValid = DB::table('cases')
        ->join('users', 'users.id', '=', 'cases.created_by','left')
        ->where(function($q) use ($filter){
            if ($filter != "") {
                $q->where('users.name',$filter);
            }
        })
        ->whereBetween('cases.date',[$tanggal_mulai,$tanggal_akhir])
        ->where('status',2)
        ->count();

        $dalamproses = DB::table('cases')
        ->join('users', 'users.id', '=', 'cases.created_by','left')
        ->where(function($q) use ($filter){
            if ($filter != "") {
                $q->where('users.name',$filter);
            }
        })
        ->whereBetween('cases.date',[$tanggal_mulai,$tanggal_akhir])
        ->where('status',0)
        ->count();

        $totalcase = DB::table('cases')
        ->join('users', 'users.id', '=', 'cases.created_by','left')
        ->where(function($q) use ($filter){
            if ($filter != "") {
                $q->where('users.name',$filter);
            }
        })
        ->whereBetween('cases.date',[$tanggal_mulai,$tanggal_akhir])
        ->count('status');

        $penalty = DB::table('cases')
        ->join('users', 'users.id', '=', 'cases.created_by','left')
        ->where(function($q) use ($filter){
            if ($filter != "") {
                $q->where('users.name',$filter);
            }
        })
        ->whereBetween('cases.date',[$tanggal_mulai,$tanggal_akhir])
        ->where('status',3)
        ->count();

        $data = DB::table('cases')
                ->join('sites', 'cases.site', '=', 'sites.id','left')
                ->join('kerjas', 'cases.kerja', '=', 'kerjas.id','left')
                ->join('users', 'users.id', '=', 'cases.created_by','left')
                ->select('cases.*', 'sites.name as sites', 'kerjas.name as kerjas', 'users.name as action_by')
                ->where(function($q) use ($role,$id){
                    if ($role == "1") {
                        $q->where('cases.created_by',$id);
                    }
                })
                ->where(function($q) use ($filter){
                    if ($filter != "") {
                        $q->where('users.name',$filter);
                    }
                })
                ->whereBetween('cases.date',[$tanggal_mulai,$tanggal_akhir])
                // ->where(function($q) use ($tanggal_akhir){
                //     if ($tanggal_akhir != "") {
                //         $q->where('cases.date',$tanggal_akhir);
                //     }
                // })
                ->orderBy('cases.date','desc')
                // ->orderBy('cases.date','asc')
                ->get();

        $img = DB::table('case_images')
        ->join('cases', 'case_images.case_id', '=', 'cases.id')
        ->select('case_images.*')
        ->where(function($q) use ($role,$id){
            if ($role == "1") {
                $q->where('cases.created_by',$id);
            }
        })
        ->orderBy('case_images.id','asc')
        ->get();

        $img_data = [];
        $no = 0;
        foreach ($img as $key => $value) {
            $img_data[$no][$value->case_id] = $value->img;
            $no++;
        }
        
        
        return View::make('cases.manage_status', compact(
            'data',
            'img_data',
            'namePic',
            'filter',
            'jumlahValid',
            'jumlahNotValid',
            'tanggal_awal',
            'tanggal_selesai',
            'tanggal_mulai',
            'tanggal_akhir',
            'dalamproses',
            'totalcase',
            'penalty'
        ));
    }

    public function statusUpdate(Request $request) {
        $masalah = $request->input('masalah');
        $status = $request->input('status');
        if (is_array($masalah)) {
            $n = count($masalah);
        }else{
            $n = 0;
        }
        

        if ($status == "valid") {
            $status_id = "1";
        }
        elseif ($status == "penalty") {
            $status_id = "3";
        }
        elseif ($status == "performance") {
            $status_id = "4";
        }
        elseif ($status == "inval-performance") {
            $status_id = "5";
        }
        else {
            $status_id = "2";
        }

        if ($n == 0) {
            return Redirect::back();
        }

        for ($i=0; $i < $n; $i++) { 
            $cases = Cases::find($masalah[$i]);
            $cases->status = $status_id;
            $cases->save();
        }

        return Redirect::back();
    }

    public function create()
    {
        $kerja = DB::table('kerjas')->pluck('name','id');

        $site = DB::table('sites')->pluck('name','id');

        // dd($kerja);

        return View::make('cases.create',compact('site','kerja'));

        // $site = DB::table('sites')->pluck('name','id');

        // return View::make('cases.create',compact('site'));
    }

    public function create_dev()
    {
        $site = DB::table('sites')->pluck('name','id');
        
        $kerja = DB::table('kerjas')->pluck('name','id');

        return View::make('cases-backup.create',compact('site','kerja'));
    }

    public function store_dev(Request $request) {

        $created = Auth::user()->id;

        $masalah = $request->input('masalah');
        $date = $request->input('date');
        $site = $request->input('site');
        $kerja = $request->input('kerja');
        $user = $request->input('user');
        $open_time = $request->input('open_time');
        $close_time = $request->input('close_time');
        $response_time = $request->input('response_time');
        $resolve_min = $request->input('resolve_min');
        $response_min = $request->input('response_min');
        

        $code = Helper::generateRandomString(10);

        
        if (is_array($masalah)) {

            $jum = count($masalah);

        }else{

            $jum = 0;

        }

        if($jum == 0){

            return redirect()->back()->with('failed','Task Tidak Boleh Kosong!');

        }


        for ($e=0; $e < $jum; $e++) { 

            if ($date[$e] == "") {
                $tanggal = Carbon::today();
            }else{
                $tanggal = Helper::tgl_format_db($date[$e]);
            }

            $code = Helper::generateRandomString(10);

            $data = new Cases();

            $data->masalah = $masalah[$e];
            $data->date = $tanggal;
            $data->site = $site[$e];
            $data->kerja = $kerja[$e];
            $data->user = $user[$e];
            $data->code = $code;
            $data->open_time = $open_time[$e];
            $data->close_time = $close_time[$e];
            $data->response_time = $response_time[$e];
            $data->resolve_min = $resolve_min[$e];
            $data->response_min = $response_min[$e];
            $data->created_by = $created;
            
            if ($data->save()) {
                
                
                $jumFile = $request->input('jumFile');

                

                if (is_array($jumFile)) {
                    $counts = array_count_values($jumFile);
                    $n = $counts[$e];
                }else{
                    $n = 0;
                }
                

                for ($i=0; $i < $n; $i++) { 
                    if ($request->has('photo'.$e.'_'.$i)) {
    
                        $imgCase = New CasesImage();
                        
    
                        $rand = Helper::generateRandomNumber();
    
                        $file = $request->file('photo'.$e.'_'.$i);

                        // dd($request->file('photo'.$e.'_'.$i).'-'.$e);
                        
                        $ext = $file->getClientOriginalExtension();
                        
                        $newNameFile = 'Ss-'.date('Y-m-d').'-'.$code."-".$rand.'-'.$e.'-'.$i.".".$ext;
                        
                        // if ($old_doc != "") {
                        //     if (file_exists(public_path() .'img/ss/'.$old_doc)) {
                        //         unlink('public/img/ss/'.$old_doc);
                        //     }
                        // }
        
                        $file->move('public/img/ss/',$newNameFile);
    
    
                        $imgCase->case_id = $data->id;
                        $imgCase->img = $newNameFile;
                        // $imgCase->desc_img = $desc_image[$i];
    
                        $imgCase->save();
    
                    }
                } 
            }
            
        }

        return redirect('cases-backup');
       

    }

    public function store(Request $request) {

        $created = Auth::user()->id;

        $masalah = $request->input('masalah');
        $date = $request->input('date');
        $site = $request->input('site');
        $kerja = $request->input('kerja');
        $user = $request->input('user');
        $open_time = $request->input('open_time');
        $close_time = $request->input('close_time');
        $response_time = $request->input('response_time');
        $resolve_min = $request->input('resolve_min');
        $response_min = $request->input('response_min');
        

        $code = Helper::generateRandomString(10);

        
        if (is_array($masalah)) {

            $jum = count($masalah);

        }else{

            $jum = 0;

        }

        if($jum == 0){

            return redirect()->back()->with('failed','Task Tidak Boleh Kosong!');

        }


        for ($e=0; $e < $jum; $e++) { 

            if ($date[$e] == "") {
                $tanggal = Carbon::today();
            }else{
                $tanggal = Helper::tgl_format_db($date[$e]);
            }

            $code = Helper::generateRandomString(10);

            $data = new Cases();

            $data->masalah = $masalah[$e];
            $data->date = $tanggal;
            $data->site = $site[$e];
            $data->kerja = $kerja[$e];
            $data->user = $user[$e];
            $data->code = $code;
            $data->open_time = $open_time[$e];
            $data->close_time = $close_time[$e];
            $data->response_time = $response_time[$e];
            $data->resolve_min = $resolve_min[$e];
            $data->response_min = $response_min[$e];
            $data->created_by = $created;
            
            if ($data->save()) {
                
                
                $jumFile = $request->input('jumFile');

                

                if (is_array($jumFile)) {
                    $counts = array_count_values($jumFile);
                    $n = $counts[$e];
                }else{
                    $n = 0;
                }


                for ($i=0; $i < $n; $i++) { 
                    if ($request->has('photo'.$e.'_'.$i)) {
    
                        $imgCase = New CasesImage();
                        
    
                        $rand = Helper::generateRandomNumber();
    
                        $file = $request->file('photo'.$e.'_'.$i);

                        //dd($request->file('photo'.$e.'_'.$i).'-'.$e);
    
                        $ext = $file->getClientOriginalExtension();    
                                        
    
                        $newNameFile = 'Ss-'.date('Y-m-d').'-'.$code."-".$rand.'-'.$e.'-'.$i.".".$ext;
        
                        // if ($old_doc != "") {
                        //     if (file_exists(public_path() .'img/ss/'.$old_doc)) {
                        //         unlink('public/img/ss/'.$old_doc);
                        //     }
                        // }
        
                        $file->move('public/img/ss/',$newNameFile);
    
    
                        $imgCase->case_id = $data->id;
                        $imgCase->img = $newNameFile;
                        // $imgCase->desc_img = $desc_image[$i];

                        $imgCase->save();
    
                    }
                }

                // Image::make($request->file('photo'))->resize(115, 115)->save('public/img/ss/'.$newNameFile);
                // $data['photo'] = 'public/img/ss/'. $newNameFile;
                
            }
            
        }

        return redirect('cases');

    }

    public function edit_dev($id) {

        $data = Cases::find($id);
        $img = CasesImage::where('case_id',$id)->get();
        $site = DB::table('sites')->pluck('name','id');
        $kerja = DB::table('kerjas')->pluck('name','id');

        return view('cases-backup.edit', compact('data','site','img'));
    }

    public function edit($id) {

        $data = Cases::find($id);
        $img = CasesImage::where('case_id',$id)->get();
        $site = DB::table('sites')->pluck('name','id');
        $kerja = DB::table('kerjas')->pluck('name','id');

        return view('cases.edit', compact('data','site','kerja','img'));
    }

    public function update(Request $request, $id) {

        $masalah = $request->input('masalah');
        $date = $request->input('date');
        $site = $request->input('site');
        $kerja = $request->input('kerja');
        $user = $request->input('user');
        $open_time = $request->input('open_time');
        $close_time = $request->input('close_time');
        $response_time = $request->input('response_time');
        $resolve_min = $request->input('resolve_min');
        $response_min = $request->input('response_min');

        $data = Cases::find($id);

        if ($date == "") {
            $tanggal = Carbon::today();
        }else{
            $tanggal = Helper::tgl_format_db($date);
        }

        if ($data->code == "") {
            $code = Helper::generateRandomString(10);
            $data->code = $code;
        }

        $data->masalah = $masalah;
        $data->date = $tanggal;
        $data->site = $site;
        $data->kerja = $kerja;
        $data->user = $user;
        $data->open_time = $open_time;
        $data->close_time = $close_time;
        $data->response_time = $response_time;
        $data->resolve_min = $resolve_min;
        $data->response_min = $response_min;

        if($data->save()){

            $jumFile = $request->input('jumFile');

                

            if (is_array($jumFile)) {
                $counts = array_count_values($jumFile);
                $n = $counts[0];
            }else{
                $n = 0;
            }

            
            $old_doc = $request->input('old_file');
            $Img = CasesImage::where('case_id',$id)->get();

            if (is_array($old_doc)) {
                
                foreach ($Img as $key => $value) {
                    if (!in_array($value->img,$old_doc)) {
                        if (file_exists(public_path() .'/img/ss/'.$value->img)) {
                            unlink('public/img/ss/'.$value->img);
                        }
                    }
                }
            }

            CasesImage::where('case_id',$id)->delete();


            for ($i=0; $i < $n; $i++) { 
                if ($request->has('photo0_'.$i)) {

                    $imgCase = New CasesImage();
                    

                    $rand = Helper::generateRandomNumber();

                    $file = $request->file('photo0_'.$i);

                    // dd($request->file('photo'.$e.'_'.$i).'-'.$e);

                    $ext = $file->getClientOriginalExtension();
                

                    $newNameFile = 'Ss-'.date('Y-m-d').'-'.$data->code."-".$rand.'-'.$site.'-0-'.$i.".".$ext;
                    
                    // $old_doc = $request->input('old_file');

                    if (isset($old_doc[$i])) {
                        if (file_exists(public_path() .'/img/ss/'.$old_doc[$i])) {
                            unlink('public/img/ss/'.$old_doc[$i]);
                        }
                    }
    
                    $file->move('public/img/ss/',$newNameFile);


                    $imgCase->case_id = $data->id;
                    $imgCase->img = $newNameFile;
                    // $imgCase->desc_img = $desc_image[$i];

                    $imgCase->save();

                }else{

                    if (isset($old_doc[$i])) {
                        if (file_exists(public_path() .'/img/ss/'.$old_doc[$i])) {
                            // unlink('public/img/ss/'.$old_doc[$i]);
                            $imgCase = New CasesImage();
                            $imgCase->case_id = $data->id;
                            $imgCase->img = $old_doc[$i];
                            $imgCase->save();
                        }
                    }

                    
                }
            }

            return redirect('cases');
        }else{
            return redirect('cases');
        }

    }

    public function destroy($id) {
        $data = Cases::find($id);

        $img = CasesImage::where('case_id',$id)->get();
        
        foreach ($img as $key => $value) {
            if ($value->img != "") {
                
                if (file_exists(public_path() .'/img/ss/'.$value->img)) {
                    
                    unlink('public/img/ss/'.$value->img);
                }
            }
        }

        CasesImage::where('case_id',$id)->delete();

        $data->delete();
        return redirect('cases');
    }

}
