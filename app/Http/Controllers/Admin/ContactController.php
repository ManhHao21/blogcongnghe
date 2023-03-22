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

    public function delete($id){
        Contact::where('id', $id)->delete();
        return redirect()->route('admin.contact.index')->with('msg', 'Xóa liên hệ thành công');
    }
}
