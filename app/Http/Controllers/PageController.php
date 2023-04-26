<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Contact;
use App\Models\Project;
use App\Models\Service;
use App\Models\Categorie;
use App\Mail\ContactMail;
use App\Mail\ContactMails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function index()
    {
        $project = Project::orderBy("id", "desc")->paginate("12"); //->get(); 
        $service = Service::all();
        $categorie = Categorie::all();
        return view('website.home', compact('project', 'service', 'categorie'));
    }
    public function about()
    {
        return view('website.about');
    }
    public function service()
    {
        $service = Service::all();
        return view('website.service', compact('service'));
    }
    public function categorie()
    {
        $categorie = Categorie::all();
        return view('website.categorie', compact('categorie'));
    }
    public function project()
    {
        $project = Project::orderBy("id", "desc")->get();   //paginate("6");
        $categorie = categorie::all();  

        return view('website.project', compact("project", "categorie"));
    }
    public function contact()
    {
        return view('website.contact');
    }
    public function sendMessage(Request $request)
    {
        // dd($request->all());
        $data = $request->validate(
            [
                "firstName" => "required",
                "lastName" => "required",
                "email" => "required|email",
                "title" => "required",
                "message" => "required"
            ]
        );
        DB::beginTransaction();
        try{
            $contact= Contact::create(
                [
                    "firstName" => $request->firstName,
                    "lastName" => $request->lastName,
                    "email" => $request->email,
                    "title" => $request->title,
                    "message" => $request->message
                ]
            );
    
            Mail::to($request->email)->send(new ContactMail($contact)); 
            DB::commit();
                   return back()->with('success', 'your message is sended successfully');

        }catch (Exception $e) {
            DB::rollBack();
            dd(
                [
                    $e->getMessage(),
                    $e->getLine(),
                    
                ]
                );
            # code...
        }
 
    }
    public function projectDetail($id)
    {
        $project = Project::findOrFail($id);
        return view('website.projectdetail', compact('project'));
    }
}
