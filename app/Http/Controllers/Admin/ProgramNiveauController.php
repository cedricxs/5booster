<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Model\ProgramNiveau;
use App\Http\Model\SportProgram;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\View\View;

class ProgramNiveauController extends Controller
{
    /**
     * Get all Categories
     *
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $niveau = ProgramNiveau::paginate(5);
        return view('admin.niveau.index',['data'=>$niveau,'admin'=>$request->user()]);
    }

    public function create(Request $request)
    {
        return view('admin.niveau.create')->with(['admin'=>$request->user()]);
    }

    public function destroy($id_program_niveau)
    {
        $niveau = ProgramNiveau::find($id_program_niveau);
        $niveau->delete();
        $programs = SportProgram::where(['niveau'=>$id_program_niveau])->get();
        foreach ($programs as $program)
            $program->delete();
        return Response::json(['status'=>0,'msg'=>'delete '.$niveau->id_program_niveau.' successfully!']);
    }

    public function store(Request $request)
    {
        $data = [
            'program_niveau_name'=>$request['name']
        ];

        ProgramNiveau::create($data);
        return back()->with('msg','add the programme niveau successfully');
    }

    public function edit($id_program_niveau, Request $request)
    {
        $niveau = ProgramNiveau::find($id_program_niveau);
        return view('admin.niveau.edit',['niveau'=>$niveau,'admin'=>$request->user()]);
    }

    public function update(Request $request,$id_program_niveau)
    {
        $data = [
            'program_niveau_name'=>$request['name'],
        ];
        $niveau = ProgramNiveau::find($id_program_niveau);

        $niveau->update($data);
        return back()->with('msg','update the programme niveau successfully');
    }
}
