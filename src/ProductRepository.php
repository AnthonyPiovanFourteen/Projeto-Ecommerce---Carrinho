<?php

class ProductRepository
{
    private array $products;

    public function __construct()
    {
        $this->products = [
            new Product(1, 'Camiseta', 59.90, 10),
            new Product(2, 'Calça Jeans', 129.90, 5),
            new Product(3, 'Tênis', 199.90, 3),
        ];
    }

    public function findById(int $id): ?Product
    {
        foreach ($this->products as $product) {
            if ($product->getId() === $id) {
                return $product;
            }
        }
        return null;
    }

    public function getAll(): array
    {
        return $this->products;
    }
}
