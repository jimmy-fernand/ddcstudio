<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Models\Project;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project = Project::all();
        $photos = Photo::orderBy("id", "desc")->paginate("12");
        return view('admin.photo.index', compact('photos', 'project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project=Project::all();
        return view('admin.photo.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'photo.*' => 'required|image|max:2048', // allow only image files with maximum size of 2MB
        ]);

        $project = Project::findOrFail($request->project_id);

        if ($request->hasFile('photo')) {
            foreach ($request->file('photo') as $file) {
                $path = $file->store("projetImage/" . $project->id, "public");
                $photo = new Photo([
                    'url' => $path,
                    'project_id' => $project->id,
                ]);
                $photo->save();
            }
            return back()->with('success', 'Photos uploaded successfully');
        }

        return back()->with('error', 'No photos selected for upload');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $photo = Photo::findOrFail($id);
        return view('admin.photos.show', compact('photo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $photo = Photo::findOrFail($id);
        return view('admin.photos.edit', compact('photo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'url' => 'required',
            'project_id' => 'required',
        ]);

        $photo = Photo::findOrFail($id);
        $photo->update($validatedData);

        return redirect()->route('admin.photos.show', $photo->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = Photo::findOrFail($id);
        $photo->delete();

        // return redirect()->route('admin.project');
        return redirect()->route('admin.project.index', $id)->with('success', 'La photo a été supprimée avec succès.');
    }

    public function deleteProjectPhoto($id, $photo_id)
    {
        $photo = Photo::findOrFail($photo_id);
        Storage::delete($photo->url);
        $photo->delete();
        return redirect()->back()->with('success', 'La photo a été supprimée avec succès.');
    }

}
