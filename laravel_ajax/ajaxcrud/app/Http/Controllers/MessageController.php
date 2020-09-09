<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;

class MessageController extends Controller
{
    public function index()
    {
    	$messages = Message::all();
    	return view('messageform')->with('messages',$messages);
    }
    public function store(Request $request)
    {
    	$messages = new Message;

    	$messages->admin_id = $request->input('admin_id');
    	$messages->title = $request->input('title');
    	$messages->message = $request->input('message');

    	$messages->save();
    }
    public function update(Request $request, $id)
    {
    	$messages = Message::find($id);

    	$messages->admin_id = $request->input('admin_id');
    	$messages->title = $request->input('title');
    	$messages->message = $request->input('message');
    	$messages->save();
    }
    public function delete( $id)
    {
    	$messages = Message::find($id);
    	$messages->delete();
    	return $messages;

    }
    public function selectedmessage($id)
    {
    	$messages = Message::find($id);
    	//echo "$messages";
    	return view('selectedmessage')->with('messages',$messages);
    }
}
