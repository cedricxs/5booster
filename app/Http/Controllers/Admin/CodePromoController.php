<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Model\CodePromo;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Response;

class CodePromoController extends Controller
{

    public function index(Request $request)
    {
        $codepromos = CodePromo::paginate(5);
        return view('admin.codepromos.index',['data'=>$codepromos,'admin'=>$request->user()]);
    }

    public function create(Request $request)
    {
        return view('admin.codepromos.create')->with(['admin'=>$request->user()]);
    }

    public function store(Request $request)
    {
        $data = [
            'asso_name'=>$request['asso'],
            'code'=>$request['code'],
            'number'=>$request['number'],
        ];

        CodePromo::create($data);
        return back()->with('msg','add the code promotion successfully');
    }

    public function destroy($id_codepromo)
    {
        $codepromo = CodePromo::find($id_codepromo);
        $codepromo->delete();
        return Response::json(['status'=>0,'msg'=>'delete '.$codepromo->id_codepromo.' successfully!']);
    }

    public function edit($id_codepromo, Request $request)
    {
        $codepromo = CodePromo::find($id_codepromo);
        return view('admin.codepromos.edit',['codepromo'=>$codepromo,'admin'=>$request->user()]);
    }

    public function update(Request $request, $id_codepromo)
    {
        $data = [
            'asso_name'=>$request['asso'],
            'code'=>$request['code'],
            'number'=>$request['number'],
        ];
        $codepromo = CodePromo::find($id_codepromo);
        try{
            $codepromo->update($data);
        }catch (QueryException $e){
            return back()->with('msg', 'number must be > 0');
        }

        return back()->with('msg','update the code promotion successfully');
    }
}
