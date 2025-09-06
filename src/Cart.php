<?php

class Cart
{
    private array $items = [];

    public function addItem(Product $product, int $quantity): string
    {
        if ($quantity > $product->getStock()) {
            return "Estoque insuficiente.";
        }

        $product->reduceStock($quantity);
        $this->items[$product->getId()] = new CartItem($product, $quantity);

        return "{$product->getName()} adicionado.";
    }

    public function removeItem(int $productId): string
    {
        if (!isset($this->items[$productId])) {
            return "Produto não está no carrinho.";
        }

        $item = $this->items[$productId];
        $item->getProduct()->restoreStock($item->getQuantity());
        unset($this->items[$productId]);

        return "Produto removido.";
    }

    public function listItems(): array
    {
        return $this->items;
    }

    public function calculateTotal(): float
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getSubtotal();
        }
        return $total;
    }
}
