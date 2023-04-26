<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.services.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "title" => "required|unique:services,title",
            "description" => "required",
        ]);
        if (!is_null($request->photo)) {
            $file = $request->photo->store("imageS", "public");
            Service::create(
                [
                    "title" => $request->title,
                    "description" => $request->description,
                    "photo" => $file
                ]
            );
        } else {
            Service::create(
                [
                    "title" => $request->title,
                    "description" => $request->description,
                ]
            );
        }
        return back()->with('success', 'service is save successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.show', compact('service'));
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
        // dd($request->all());
        $service = Service::findOrFail($id);
        $data = $request->validate(
            [
                "title" => "required",
                "description" => "required"
            ]
        );
        if (!is_null($request->photo)) {
            $file = $request->photo->store("imageS", "public");
            $service->update(
                [
                    "title" => $request->title,
                    "description" => $request->description,
                    "photo" => $file
                ]
            );
        } else {
            $service->update(
                [
                    "title" => $request->title,
                    "description" => $request->description,
                ]
            );
        }
        return back()->with("success", "service is update successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service=Service::findOrFail($id);
        $service->delete();
        return back()->with("success", "service is deleted successfully");


    }
}
