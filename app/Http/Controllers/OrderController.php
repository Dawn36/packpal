<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Bids;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(string $status)
    {
        $userId = Auth::user()->id;
        $active = '';
        $inactive = '';
        $complete = '';
        $reject = '';
        $heading='';
        $title2='';
        if ($status == 'offer') {
            $title = "Offers";
            $heading="Here we have list of all the offers received from Suppliers on your BID. You can ACCEPT or REJECT the Offer from here and even use our Chat feature here to chat with the Supplier directly and visit and see Suppliers page and details by clicking on the name. You may Contact Support for any issues.";
            $title2="List of Offers";
            $active = 'active';
            $color = 'warning';
        }
        if ($status == 'inprocess') {
            $heading="Here we have list of all the offers that are accepted and are now In-process to Completion. You can still use our Chat feature here and see supplier reviews and details. DONT FORGET to click the completion button once the order is completed. You may Contact Support for any issues.";
            $title2="List of In-Process Offers";
            $title = "In-process";
            $inactive = 'active';
            $color = 'info';
        }
        if ($status == 'complete') {
            $heading="Here we have list of all the offers that were In-process and are now Completed. You can still use our Chat feature here and see suppliers earlier reviews and details. DONT FORGET to REVIEW THE SUPPLIER AND SHARE YOUR FEEDBACK by clicking on the Star Button. The Reviews and Feedback for the Supplier may help other Buyers to do business with confidence. You may Contact Support for any issues.";
            $title2="List of Completed Offers";
            $title = "Completed";
            $complete = 'active';
            $color = 'success';
        }
        if ($status == 'reject') {
            $heading="Here we have list of all the offers that are rejected by you. You may Contact Support for any issues.";
            $title2="List of Rejected Offers";
            $title = "Rejected";
            $reject = 'active';
            $color = 'danger';
        }
        $orderObj = new Order();
        $order = $orderObj->orderDataBuyer($status, $userId);
        $orderStatusCount = $orderObj->orderStatusCountBuyer($userId);
        return view('buyer-order/buyer_order_index', compact('orderStatusCount', 'order', 'active', 'title2','heading','inactive', 'complete', 'reject', 'title', 'color'));
    }
    

    public function orderAcceptReject(int $id, $status,$bidId)
    {
        $order = Order::Find($id);
        $buyer=User::find($order->b_user_id);
        $supplier=User::find($order->s_user_id);
        $bid=Bids::find($bidId);
        $order->status = $status;
        if($order->status == 'inprocess')
        {
            $bid->show_bid='no';
            $bid->save();
            Order::where('bids_id', $bidId)->where('status','offer')->whereNull('deleted_at')->where('id','!=',$id)
            ->update(['show_offer' => 'no']);
            // supplier
            $toEmail=$supplier->email;
            $subject = "OFFER ACCEPTED BY THE BUYER OF THE BID ($bid->bids_name)!";
            $data['full_name']=$supplier->first_name." ".$supplier->last_name;
            $data['bid_name']=$bid->bids_name;
            $fileName='in_process_supplier';
            sendEmail($toEmail,$subject,$fileName,$data);
            // buyer
            $toEmail=$buyer->email;
            $subject = "YOU ACCEPTED THE OFFER OF THE BID ($bid->bids_name) GIVEN BY THE SUPPLIER!";
            $data['full_name']=$buyer->first_name." ".$buyer->last_name;
            $data['bid_name']=$bid->bids_name;
            $fileName='in_process_buyer';
            sendEmail($toEmail,$subject,$fileName,$data);
        }
        if($order->status == 'reject')
        {
            $bid->show_bid='yes';
            $bid->save();
            Order::where('bids_id', $bidId)->where('status','offer')->whereNull('deleted_at')->where('id','!=',$id)
            ->update(['show_offer' => 'yes']);
        }
        $order->save();
        return redirect()->back();
    }

    public function reviewCreate(Request $request)
    {
        $orderId = $request->orderId;
        return view('buyer-order/buyer_order_feedback', compact('orderId'));
    }
    public function completeOrder($orderId,$bidId)
    {
        $bids=Bids::find($bidId);
        $bids['status']='completed';
        $bids->save();
        $order = Order::Find($orderId);
        $buyer=User::find($order->b_user_id);
        $supplier=User::find($order->s_user_id);
        $order->status = 'complete';
        $order->save();
         // supplier
         $toEmail=$supplier->email;
         $subject = "THE BID ($bids->bids_name) HAS BEEN COMPLETED";
         $data['full_name']=$supplier->first_name." ".$supplier->last_name;
         $data['bid_name']=$bids->bids_name;
         $fileName='bid_complete_supplier';
         sendEmail($toEmail,$subject,$fileName,$data);
         // buyer
         $toEmail=$buyer->email;
         $subject = "YOUR BID ($bids->bids_name) HAS BEEN COMPLETED";
         $data['full_name']=$buyer->first_name." ".$buyer->last_name;
         $data['bid_name']=$bids->bids_name;
         $fileName='bid_complete_buyer';
         sendEmail($toEmail,$subject,$fileName,$data);
         
        return redirect()->back();
    }
    public function reviewStore(Request $request)
    {
        $loginUserId = Auth::user()->id;
        $orderId = $request->order_id;
        $request->validate([
            'rating' => ['required'],
            'comment' => ['required'],
            'order_id' => ['required']
        ]);
        $order = Order::Find($orderId);
        $bidId = $order->bids_id;
        $order->feed_back = 'yes';
        $order->status = 'complete';
        $order->save();


        DB::table('reviews')->insert([
            'from_user_id' => $loginUserId,
            'to_user_id' => $order->s_user_id,
            'bids_id' => $bidId,
            'order_id' => $orderId,
            'star' => $request->rating,
            'comment' => $request->comment,
            'created_by' => Auth::user()->id,
            'created_at' => Date("Y-m-d"),
        ]);
        return redirect()->back();
    }

    public function supplierCreate(Request $request)
    {
        $userId = $request->userId;

        $orderObj = new Order();
        $supplierObj = new Supplier();
        $userData = User::find($userId);
        $rating = $orderObj->ratingCount($userId);
        $review = $orderObj->orderDataBitReview($bidId = '', $userId);
        $ratingOverAll = $supplierObj->supplierReviews($userId);
        $ratingOverAll = round($ratingOverAll[0]->rating);
        // return view('company/company_info', compact('addClass', 'userData', 'ownCategory', 'ownSubCategory', 'adds', 'rating', 'ratingDetail'));
        return view('supplier/supplier_info', compact('userData', 'review', 'rating', 'ratingOverAll'));
    }
    public function supplierOrderStatus(string $status)
    {
        
        $userId = Auth::user()->id;
        $orderObj = new Order();
        $supplierObj = new Supplier();
        $active = '';
        $inactive = '';
        $complete = '';
        $reject = '';
        $reviews = '';
        $title = '';
        $color = '';
        $userData = '';
        $rating = '';
        $review = '';
        $heading='';
        $titleTop='';
        $ratingSupplier = '';
        if ($status == 'offer') {
            $title = "Offers";
            $titleTop='List of Offers';
            $heading='Here we have list of all the offers posted against the BIDs posted by the Buyers. Your offer can either be ACCEPTED or REJECTED by the Buyer. Use our Chat feature here to chat with the Buyer directly and even review the BID details again by clicking on the Bid Name. You may Contact Support for any issues.';
            $active = 'active';
            $color = 'warning';
        }
        if ($status == 'inprocess') {
            $title = "In-process";
            $titleTop='List of In-Process Offers';
            $heading='Here we have list of all the offers that are accepted by the Buyers and are now In-process to Completion. You can still use our Chat feature here and even re-negotiate price. The Offer can also be rejected due to any possible reason(s). You may Contact Support for any issues.';
            $inactive = 'active';
            $color = 'info';
        }
        if ($status == 'complete') {
            $title = "Completed";
            $titleTop='List of Completed Offers';
            $heading='Here we have list of all the offers that were In-process and are now Completed. You can still use our Chat feature here and ask buyers for Review. The Reviews and Feedback may help other Buyers to do business with confidence. You may Contact Support for any issues.';
            $complete = 'active';
            $color = 'success';
        }
        if ($status == 'reject') {
            $title = "Rejected";
            $titleTop='List of Rejected Offers';
            $heading='Here we have list of all the offers that are rejected by the Buyers. You may Contact Support for any issues';
            $reject = 'active';
            $color = 'danger';
        }
        if ($status == 'reviews') {
            $reviews = 'active';
            $titleTop='Reviews';
            $userData = User::find($userId);
            $rating = $orderObj->ratingCount($userId);
            $review = $orderObj->orderDataBitReview($bidId = '', $userId);
            $ratingSupplier = $supplierObj->supplierReviews($userId);
            $ratingSupplier = round($ratingSupplier[0]->rating);
        }
        $order = $orderObj->orderDataSupplier($status, $userId);
        $orderStatusCount = $orderObj->orderStatusCount($userId);
        return view('supplier/supplier_order_index', compact('orderStatusCount', 'order', 'active','titleTop', 'inactive', 'complete', 'reject', 'title', 'color', 'reviews', 'userData', 'review', 'rating', 'ratingSupplier','heading'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $orderId = $request->orderId;
        $sUserId = $request->sUserId;
        $bUserId = $request->bUserId;
 
        return view('supplier/supplier_edit_order', compact('orderId','sUserId','bUserId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        
        $request->validate([
            'offer_price' => ['required'],
            
        ]);
        $order = Order::find($id);
        $old=$order->offer_price;
        $sUserId=$request->s_user_id;
        $bUserId=$request->b_user_id;
        $data= DB::select(DB::raw("select count(id) AS id_count, id AS therd_id from `therd` where (user_id_from ='$sUserId' AND user_id_to='$bUserId') Or (user_id_from ='$bUserId' AND user_id_to='$sUserId')"));
        if($data[0]->id_count > 0)
        {
            $message ="Offer price change old offer price is : $old and the new offer price is : $request->offer_price";
            DB::table('chat')
            ->insert([
                'therd_id' => $data[0]->therd_id,
                'user_id'  => $sUserId,
                'message' =>$message,
                'created_at'  => Date("Y-m-d H:i:s"),
            ]);
        }
        $order->offer_price = $request->offer_price;
        $order->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $data = Order::find($id);
        $data->delete();
        return redirect()->back();
    }
}
