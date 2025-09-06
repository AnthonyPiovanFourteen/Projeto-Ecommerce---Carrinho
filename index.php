<?php
/**
 * Em básico e breve resumo, o index.php é como o maestro de uma orquestra sinfônica, projetado apenas, unica e exclusivamente para orquestrar a execução. Carregando classes e simulando casos de uso.
 * Ele importa;
 * Product.php -> Define as informações que um produto deve ter, ID, nome, preço, e quantidade no estoque. Cria metodos tambem, para a busca dessas informações
 * ProductRepository.php -> Cria a lista de produtos disponiveis e define metodos para buscar os produtos por id e todos num geral
 * Cart.php -> Pelo nome da classe é autoexplicativo, sua função é gerenciar o carrinho. Criando metodos para adicionar e remover itens do carrinho, listar tudo que está dentro do carrinho e fazer calculo do total
 * CartItem.php -> Representa cada item adicionado dentro do sistema
 * Discount.php -> Dá o desconto no subtotal e gera o total 
 */

require_once __DIR__ . '/src/Product.php';
require_once __DIR__ . '/src/ProductRepository.php';
require_once __DIR__ . '/src/CartItem.php';
require_once __DIR__ . '/src/Cart.php';
require_once __DIR__ . '/src/Discount.php';

$repo = new ProductRepository();
$cart = new Cart();

echo $cart->addItem($repo->findById(1), 2) . PHP_EOL;
echo $cart->addItem($repo->findById(3), 10) . PHP_EOL;
echo $cart->removeItem(2) . PHP_EOL;

foreach ($cart->listItems() as $item) {
    echo $item->getProduct()->getName()
        . ' x ' . $item->getQuantity()
        . ' = R$ ' . $item->getSubtotal()
        . PHP_EOL;
}

$total = $cart->calculateTotal();
echo 'Total: R$ ' . $total . PHP_EOL;

$discounted = Discount::apply('DESCONTO10', $total);
echo 'Total com desconto: R$ ' . $discounted . PHP_EOL;
