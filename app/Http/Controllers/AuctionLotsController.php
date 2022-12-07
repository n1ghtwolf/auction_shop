<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuctionLotsRequest;
use App\Models\Category;
use App\Models\Lots;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AuctionLotsController extends Controller
{
    public function __construct()
    {
    }

    public function index(): View
    {
        return view('index', ['lots' => Lots::with('category')->get()]);
    }

    public function showLot(Request $request): View
    {
        return view('lots.showLot', ['lot' => Lots::with('category')->find($request->get('id'))]);
    }

    public function change(Request $request): View
    {
        return view(
            'lots.updateLot',
            ['lot' => Lots::with('category')->find($request->get('id')), 'categories' => Category::all()]
        );
    }

    public function destroy(AuctionLotsRequest $request): \Illuminate\Http\JsonResponse
    {
        $res = Lots::destroy($request->get('id'));
        if ($res) {
            return response()->json([
                'status' => 1,
                'msg' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'msg' => 'fail'
            ]);
        }
    }

    public function newLot(): View
    {
        return view('lots.addLot', ['categories' => Category::all()]);
    }

    public function create(Request $request, Lots $lot): \Illuminate\Http\JsonResponse
    {
        $lot->fill($request->only('name', 'description', 'category_id'));

        if ($lot->save()) {
            return response()->json([
                'status' => 1,
                'msg' => 'success',
                'lot_id' => $lot->id
            ]);
        }

        return response()->json([
            'status' => 0,
            'msg' => 'fail'
        ]);
    }

    public function update(Request $request): \Illuminate\Http\JsonResponse
    {
        $res = Lots::where('id', $request->lot_id)->update($request->only('name', 'description', 'category_id'));
        if ($res) {
            return response()->json([
                'status' => 1,
                'msg' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'msg' => 'fail'
            ]);
        }
    }
}
