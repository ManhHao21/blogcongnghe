<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ContactController extends Controller
{
    public function index(){
        if (Auth::user()->is_admin == 0 ){
            return redirect()->route('admin.post.index');
        }
        $contacts = Contact::paginate(3);
        return view('blocks.backend.contact.index', compact('contacts'));
    }
    public function show($id){
        if (Auth::user()->is_admin == 0 ){
            return redirect()->route('admin.post.index');
        }
        $contacts = Contact::where('id', $id)->get();
        return view('blocks.backend.contact.show', compact('contacts'));
    }
    public function delete($id){
        if (Auth::user()->is_admin == 0 ){
            return redirect()->route('admin.post.index');
        }
        $Contacts = Contact::find($id);
        return view('blocks.backend.contact.delete',compact('Contacts') );
    }
    public function deletecontact($id){
        if (Auth::user()->is_admin == 0 ){
            return redirect()->route('admin.post.index');
        }
        Contact::where('id', $id)->delete();
        return redirect()->route('admin.contact.index')->with('msg', 'Xóa danh mục thành công');
    }
    public function postShow($id) {
        if (Auth::user()->is_admin == 0 ){
            return redirect()->route('admin.post.index');
        }
        $contact = Contact::findOrFail($id);
        $contact->is_contact = 1;
        $contact->save();
        
        return redirect()->back()->with('msg', 'Duyệt liên hệ thành công');
    }
}
