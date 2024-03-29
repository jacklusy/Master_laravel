<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\ReplyMessage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class AllUserController extends Controller
{
    public function UserAccount() {
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('frontend.userdashboard.account_details',compact('userData'));
    }

    public function UserChangePassword() {
    
        return view('frontend.userdashboard.user_change_password');
    }

    public function ReplyMessagePage() {

        $id = Auth::user()->id;
        $replyMessage = ReplyMessage::where('user_id',$id)->orderBy('id','DESC')->get();
        return view('frontend.userdashboard.reply_message_page',compact('replyMessage'));
    }

    public function UserOrderPage() {
        $id = Auth::user()->id;
        $orders = Order::where('user_id',$id)->orderBy('id','DESC')->get();
        return view('frontend.userdashboard.user_order_page',compact('orders'));
    }

    public function UserOrderDetails($order_id){

        $order = Order::with('state','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
        $orderItem = Order_item::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();

        return view('frontend.order.order_details',compact('order','orderItem'));


    }
    
    public function UserOrderInvoice($order_id) {
        
        $order = Order::with('state','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
        $orderItem = Order_item::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();

        $pdf = Pdf::loadView('frontend.order.order_invoice', compact('order','orderItem'))->setPaper('a4')->setOption([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
        
        }
}
