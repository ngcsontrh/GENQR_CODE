<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
class ContactsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $contacts = Contact::query();
        if ($search) {
            $contacts = $contacts->where('name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->orWhere('phone', 'like', '%' . $search . '%');
        }
        $contacts = $contacts->orderBy('created_at','desc')->paginate(5);
        return view('admins.contacts.index', compact('contacts'));
    }
    public function toggleStatus(Request $request, $id)
    {
        $contact = Contact::find($id);

        if ($contact) {
            $contact->status = $request->input('status');
            $contact->save();

            return response()->json(['success' => true, 'message' => 'Trạng thái đã được cập nhật.']);
        }

        return response()->json(['success' => false, 'message' => 'Không tìm thấy liên hệ.']);
    }
}
