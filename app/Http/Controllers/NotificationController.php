<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use App\Models\Notification;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $someNot = Notification::where([
                ['user_id' , '!=' , auth()->user()->id],
                ['post_userId' , '=' , auth()->user()->id]
        ])
        ->orderBy('created_at' , 'desc')
        ->limit(3)
        ->get();

        $data = [];
        foreach ($someNot as $item) {
            $data [] = [
               'user_name'  => User::find($item->user_id)->name,
               'user_image' => User::find($item->user_id)->profile_photo_url,
               'post_title' => Post::find($item->post_id)->title,
               'post_slug'  => Post::find($item->post_id)->slug,
               'data'       => $item->created_at->diffForHumans()
            ];
        }
        
       //Alerts
        $alert = Alert::where('user_id' , auth()->user()->id)->first();
        $alert->alert = 0;
        $alert->save();

        return response()->json(['someNot' => $data]);
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
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function show(Notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function edit(Notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notification $notification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notification $notification)
    {
        //
    }
}
