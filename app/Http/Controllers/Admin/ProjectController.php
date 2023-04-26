<?php

namespace App\Http\Controllers\admin;

use App\Models\Photo;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Support\Facades\Storage;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projet = Project::orderBy("id", "desc")->paginate(12);
        return view('admin.project.index', compact('projet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorie=Categorie::all();
        return view('admin.project.create',compact('categorie'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            "categorie_id"=>"required",
            "title" => "required",
            "description" => "required",
            "finished" => "required",
        ]);
        $project = Project::create(
            [
                "categorie_id"=>$request->categorie_id,
                "title" => $request->title,
                "description" => $request->description,
                "finished" => $request->finished
            ]
        );
        if (!is_null($request->photo_principale)) {
            $file = $request->photo_principale->store("projetImage", "public");
            Photo::create([
                "url" => $file,
                "project_id" => $project->id,
                "principale" => 1
            ]);
        } else {
            return back()->with('error', 'photo principal is required');
        }
        if (!is_null($request->photo)) {
            foreach ($request->photo as $item) {
                $file = $item->store("projetImage/".$project->id, "public");
                Photo::create([
                    "url" => $file,
                    "project_id" => $project->id
                ]);
            }
        } else {
            return back()->with('error', 'photo is required');
        }
        return back()->with('success', 'Project is saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd(substr("Hello world",-2));
        $categories = Categorie::all();
        $project = Project::findOrFail($id);
        $photo = Photo::where('project_id', $project->id)->get();
        return view('admin.project.show', compact('project', 'photo', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        // $categories = Categorie::all();
        $project = Project::findOrFail($id);
        $data = $request->validate(
            [
                "categorie_id" => "required",
                "title" => "required",
                "description" => "required",
                "finished" => "required"
            ]
        );
        $project->update(
            [
                "categorie_id" =>$request->categorie_id,
                "title" => $request->title,
                "description" => $request->description,
                "finished" => $request->finished
            ]
        );
        if ($request['principale']) {
            $oldPrincipale = Photo::where('project_id', $project->id)->where('principale', 1)->first();
            $oldPrincipale->update(
                [
                    'principale' => 0
                ]
            );
            $newPrincipale = Photo::where('project_id', $project->id)->where('id', $request->principale)->first();
            $newPrincipale->update(['principale' => 1]);
        }
        if ($request['imagesProject']) {
            foreach ($request['imagesProject'] as $key => $itemI) {
                $itemI = $itemI->store("projetImage", "public");
                $image = DB::table('photos')
                    ->where('id', $key)
                    ->where('project_id', $project->id)
                    ->update([
                        'url' => trim(htmlentities($itemI)),
                    ]);
            }
        }
        return back()->with("success", "project is update successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project=Project::findOrFail($id);
        foreach($project->photos as $item){
            $item->delete();
        }
        $project->delete();
        return back()->with("success", "project is deleted successfully");

    }


    public function deleteProjectPhoto($id, $photo_id)
    {
        $photo = Photo::findOrFail($photo_id);
        Storage::delete($photo->url);
        $photo->delete();

        return redirect()->route('admin.project.show', $id)->with('success', 'La photo a été supprimée avec succès.');
    }

    public function storeProjectPhoto(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $request->validate([
            'photo' => 'required|image',
        ]);

        $photo = new Photo;
        $photo->project_id = $project->id;
        $photo->principale = false;

        $photo->url = $request->file('photo')->store("projetImage","public");

        $photo->save();

        return redirect()->back()->with('success', 'La photo a été ajoutée avec succès.');
    }


}
