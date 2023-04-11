<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $contacts = Contact::paginate(10);
        return view('blocks.backend.contact.index', compact('contacts'));
    }
    public function show($id){
        $contacts = Contact::where('id', $id)->get();
        return view('blocks.backend.contact.show', compact('contacts'));
    }
    public function delete($id){
        $Contacts = Contact::find($id);
        return view('blocks.backend.contact.delete',compact('Contacts') );
    }
    public function deletecontact($id){
        Contact::where('id', $id)->delete();
        return redirect()->route('admin.contact.index')->with('msg', 'Xóa danh mục thành công');
    }
    public function postShow($id) {
        $contact = Contact::findOrFail($id);
        $contact->is_contact = 1;
        $contact->save();
        
        return redirect()->back()->with('msg', 'Duyệt liên hệ thành công');
    }
    

}
