<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Member;
use DB;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$groups = Group::orderBy('name', 'asc')->get();

		return view('groups.index', [
		    'groups' => $groups
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		$group = new Group();
		
		$members = Member::pluck('name','id');

		return view('groups.create', [
            'group' => $group,
            'members' => $members,
		]);
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
		$group = new Group;
		$group->fill($request->all());
		$group->save();
		
		$group->members()->sync($request->get('members'));
	
		return redirect()->route('group.index');
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
		$group = Group::find($id);
		if(!$group) throw new ModelNotFoundException;
		
		$members = Member::pluck('name','id');
	
		return view('groups.show', [
            'group' => $group,
            'members' => $members,
		]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
		$group = Group::find($id);
		if(!$group) throw new ModelNotFoundException;
		
		$members = Member::pluck('name','id');

		return view('groups.edit', [
            'group' => $group,
            'members' => $members,
		]);
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
        //
		$group = Group::find($id);
		if(!$group) throw new ModelNotFoundException;

		$group->fill($request->all());

		$group->save();
		
		$group->members()->sync($request->get('members'));

		return redirect()->route('group.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$group = Group::find($id);
        $group->delete();
        $deleted = DB::delete('delete from group_member where group_id = ?', [$id]);

        return redirect()->route('group.index')
                        ->with('success','Group deleted successfully');

    }
}
