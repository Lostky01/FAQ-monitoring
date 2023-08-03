<?php

namespace App\Http\Controllers;

use App\Information;
use App\Domain;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class InfoController extends Controller
{
    public function index()
    {

        $data = Information::join('projects', 'informations.project_id', '=', 'projects.id')
            ->join('domains', 'informations.domain_id', '=', 'domains.id')
            ->select('informations.*', 'projects.name as nama_project', 'projects.logo', 'domains.name as nama_domain', 'informations.created_at')
            ->orderBy('informations.date', 'desc')
            ->orderBy('projects.name', 'asc')
            ->orderBy('informations.title', 'asc')
            ->get();

        $list_site = Project::select('projects.*')   
            ->orderBy('projects.name', 'asc')
            ->groupBy('projects.name')
            ->get();
        

        $i_data = 0;
        foreach($data as $item) {
            $baseid[] = $item->id;
            if($item->image_url!='' || $item->image_url2!='' || $item->image_url3!='' || $item->image_url4!='') {
                $images[$item->id][] = $item->image_url == '' ? '' : asset('image_info/' . $item->image_url);
                $images[$item->id][] = $item->image_url2 == '' ? '' : asset('image_info/' . $item->image_url2);
                $images[$item->id][] = $item->image_url3 == '' ? '' : asset('image_info/' . $item->image_url3);
                $images[$item->id][] = $item->image_url4 == '' ? '' : asset('image_info/' . $item->image_url4);
            } else {
                $images[$item->id][] = '';
            }
            
        }
        // dd($images);

        return view('info.index', compact('data', 'list_site', 'images', 'baseid'));
    }

    /* public function cari()
    {
         $cari = $request('cari');
    } */

    public function create()
    {
        $projects = Project::pluck('name', 'id');
        $domains = Domain::pluck('name', 'id');

        return view('info.create', compact('projects', 'domains'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'project' => 'required',
            'domain' => 'required',
            'title' => 'required',
            'description' => 'required',
            'date' => 'required|date',
            'image_1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Save the information details
        $information = new Information();
        $information->project_id = $request->project;
        $information->domain_id = $request->domain;
        $information->title = $request->title;
        $information->description = $request->description;
        $information->date = $request->date;


        if ($request->hasFile('image_1')) {
            $information->image_url = $this->uploadImage($request->file('image_1'));
        }


        if ($request->hasFile('image_2')) {
            $information->image_url2 = $this->uploadImage($request->file('image_2'));
        }


        if ($request->hasFile('image_3')) {
            $information->image_url3 = $this->uploadImage($request->file('image_3'));
        }


        if ($request->hasFile('image_4')) {
            $information->image_url4 = $this->uploadImage($request->file('image_4'));
        }

        $information->save();

        return redirect()->route('info.index')->with('success', 'Information created successfully.');
    }

    public function update(Request $request, $id)
    {
        $info = Information::findOrFail($id);

        $request->validate([
            'project' => 'required',
            'domain' => 'required',
            'title' => 'required',
            'description' => 'required',
            'date' => 'required|date',
            'image_1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $info->project_id = $request->input('project');
        $info->domain_id = $request->input('domain');
        $info->title = $request->input('title');
        $info->description = $request->input('description');
        $info->date = $request->input('date');


        if ($request->hasFile('image_1')) {
            if ($info->image_url) {
                $this->deleteImage($info->image_url);
            }
            $info->image_url = $this->uploadImage($request->file('image_1'));
        } elseif ($request->input('delete_image_1')) {
            if ($info->image_url) {
                $this->deleteImage($info->image_url);
                $info->image_url = null;
            }
        }


        if ($request->hasFile('image_2')) {
            if ($info->image_url2) {
                $this->deleteImage($info->image_url2);
            }
            $info->image_url2 = $this->uploadImage($request->file('image_2'));
        } elseif ($request->input('delete_image_2')) {
            if ($info->image_url2) {
                $this->deleteImage($info->image_url2);
                $info->image_url2 = null;
            }
        }


        if ($request->hasFile('image_3')) {
            if ($info->image_url3) {
                $this->deleteImage($info->image_url3);
            }
            $info->image_url3 = $this->uploadImage($request->file('image_3'));
        } elseif ($request->input('delete_image_3')) {
            if ($info->image_url3) {
                $this->deleteImage($info->image_url3);
                $info->image_url3 = null;
            } 
        }
                                                                              

        if ($request->hasFile('image_4')) {
            if ($info->image_url4) {
                $this->deleteImage($info->image_url4);
            }
            $info->image_url4 = $this->uploadImage($request->file('image_4'));
        } elseif ($request->input('delete_image_4')) {
            if ($info->image_url4) {
                $this->deleteImage($info->image_url4);
                $info->image_url4 = null;
            }
        }

        $info->save();

        return redirect()->route('info.index')->with('success', 'Information updated successfully.');
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

    private function uploadImage($imageFile)
    {
        // Generate a unique filename for the image
        $fileName = time() . '_' . uniqid() . '.' . $imageFile->getClientOriginalExtension();

        // Move the image to the image_info folder
        $imageFile->move(public_path('image_info'), $fileName);

        return $fileName;
    }
    public function edit($id)
    {
        $data = Information::findOrFail($id);
        $projects = Project::pluck('name', 'id');
        $domains = Domain::where('project_id', $data->project_id)->pluck('name', 'id');

        return view('info.edit', compact('data', 'projects', 'domains'));
    }

    public function destroy($id)
    {
        $data = Information::find($id);
        $this->deleteImage($data->image_url);
        $this->deleteImage($data->image_url2);
        $this->deleteImage($data->image_url3);
        $this->deleteImage($data->image_url4);
        $data->delete();

        return redirect()->route('info.index')->with('success', 'Information deleted successfully.');
    }


    private function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function getDomain(Request $request)
    {
        $id = $request->id;
        $domains = Domain::where('project_id', $id)->pluck('name', 'id');

        $options = '';
        foreach ($domains as $key => $item) {
            $options .= '<option value="' . $key . '">' . $item . '</option>';
        }

        return response()->json(['msg' => 'berhasil', 'id' => $id, 'data' => $options]);
    }

    public function getDomainEdit(Request $request)
    {
        $id = $request->id;
        $data = Domain::where('project_id', $id)->get();

        $option = "";
        foreach ($data as $key => $item) {
            $option .= '<option value="' . $item->id . '">' . $item->name . '</option>';
        }

        return response()->json(['msg' => 'berhasil', 'id' => $id, 'data' => $option]);
    }
}
