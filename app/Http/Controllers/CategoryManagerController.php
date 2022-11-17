<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryManagerController extends Controller
{
    public function index(): View
    {
        return view('categoryManager', ['categories' => Category::all()]);
    }

    public function create(Request $request): \Illuminate\Http\JsonResponse
    {
        $res = Category::create(
            [
                'name' => $request->category_name,
            ]
        );
//        var_dump($res);die;
        if ($res) {
            return response()->json([
                'status' => 1,
                'msg' => 'success',
                'id' => $res->id,
                'name' => $res->name
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'msg' => 'fail'
            ]);
        }
    }

    public function delete(Request $request): \Illuminate\Http\JsonResponse
    {
        $res = Category::destroy($request->get('category_id'));
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

    public function update(Request $request): \Illuminate\Http\JsonResponse
    {
        $res = Category::where('id', $request->id)->update($request->only('name'));

        if ($res) {
            return response()->json([
                'status' => 1,
                'msg' => 'success',
                'id' => $request->id,
                'name' => $request->name

            ]);
        } else {
            return response()->json([
                'status' => 0,
                'msg' => 'fail'
            ]);
        }
    }


}
