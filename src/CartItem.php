<?php

/**
 * Quando você cria o CartItem, você passa quantidade e produto, que depois ser
 */
class CartItem
{
    private Product $product;
    private int $quantity;

    public function __construct(Product $product, int $quantity)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }

    public function getSubtotal(): float
    {
        return $this->product->getPrice() * $this->quantity;
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }
}