<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('chat/chat_index');
    }
    public function userContact()
    {
        $userId = Auth::user()->id;
        $chatObj = new Chat();
        return  $data = $chatObj->getUserContact($userId);
    }
    public function message(Request $request)
    {
        $therdId = $request->therdId;
        $userId = $request->userId;

        DB::table('chat')
            ->where('therd_id', $therdId)
            ->where('user_id', $userId)
            ->where('is_read', 'no')
            ->update([
                'is_read' => 'yes'
            ]);
        // DB::enableQueryLog();
        // DB::getQueryLog();
        // dd(Chat::where('therd_id', 2)->whereNull('deleted_at')->paginate(5));
        return DB::table('chat')->where('therd_id', $therdId)->whereNull('deleted_at')->orderBy('id', 'DESC')->paginate(5);
    }
    public function changeMessageStatus(Request $request)
    {
        $therdId = $request->room;
        $myId = $request->myId;
        // DB::enableQueryLog();
        // DB::getQueryLog();
        DB::table('chat')
            ->where('user_id', $myId)
            ->where('is_read', 'no')
            ->where('therd_id', $therdId)
            ->update([
                'is_read' => 'yes'
            ]);
        return $therdId;
    }
    public function storeMessage(Request $request)
    {
        $request->validate([
            'room' => ['required'],
            'myId' => ['required'],
            'message' => ['required'],
        ]);
        DB::table('chat')
            ->insert([
                'therd_id' => $request->room,
                'user_id'  => $request->myId,
                'message'  => $request->message,
                'type'  => 'text',
                'created_at'  => Date("Y-m-d H:i:s"),
            ]);
        return $request;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('chat/chat_create');
        
    }
    public function getChatUserListing(Request $request)
    {
        $userId = Auth::user()->id;
        $user = User::find($userId);
        $search=$request->search;
        // $userId = 6;
        if($user->hasRole('buyer') || $user->hasRole('supplier'))
        {
            return DB::table('users')
      ->select(DB::raw('id,first_name,last_name,email,profile_picture'))
      ->whereRaw("id NOT IN (SELECT REPLACE(CONCAT(user_id_from, user_id_to),'$userId','') AS user_id FROM `therd` WHERE user_id_from='$userId' OR user_id_to='$userId')")
      ->where('user_type','=','1')
      ->when($search, function ($query, $search) {
        return $query->whereRaw("CONCAT(first_name, last_name,email) like '%$search%'");
    })
      ->whereNull('deleted_at')
      ->get();
        }
        elseif($user->hasRole('admin'))
        {
            return DB::table('users')
            ->select(DB::raw('id,first_name,last_name,email,profile_picture'))
            ->whereRaw("id NOT IN (SELECT REPLACE(CONCAT(user_id_from, user_id_to),'$userId','') AS user_id FROM `therd` WHERE user_id_from='$userId' OR user_id_to='$userId')")
            ->where('id','!=',$userId)
            ->when($search, function ($query, $search) {
              return $query->whereRaw("CONCAT(first_name, last_name,email) like '%$search%'");
          })
            ->whereNull('deleted_at')
            ->get();
        }
        

    }
    // AND CONCAT(first_name, last_name,email) LIKE '%@%'
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(int $id)
    {
        $myId = Auth::user()->id;
        $userId=$id;
        DB::table('therd')
            ->insert([
                'user_id_from' =>  $myId,
                'user_id_to'  => $userId,
                'last_message_date'  => Date("Y-m-d H:i:s"),
            ]);
            return redirect()->back();
    }
    public function checkMapChat($sUserId,$bUserId)
    {
        $data= DB::select(DB::raw("select count(id) AS id_count from `therd` where (user_id_from ='$sUserId' AND user_id_to='$bUserId') Or (user_id_from ='$bUserId' AND user_id_to='$sUserId')"));
        if($data[0]->id_count > 0 )
        {
            return view('chat/chat_index');
        }
        else if($data[0]->id_count == 0)
        {
            DB::table('therd')
            ->insert([
                'user_id_from' => $sUserId,
                'user_id_to'  => $bUserId,
                'last_message_date'  => Date("Y-m-d H:i:s"),
            ]);
            return view('chat/chat_index');

        }
    }

   
}
