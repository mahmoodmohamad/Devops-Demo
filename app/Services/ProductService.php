<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    public function getAllProducts(): array
    {
        return Product::all()->toArray();
    }

    public function getProductById(int $id): Product|null
    {
        return Product::findOrFail($id);
    }

    public function createProduct(array $data): Product
    {
        return Product::create($data);
    }

    public function updateProduct(int $id, array $data): Product
    {
        $product = Product::findOrFail($id);
        $product->update($data);

        return $product;
    }

    public function deleteProduct(int $id): bool
    {
        return Product::destroy($id);
    }
}
