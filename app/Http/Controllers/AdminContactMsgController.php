<?php

namespace App\Http\Controllers;

use App\Models\Contact_msg;
use Illuminate\Http\Request;

class AdminContactMsgController extends Controller
{
    // List all contact messages
    public function index()
    {
        $contactMessages = Contact_msg::all(); 
        return view('admin.sections.contacts.index', compact('contactMessages'));
    }

    
    public function show($id)
    {
        $contactMessage = Contact_msg::findOrFail($id);
        return view('admin.sections.contacts.show', compact('contactMessage'));
    }

    
    public function updateStatus(Request $request, $id)
    {
        $contactMessage = Contact_msg::findOrFail($id);
        $contactMessage->status = $request->status;
        $contactMessage->save();

        return redirect()->route('admin.contacts.index')->with('success', 'Status updated successfully.');
    }

    public function markAsRead($id)
    {
        $message = Contact_msg::findOrFail($id);
        $message->update(['status' => 'read']);

        return redirect()->route('admin.contact_messages.index')->with('success', 'Message marked as read.');
    }

    public function markAsUnread($id)
    {
        $message = Contact_msg::findOrFail($id);
        $message->update(['status' => 'unread']);

        return redirect()->route('admin.contact_messages.index')->with('success', 'Message marked as unread.');
    }
}
