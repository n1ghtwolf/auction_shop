<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryManagerRequest;
use App\Models\Category;
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
        JsonResponseController $jsonResponseController
    ): \Illuminate\Http\JsonResponse {
        $category->fill($request->validated());
        return $jsonResponseController->handle($category->save(), array('id' => $category->id));
    }

    public function destroy(
        Request $request,
        JsonResponseController $jsonResponseController
    ): \Illuminate\Http\JsonResponse {
        $res = Category::destroy($request->get('category_id'));
        return $jsonResponseController->handle($res, array());
    }

    public function update(
        CategoryManagerRequest $request,
        JsonResponseController $jsonResponseController
    ): \Illuminate\Http\JsonResponse {
        $res = Category::where('id', $request->id)->update($request->validated());
        return $jsonResponseController->handle($res, array(
            'id' => $request->id,
            'name' => $request->name
        ));
    }
}
