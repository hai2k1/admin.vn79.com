<?php

namespace App\Http\Controllers;

use App\Models\Banking;
use App\Models\HistoryPayment;
use App\Models\User;
use Illuminate\Http\Request;

class HistoryPaymentController extends Controller
{
    public function __construct(){
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $history= HistoryPayment::where('user_id',auth('api')->user()->id)->orderBy('id','asc')->paginate(10);
        return response()->json($history,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
          $data = $request->all();
        $data['user_id'] = auth('api')->user()->id;
        $user = User::find(auth('api')->user()->id);
        if($data['type']=='Rút tiền'){
            if($user->key){
                $daili = User::where('key',$user->key)->whereRelation('roles','name','Đại lí')->first();
                $daili->money = $daili->money - $data['money'];
                $daili->save();
            }

            if($user->money < $data['money']){
                return response()->json('error tiền k đủ',400);
            }
            $user->money = $user->money - $data['money'];
            $user->save();
        }
        $history= HistoryPayment::create($data);
        return response()->json($history,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $history= HistoryPayment::find($id);
        return response()->json($history,200);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $history= HistoryPayment::find($id)->delete();
        return response()->json($history,200);
    }
    public function banking(){
        $banking = Banking::orderBy('id', 'asc')->paginate(3);
        return response()->json($banking,200);
    }
    public function historydaily(Request $request){
        $user = User::find(auth('api')->user()->id);
        if($user->key){
            $history= HistoryPayment::with('user')->whereRelation('user','key',$user->key)->orderBy('id', 'desc')->paginate(15);
            return response()->json($history,200);
        }
        $history= HistoryPayment::with('user')->orderBy('id', 'desc')->paginate(15);
        return response()->json($history,200);
    }
    public function doanhthu(Request $request){
        $user = User::find(auth('api')->user()->id);
        $totalmoney= HistoryPayment::with('user')->whereRelation('user','key',$user->key);
        $ruttien = $totalmoney->where('type','Rút tiền')->sum('money') ?? $totalmoney->where('type','Rút tiền')->sum('money')  || 0;
        $naptien = $totalmoney->where('type','Nạp Tiền')->sum('money') ?? $totalmoney->where('type','Nạp Tiền')->sum('money') || 0;
        $tonglai = $naptien - $ruttien;
        return response()->json([
            'rutien' => $ruttien,
            'naptien'=>$naptien,
            'tonglai' => $tonglai,
        ],200);
    }
}
