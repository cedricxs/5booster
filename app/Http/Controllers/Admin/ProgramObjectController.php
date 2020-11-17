<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Model\ProgramObject;
use App\Http\Model\SportProgram;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\View\View;

class ProgramObjectController extends Controller
{
    /**
     * Get all Categories
     *
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $object = ProgramObject::paginate(5);
        return view('admin.object.index',['data'=>$object,'admin'=>$request->user()]);
    }

    public function create(Request $request)
    {
        return view('admin.object.create')->with(['admin'=>$request->user()]);
    }

    public function destroy($id_program_object)
    {
        $object = ProgramObject::find($id_program_object);
        $object->delete();
        $programs = SportProgram::where(['object'=>$id_program_object])->get();
        foreach ($programs as $program)
            $program->delete();
        return Response::json(['status'=>0,'msg'=>'delete '.$object->id_program_object.' successfully!']);
    }

    public function store(Request $request)
    {
        $data = [
            'program_object_name'=>$request['name']
        ];

        ProgramObject::create($data);
        return back()->with('msg','add the programme object successfully');
    }

    public function edit($id_program_object, Request $request)
    {
        $object = ProgramObject::find($id_program_object);
        return view('admin.object.edit',['object'=>$object,'admin'=>$request->user()]);
    }

    public function update(Request $request,$id_program_object)
    {
        $data = [
            'program_object_name'=>$request['name'],
        ];
        $object = ProgramObject::find($id_program_object);

        $object->update($data);
        return back()->with('msg','update the programme object successfully');
    }
}
