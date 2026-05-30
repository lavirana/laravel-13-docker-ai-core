<?php

namespace App\Ai\Tools;

use App\Models\Product;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Ai\Contracts\Tool;
use Laravel\Ai\Tools\Request;
use Stringable;

class SearchProducts implements Tool
{
    /**
     * Get the description of the tool's purpose.
     */
    public function description(): Stringable|string
    {
        return 'Search products from the database by product name, category, and optional maximum price.';
    }

    /**
     * Execute the tool.
     */
    public function handle(Request $request): Stringable|string
    {
        $query = trim((string) ($request['query'] ?? ''));
        $maxPrice = $request['max_price'] ?? null;

        if($query === ''){
            return 'Please provide a search query for products.';
        }

        $products = Product::query()
        ->select(['id','name','category','price','description','stock'])
        ->where(function ($q) use ($query) {
            $q->where('name', 'like', "%{$query}%")
            ->orWhere('category', 'like', "%{$query}%");
        })
        ->when($maxPrice, function ($q) use ($maxPrice) {
            $q->where('price', '<=', $maxPrice);
        })
        ->limit(10)
        ->get();

        if($products->isEmpty()){
            return 'No products found matching the search criteria.';
        }

        return $products
        ->map(fn ($product) =>
                "- {$product->name} | Category: {$product->category} | ₹{$product->price} | Stock: {$product->stock}"
            )
            ->implode("\n");
    }

    /**
     * Get the tool's schema definition.
     */
    public function schema(JsonSchema $schema): array
    {
        return [
            'query' => $schema->string()
            ->description('The search query for products, which can include product name, category, and optional maximum price.')
            ->required(),

            'max_price' => $schema->integer()
            ->description('Optional maximum price to filter products by price.')
             ->nullable(),
        ];
    }
}
