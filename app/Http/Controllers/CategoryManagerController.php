<?php

namespace App\Http\Controllers;

use App\Actions\JsonResponseAction;
use App\Http\Requests\CategoryManagerRequest;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryManagerController extends Controller
{
    public function index(): View
    {
        return view('categoryManager', ['categories' => Category::all()]);
    }

    public function create(
        CategoryManagerRequest $request,
        Category $category,
        JsonResponseAction $jsonResponseAction
    ): JsonResponse {
        $category->fill($request->validated());
        return $jsonResponseAction($category->save(), array('id' => $category->id));
    }

    public function destroy(
        Request $request,
        JsonResponseAction $jsonResponseAction
    ): JsonResponse {
        $res = Category::destroy($request->get('category_id'));
        return $jsonResponseAction($res, array());
    }

    public function update(
        CategoryManagerRequest $request,
        JsonResponseAction $jsonResponseAction
    ): JsonResponse {
        $res = Category::where('id', $request->id)->update($request->validated());
        return $jsonResponseAction($res, array(
            'id' => $request->id,
            'name' => $request->name
        ));
    }
}
