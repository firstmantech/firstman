<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use App\Sale;
use DB;
use App\Reason;
use App\User;
use App\Service;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notification = Notification::findOrFail($id);
        $sales = Sale::where('status', '=', 'Follow up')->get();
        $notes = DB::table('notifications')->where('sale_id', $notification->sale_id)->orderby('id', 'desc')->get();
        $reason = Reason::pluck('description', 'id');
         $users = User::pluck('name', 'id');
         $service = Service::pluck('description', 'id');
        return view('notifications.edit', compact('notification', 'sales', 'notes', 'reason', 'users', 'service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->next_follow_date) {
            $this->validate($request, [
                'comments' => 'required',
            ]);
        }

        $notification = Notification::findOrFail($id);
        $notification->comments = $request->comments;
        if ($request->reason_id) {
            $notification->status = 'Closed';
        }
        $notification->save();

        $note = DB::table('notifications')->where('id', $id)->first();

        //dd($note);

        $sales = Sale::find($note->sale_id);

        if ($request->next_follow_date) {
            $sales->next_follow_date = $request->next_follow_date;
            $sales->next_follow_time = $request->next_follow_time;
            $sales->remarks_nf = $request->comments;
            if ($request->assign_as == 'Temporary') {
                $sales->assign_to = $request->assign_to;
                $sales->assign_as = $request->assign_as;                
            }
            else
            {
                $sales->assign_to = $request->assign_to;
                $sales->assign_as = $request->assign_as;
                $sales->created_by = $request->assign_to;   
            }
            $sales->status = 'Follow up';
        }
        if ($request->reason_id) {
            $sales->reason_id = $request->reason_id;
            $sales->status = 'Closed';
        }
        if ($request->service) {
            $sales->service = $request->service;
            $sales->price = $request->price;
            $sales->status = 'Sales';
        }
        $sales->save();

        // flash('Enquiry has been added');

        return redirect('sales')->with('success', 'Comment Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
