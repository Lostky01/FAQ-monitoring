<?php

namespace App\Http\Controllers;

use App\FAQ;
use App\Project;
use App\Sites;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use DB;

class FAQController extends Controller
{
    public function index()
    {

        $data = FAQ::orderBy('faq.created_at', 'desc')
           ->get();

        $i_data = 0;
        $baseid = [];
        $images = [];
        foreach($data as $item) {
            $getSiteName = DB::table('sites')->where('id', $item->id_site)->first();
            if ($getSiteName) {
                $item->id_site = $getSiteName->name;
            }

            $getProjectName = DB::table('projects')->where('id', $item->name)->first();
            if ($getProjectName) {
                $item->name = $getProjectName->name;
            }
            $baseid[] = $item->id;
            if($item->image_url!='' || $item->image_url2!='') {
                $images[$item->id][] = $item->image_url == '' ? '' : asset('image_info/' . $item->image_url);
                $images[$item->id][] = $item->image_url2 == '' ? '' : asset('image_info/' . $item->image_url2);
            } else {
                $images[$item->id][] = '';
            }
        }

        return view('FAQ.index', compact('data', 'images', 'baseid'));
    }


    public function create()
    {
        $sites = Sites::pluck('name', 'id');
        $project = Project::pluck('name', 'id');

        return view('FAQ.create', compact('sites', 'project'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'id_site' => 'required',
            'id_project' => 'required',
            'pertanyaan' => 'required',
            'jawaban' => 'required',
            'created_at' => 'required|date',
            'image_1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $faq = new FAQ();
        $faq->id_site = $request->id_site;
        $faq->id_project = $request->id_project;
        $faq->pertanyaan = $request->pertanyaan;
        $faq->jawaban = $request->jawaban;
        $faq->created_at = $request->created_at;


        if ($request->hasFile('image_1')) {
            $faq->image_url = $this->uploadImage($request->file('image_1'));
        }


        if ($request->hasFile('image_2')) {
            $faq->image_url2 = $this->uploadImage($request->file('image_2'));
        }

        $faq->save();

        return redirect()->route('FAQ.index')->with('success', 'Information created successfully.');
    }
    public function edit($id)
    {
        $data = FAQ::findOrFail($id);
        $sites = Sites::pluck('name', 'id');
        $project = Project::pluck('name', 'id');

        return view('FAQ.edit', compact('data', 'sites', 'project'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_site' => 'required',
            'id_project' => 'required',
            'pertanyaan' => 'required',
            'jawaban' => 'required',
            'image_1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // dd($request->all());

        $faq = FAQ::findOrFail($id);

        $faq->id_site = $request->input('id_site');
        $faq->id_project = $request->input('id_project');
        $faq->pertanyaan = $request->input('pertanyaan');
        $faq->jawaban = $request->input('jawaban');
        $faq->created_at = $request->input('created_at');
        // dd($request->input('delete_image_2'));
        if ($request->hasFile('image_1')) {
            if ($faq->image_url) {
                $this->deleteImage($faq->image_url);
            }
            $faq->image_url = $this->uploadImage($request->file('image_1'));
        } elseif ($request->input('delete_image_2') == '0') {
            if ($faq->image_url) {
                $this->deleteImage($faq->image_url);
                $faq->image_url = null;
            }
        }
        
        if ($request->hasFile('image_2')) {
            if ($faq->image_url2) {
                $this->deleteImage($faq->image_url2);
            }
            $faq->image_url2 = $this->uploadImage($request->file('image_2'));
        } elseif ($request->input('delete_image_2') == '0') {
            if ($faq->image_url2) {
                $this->deleteImage($faq->image_url2);
                $faq->image_url2 = null;
            }
        }


        $faq->save();

        return redirect()->route('FAQ.index')->with('success', 'Information updated successfully.');
    }

    private function uploadImage($imageFile)
    {

        $fileName = time() . '_' . $this->generateRandomString() . '.' . $imageFile->getClientOriginalExtension();

        $imageFile->move(public_path('image_info'), $fileName);

        return $fileName;
    }

    private function deleteImage($imageUrl)
    {
        if (!empty($imageUrl)) {
            $imagePath = public_path('image_info/' . $imageUrl);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
    }
    public function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }



    public function destroy($id)
    {
        $data = FAQ::findOrFail($id);
        $this->deleteImage($data->image_url);
        $this->deleteImage($data->image_url2);
        $data->delete();

        return redirect()->route('FAQ.index')->with('success', 'Information deleted successfully.');
    }

    public function getName(Request $request)
    {
        $id = $request->id;
        $sites = Sites::where('name', $id)->pluck('name', 'id');

        $options = '';
        foreach ($sites as $key => $item) {
            $options .= '<option value="' . $key . '">' . $item . '</option>';
        }

        return response()->json(['msg' => 'berhasil', 'id' => $id, 'data' => $options]);
    }

    public function getNameEdit(Request $request)
    {
        $id = $request->id;
        $sites = Sites::where('name', $id)->get();

        $option = "";
        foreach ($sites as $key => $item) {
            $option .= '<option value="' . $item->id . '">' . $item->name . '</option>';
        }

        return response()->json(['msg' => 'berhasil', 'id' => $id, 'data' => $option]);
    }

    public function getProject(Request $request)
    {
        $id = $request->id;
        $project = Project::where('name', $id)->pluck('name', 'id');

        $options = '';
        foreach ($project as $key => $item) {
            $options .= '<option value="' . $key . '">' . $item . '</option>';
        }

        return response()->json(['msg' => 'berhasil', 'id' => $id, 'data' => $options]);
    }

    public function getProjectEdit(Request $request)
    {
        $id = $request->id;
        $project= Project::where('name', $id)->get();

        $option = "";
        foreach ($project as $key => $item) {
            $option .= '<option value="' . $item->id . '">' . $item->name . '</option>';
        }

        return response()->json(['msg' => 'berhasil', 'id' => $id, 'data' => $option]);
    }


}
