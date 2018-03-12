<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Sale;
use App\Source;
use App\Service;
use App\Reason;
use App\Notification;
use App\User;
use Auth;

class SaleController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function index()
    {
    	$sales = Sale::where('status', '=', 'Follow up')->get();
    	return view('sales.index', compact('sales'));
    }

    public function create()
    {
        $source = Source::pluck('description', 'id');

        $service = Service::pluck('description', 'id');

        $reason = Reason::pluck('description', 'id');

        $users = User::pluck('name', 'id');

    	return view('sales.create', compact('source', 'service', 'reason', 'users'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'source_id' => 'required',
            'service_id' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'primary_phone' => 'required',
            'remarks' => 'required',
        ]);

        $sales = new Sale;
        $sales->source_id = $request->source_id;
        $sales->service_id = $request->service_id;
        $sales->name = $request->name;
        $sales->email = $request->email;
        $sales->primary_phone = $request->primary_phone;
        if ($request->secondary_phone) {
            $sales->secondary_phone = $request->secondary_phone;
        }
        $sales->remarks = $request->remarks;

        if ($request->next_follow_date) {
            $sales->next_follow_date = $request->next_follow_date;
            $sales->next_follow_time = $request->next_follow_time;
            $sales->remarks_nf = $request->remarks_nf;
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
        $sales->created_by = Auth::user()->id;
        $sales->save();

        // flash('Enquiry has been added');

        return redirect()->back()->with('success', 'New Enquiry Captured!');
    }

    public function show(Sale $sale)
    {
        $sale = Sale::findOrFail($sale->id);
        $sales = Sale::where('status', '=', 'Follow up')->get();
        $notifications = DB::table('notifications')->where('sale_id', $sale->id)->orderby('id', 'desc')->get();
        return view('sales.show', compact('sale', 'sales', 'notifications'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'source_id' => 'required',
            'service_id' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'primary_phone' => 'required',
            'remarks' => 'required',
        ]);

        $sales = Sale::find($request->id);
        $sales->source_id = $request->source_id;
        $sales->service_id = $request->service_id;
        $sales->name = $request->name;
        $sales->email = $request->email;
        $sales->primary_phone = $request->primary_phone;
        if ($request->secondary_phone) {
            $sales->secondary_phone = $request->secondary_phone;
        }
        $sales->remarks = $request->remarks;
        if ($request->next_followup) {
            $sales->next_followup = $request->next_followup;
            $sales->remarks_nf = $request->remarks_nf;
            $sales->status = 'Next Follow up';
        }
        if ($request->reason_id) {
            $sales->reason_id = $request->reason_id;
            $sales->status = 'Closed';
        }
        $sales->created_by = Auth::user()->id;
        $sales->save();

        // flash('Enquiry has been added');

        return redirect()->back()->with('success', 'Enquiry Updated!');
    }
}
