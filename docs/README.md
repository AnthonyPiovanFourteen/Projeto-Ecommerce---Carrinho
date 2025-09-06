# 📦 Carrinho de Compras em PHP

## 📌 Sobre o Projeto
Com PHP puro, o objetivo do trabalho é aplicar conceitos de **Clean Code** e **Design Patterns**, seguindo os padrões de codificação da **PSR-12**.  

---

## Funcionalidades
- Sistema realiza a Listagem de produtos disponíveis  
- Adição e remoção de produtos ao carrinho  
- Validação de estoque antes da compra    
- Cálculo do subtotal por item  
- Cálculo do valor total do carrinho  
- Aplicação de cupom de desconto fixo

---

## 🛠️ Tecnologias Utilizadas
- **PHP 8+**  
- **XAMPP** (Apache + PHP)  

---

## 📂 Estrutura de Pastas

/PRD — Carrinho de compras/
│── index.php
│── /src/
│   │── Product.php
│   │── ProductRepository.php
│   │── CartItem.php
│   │── Cart.php
│   │── Discount.php

---

## 📌 Arquivos e Classes

### `Product.php`
Classe que representa um **produto**.  
- **Atributos**: `id`, `name`, `price`, `stock`  
- **Métodos**: `getId()`, `getName()`, `getPrice()`, `getStock()`, `reduceStock()`, `restoreStock()`  

### `ProductRepository.php`
Gerencia a lista de produtos disponíveis.  
- **Métodos**: `getAll()`, `findById($id)`  

### `CartItem.php`
Representa um item dentro do carrinho.  
- **Atributos**: `product`, `quantity`  
- **Métodos**: `getSubtotal()`, `getProduct()`, `getQuantity()`  

### `Cart.php`
Gerencia o carrinho de compras.  
- **Atributos**: `items` (array de `CartItem`)  
- **Métodos**:  
  - `addItem($product, $quantity)`  
  - `removeItem($productId)`  
  - `listItems()`  
  - `calculateTotal()`  

### `Discount.php`
Responsável pela aplicação de cupons de desconto.  
- **Métodos**: `apply($code, $total)`  

### `index.php`
Ponto de entrada do sistema, carregando as classes e executando o fluxo:  
1. Adiciona produtos ao carrinho  
2. Tenta adicionar além do estoque  
3. Remove produto  
4. Lista itens do carrinho  
5. Calcula total e aplica desconto  

---

## ⚙️ Regras de Negócio
- Só será possível adicionar produto se houver **estoque suficiente**.  
- Adicionar um produto no carrinho, faz com que o estoque desse produto seja **reduzido**.  
- Remover um produto no carrinho, faz com que o estoque desse produto seja **restaurado**.  
- O cupom **DESCONTO10** concede **10% de desconto** no valor total.  

---

## ▶️ Como Executar

1. Instale o **XAMPP** e inicie o Apache.  
2. Jogue a pasta `PRD — Carrinho de compras/` para dentro do diretório `htdocs`.  
3. Acesse no navegador:  