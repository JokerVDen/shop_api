<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\ApiController;
use App\Services\Seller\SellerService;

class SellerController extends ApiController
{
    /**
     * @var SellerService
     */
    private $service;

    public function __construct(SellerService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $sellers = $this->service->getAllSellers();
        return $this->showAll($sellers);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $seller = $this->service->getSeller($id);
        if (!$seller)
            abort(404);
        return $this->showOne($seller);
    }
}
