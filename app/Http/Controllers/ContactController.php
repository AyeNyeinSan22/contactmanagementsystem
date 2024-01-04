<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Title;
class ContactController extends Controller
{
    public function index(){
        $contact=Contact::latest()->paginate(10);
        $title=Title::all();
        return view('contacts.contact',[
            "contacts" => $contact,
            "titles"=>$title
        ]);
    }

    public function detail($id){
        $contact=Contact::find($id);
        return view('contacts.detail',[
            "contact" => $contact,
        ]);
    }

  public function add(){
   $title=Title::all();
   return view('contacts.add',[
    "titles" => $title
   ]);
  }

  public function create(){
       $validator=validator(request()->all(),[
        'name' => 'required',
        'phone' => 'required',
        'email' => 'required'
       ]);

       if($validator->fails()){
        return back()->withErrors($validator);
       }

       $contact=new Contact();
       $contact->name=request()->name;
       $contact->phone=request()->phone;
       $contact->email=request()->email;
       $contact->title_id=request()->title_id;
       $contact->save();
       return redirect('/contacts');
  }

  public function edit($id){
    $contact=Contact::find($id);
    $titles=Title::all();
    return view('contacts.edit',[
        "contact" => $contact,
        "titles" => $titles
    ]);
  }

  public function update($id){
    $validator=validator(request()->all(),[
        'name' => 'required',
        'phone' => 'required',
        'email' => 'required'
       ]);

       if($validator->fails()){
        return back()->withErrors($validator);
       }

       $contact=Contact::find($id);
       $contact->name=request()->name;
       $contact->phone=request()->phone;
       $contact->email=request()->email;
       $contact->title_id=(int)request()->title_id;
       $contact->save();
       return redirect('/contacts');
  }

    public function delete($id){
        $contact=Contact::find($id);
        $contact->delete();
        return back();
    }


    public function showContactByTitle($title_id){
        $contact=Contact::where('title_id',$title_id)->get();
        $titles=Title::all();
        return view('contacts.show',[
            'contacts' => $contact,
            'titles' => $titles,
        ]);

    }
    public function deleteAll()
    {

    }
}
