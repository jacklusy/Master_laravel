<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\ReplyMessage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    
    public function AllMessage(){
        $contact = Contact::latest()->get();
        return view('backend.contact.message_all',compact('contact'));
    }

    public function DeleteMessage($id){

        $Contact =  Contact::findOrFail($id);
       
        $Contact->delete();

        $notification = array(
            'message' => 'Message Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function ReplyMessage($id){
        $contactData = Contact::findOrFail($id);
        return view('backend.contact.reply_message',compact('contactData'));
    }

    public function StoreReplyMessage(Request $request) {
        
        ReplyMessage::insert([
            'user_id' => $request->user_id,
            'admin_id' => Auth::user()->id,
            'admin' => Auth::user()->name,
            'message_id' => $request->message_id,
            'message' => $request->message,
            'replymessage' => $request->replymessage,
            'created_at' =>Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Message Reply Successfully',
            'alert-type' => 'success'
        );

        $Contact =  Contact::findOrFail($request->message_id);
       
        $Contact->delete();

        return redirect()->route('all.replymessage')->with($notification);
    
    }

    public function AllReplyMessage() {
        $ReplyMessage = ReplyMessage::latest()->get();

        return view('backend.contact.all_reply_message',compact('ReplyMessage'));
    }

    public function DeleteReplyMessage($id){

        $ReplyMessage =  ReplyMessage::findOrFail($id);
       
        $ReplyMessage->delete();

        $notification = array(
            'message' => 'Reply Message Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
