<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function search(Request $request): JsonResponse
    {
        $param = $request->query->all();

        if(!isset($param['type']) ) return response()->json(['message' => false]);

        if ($param['type'] === 'code' || $param['type'] === 'size' || $param['type'] === 'color') {
            $product = $this->getEqual($param['type'], $param['search']);
        } else if ($param['type'] === 'price') {
            $product = $this->getPrice($param['from'] ?? '', $param['to'] ?? '');
        } else {
            $product = $this->getLike($param['type'], $param['search']);
        }

        return response()->json([
            'product' => $product,
            'type' => $param['type'],
            'search' => $param['search'],
        ]);
    }

    private function getLike(string $type, string $search): array
    {
        return Product::query()
            ->where(function ($query) use ($search, $type) {
                return $query->where($type, 'like', "%{$search}%");
            })
            ->get()
            ->toArray();
    }

    private function getPrice(string $from, string $to): array
    {
        return Product::query()
            ->where(function ($query) use ($from, $to) {
                return $query->where('price', '>=', intval($from))
                             ->where('price', '<=' , intval($to));
            })
            ->get()
            ->toArray();
    }

    private function getEqual(string $type, string $search): array
    {
        return Product::query()
            ->where(function ($query) use ($search, $type) {
                return $query->where($type, '=', "{$search}");
            })
            ->get()
            ->toArray();
    }
}
