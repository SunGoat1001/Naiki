<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\BatchingService;
use Illuminate\Support\Facades\Cache;

class HomepageController extends Controller
{
    protected $batchingService;

    public function __construct(BatchingService $batchingService)
    {
        $this->batchingService = $batchingService;
    }

    public function index()
    {
        $products = Cache::remember('homepage_data', 600, function () {
            $products = Product::select('id', 'name', 'price', 'main_image_url')
                ->orderBy('imported_date', 'desc')
                ->limit(8)
                ->get();

            return $this->batchingService->batchProducts($products, 2);
        });

        return view('homepage', ['products' => $products->flatten()]);
    }
}
