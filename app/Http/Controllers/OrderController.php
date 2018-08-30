<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrder;
use Illuminate\Http\Request;
use App\Order;
use App\Http\Manager\OrderManager;
use Illuminate\Session\Store;

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
    public function index($userId)
    {
        return response()
            ->json($this->orderManager->getOrderList($userId));
    }

    /**
     * @param StoreOrder $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreOrder $request)
    {
        $order = $request->all();
        $this->orderManager->addOrder($order);

        return response()->json($order, 201);
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
