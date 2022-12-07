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

    public function destroy(
        Request $request,
        JsonResponseController $jsonResponseController
    ): \Illuminate\Http\JsonResponse {
        $res = Lots::destroy($request->get('id'));
        return $jsonResponseController->handle($res, array());
    }

    public function newLot(): View
    {
        return view('lots.addLot', ['categories' => Category::all()]);
    }

    public function create(
        AuctionLotsRequest $request,
        Lots $lot,
        JsonResponseController $jsonResponseController
    ): \Illuminate\Http\JsonResponse {
        $lot->fill($request->validated());
        return $jsonResponseController->handle($lot->save(), array('id' => $lot->id));
    }

    public function update(
        AuctionLotsRequest $request,
        JsonResponseController $jsonResponseController
    ): \Illuminate\Http\JsonResponse {
        $res = Lots::where('id', $request->lot_id)->update($request->validated());
        return $jsonResponseController->handle($res, array());
    }
}
