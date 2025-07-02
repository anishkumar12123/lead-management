<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{

     public function index(Request $request)
    {
        $query = Lead::with('user');

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('lead_given_date', [$request->start_date, $request->end_date]);
        }

        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        $leads = $query->get();
        $users = User::all();

        return view('leads.index', compact('leads', 'users'));
    }

    // public function create()
    // {
    //     $users = User::all();
    //     return view('leads.create', compact('users'));
    // }
    public function create()
    {
        $users = User::all();
        return view('leads.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|digits:10',
            'enquiry_for' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'lead_type' => 'required|in:Hot,Warm,Cold',
            'status' => 'required|in:In Progress,Not Interested,Converted,Done,Not Done',
            'lead_given_date' => 'required|date',
            'user_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Lead::create($request->all());

        return redirect()->route('leads.index')->with('success', 'Lead created successfully!');
    }
}
