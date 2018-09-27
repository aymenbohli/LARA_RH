<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
use DB;

class PermissionsController extends Controller
{
 
   /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $Permissions = Permission::orderBy('id','DESC')->paginate(5);
        return view('Permissions.index',compact('Permissions'))
             ->with('i', ($request->input('page', 1) - 1) * 5);
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $permissions = Permission::pluck('display_name','id');
        return view('Permissions.create',compact('permissions')); //return the view with the list of permissions passed as an array
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:Permissions,name',
            'display_name' => 'required',
            'description' => 'required',
        ]);
        //create the new role
        $role = new Permission();
        $role->name = $request->input('name');
        $role->display_name = $request->input('display_name');
        $role->description = $request->input('description');
        $role->save();
       
        return redirect()->route('permissions.index')
            ->with('success','Permission created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $permissions = Permission::find($id); //Find the requested role
       
        //return the view with the role info and its permissions
        return view('Permissions.show',compact('permissions'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $Permissions = Permission::find($id);  //Find the requested role
        return view('Permissions.edit',compact('Permissions'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'display_name' => 'required',
            'description' => 'required',
        ]);
        $Permissions->display_name = $request->input('display_name');
        $Permissions->description = $request->input('description');
        $Permissions->save();
       
        return redirect()->route('Permissions.index')
            ->with('success','Permission updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        DB::table("Permissions")->where('id',$id)->delete();
        return redirect()->route('Permissions.index')
            ->with('success','Permission deleted successfully');
    }

}
