<?php

namespace App\Http\Controllers;

use App\Models\AllMember;
use App\Models\RelationShip;
use App\Http\Requests\StoreRelationShipRequest;
use App\Http\Requests\UpdateRelationShipRequest;

class RelationShipController extends Controller
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
     * @param  \App\Http\Requests\StoreRelationShipRequest  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(StoreRelationShipRequest $request)
    {
        if(!isset($request->custom)){
            $request->validate([
                'related_to_id' => 'required',
                'relation_id' => 'required'
            ]);
            $relation = new RelationShip();
            $relation->relation_id = $request->relation_id;
            $relation->related_to_id = $request->related_to_id;
            $relation->member_id = $request->member_id;
            $relation->save();
            $details = 'New relationship added';
            addActivity($relation->id, $details);
        }else{
            $messages = array(
                'ic_no.unique' => 'The IC No already been used',
            );
            $request->validate([
                'member_name' => 'required',
                'ic_no' => 'required|unique:all_members,ic_no',
                'telephone' => 'required',
                'relation_id' => 'required',
            ], $messages);

            $allMember = new AllMember();
            $allMember->name = $request->member_name;
            $allMember->ic_no = $request->ic_no;
            $allMember->mobile_phone = $request->telephone;
            $allMember->save();

            $details = 'New member added';
            addActivity($allMember->id, $details);

            $relation = new RelationShip();
            $relation->relation_id = $request->relation_id;
            $relation->related_to_id = $allMember->id;
            $relation->member_id = $request->member_id;

            $relation->save();

            $details = 'New relationship added';
            addActivity($relation->id, $details);
        }
        $message = trans('lang.relationship_added_successfully_alert');
        return redirect()->route('member.family', $request->member_id)->with('alert-success', $message);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RelationShip  $relationShip
     * @return \Illuminate\Http\Response
     */
    public function show(RelationShip $relationShip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RelationShip  $relationShip
     * @return \Illuminate\Http\Response
     */
    public function edit(RelationShip $relationShip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRelationShipRequest  $request
     * @param  \App\Models\RelationShip  $relationShip
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRelationShipRequest $request, RelationShip $relationShip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RelationShip  $relationShip
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy($relationShip)
    {
        $relationShip = RelationShip::where('id', '=', $relationShip)->first();
        $member_id = $relationShip->member_id;


        $details = 'One relationship Deleted';
        addActivity($relationShip->id, $details);
        $relationShip->delete();

        $message = trans('lang.relationship_deleted_successfully_alert');
        return redirect()->route('member.family', $member_id)->with('alert-danger', $message);
    }
}
