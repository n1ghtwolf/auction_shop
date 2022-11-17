<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Lots;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class auctionLotsController extends Controller
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

    public function delete(Request $request): \Illuminate\Http\JsonResponse
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

    public function create(Request $request): \Illuminate\Http\JsonResponse
    {
        $Lots = new Lots();
        $Lots->name = $request->name;
        $Lots->description = $request->description;
        $Lots->category_id = $request->category_id;
        $res = $Lots->save();
        $Lots->save();
        if ($res) {
            return response()->json([
                'status' => 1,
                'msg' => 'success',
                'lot_id' => $Lots->id
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'msg' => 'fail'
            ]);
        }
    }

    public function update(Request $request): \Illuminate\Http\JsonResponse
    {
        $Lots = Lots::find($request->lot_id);
        $Lots->name = $request->name;
        $Lots->description = $request->description;
        $Lots->category_id = $request->category_id;
        $res = $Lots->save();

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
