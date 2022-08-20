<?php

namespace App\Http\Controllers;

use App\Models\HistoryBet;
use App\Models\User;
use Dcat\Admin\Admin;
use Illuminate\Http\Request;

class HistoryBetController extends Controller
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
        $history= HistoryBet::where('user_id',auth('api')->user()->id)->orderBy('id','desc')->paginate(10);
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
        $history= HistoryBet::create($data);
        $user = User::find(auth('api')->user()->id);
        $user->money = $user->money - $request->money;
        $user->save();
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
        $history= HistoryBet::find($id);
        return response()->json($history,200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $history= HistoryBet::find($id)->update($request->all());
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
        $history= HistoryBet::find($id);
        $user = User::find(auth('api')->user()->id);
        $user->money = $user->money + $history->money;
        $user->save();
        $history->delete();
        return response()->json($history,200);
    }
}
