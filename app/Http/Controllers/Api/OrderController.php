<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Order;
use App\Http\Manager\OrderManager;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    private $orderManager;

    public function __construct()
    {
        $this->orderManager = New OrderManager();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()
            ->json($this->orderManager->getOrderList(Auth::user()->getAuthIdentifier()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->orderManager->addOrder($request->all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return response()
            ->json($this->orderManager->updateOrder($id, $request->all()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->orderManager->deleteOrder($id);

        return response(204);
    }
}
