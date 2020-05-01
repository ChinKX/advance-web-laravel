<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Division;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $divisions = Division::orderBy('name', 'asc')->get();
		//$divisions = Division::simplePaginate(5);
		//$divisions = Division::paginate(1);
		
		$divisions = Division::orderBy('name', 'asc')
		->when($request->query('code'), function($query) use ($request) {
			return $query->where('code', 'like', '%'.$request->query('code').'%');
		})		
		->when($request->query('name'), function($query) use ($request) { 
			return $query->where('name', 'like', '%'.$request->query('name').'%');
		})
		->when($request->query('state'), function($query) use ($request) {
			return $query->where('state', $request->query('state'));
		})
		->paginate(5);

		return view('divisions.index', [
            'divisions' => $divisions,
            'request' => $request
		]);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $division = new Division();
        return view('divisions.create', [
            'division' => $division,
        ]);
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param \Illuminate\Http\Request $request
    *
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $division = new Division;
        $division->fill($request->all());
        $division->save();

        return redirect()->route('division.index');
    }

    /**
    * Display the specified resource.
    *
    * @param int $id
    *
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $division = Division::find($id);
        if(!$division) throw new ModelNotFoundException;
        
        return view('divisions.show', [
            'division' => $division
        ]);
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param int $id
    *
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $division = Division::find($id);
        if(!$division) throw new ModelNotFoundException;

        return view('divisions.edit', [
            'division' => $division
        ]);
    }

    /**
    * Update the specified resource in storage.
    *
    * @param \Illuminate\Http\Request $request
    * @param int $id
    *
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        $division = Division::find($id);
        if(!$division) throw new ModelNotFoundException;

        $division->fill($request->all());

        $division->save();

        return redirect()->route('division.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$division = Division::find($id);
        $division->delete(); 
        return redirect()->route('division.index')
                        ->with('success','Division deleted successfully');
    }
}
