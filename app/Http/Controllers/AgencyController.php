<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AgencyController extends Controller
{

    public function index()
    {
        $agencies = Agency::all();
        return view('index', compact('agencies'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'agent_code' => 'required|unique:agencies,agent_code',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'manager' => 'required',
        ]);

        $agency = new Agency();
        $agency->fill($request->all());
        $agency->save();

        $message = "Thêm mới đại lý $request->name thành công!";
        Session::flash('create_success', $message);
        return redirect()->route('agencies.index');

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

    public function edit($id)
    {
        $agency = Agency::findOrFail($id);
        return view('edit', compact('agency'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'agent_code' => 'required|unique:agencies,agent_code',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'manager' => 'required',
        ]);

        $agency = Agency::findOrFail($id);
        $agency->update([
            'agent_code' => $request->agent_code,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->input('email') ,
            'address' => $request->address,
            'manager' => $request->manager,
        ]);
        return redirect()->route('agencies.index');
    }

    public function destroy($id)
    {
        $agengy = Agency::findOrFail($id);
        $agengy->delete();

        return redirect()->route('agencies.index');
    }
}
