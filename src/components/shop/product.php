<?php
require_once (__DIR__ . "/../image.php");

class Product
{
    final public function __construct(
        public int $id,
        public string $name,
        public string $description,
        public int $price,
        public string $image
    ) {
    }

    public function decimalPrice(): float|int
    {
        return $this->price / 100;
    }

    public function render(): string
    {
        $imageFn = 'image';
        return <<<HTML
<div class="product">
    {$imageFn($this->image)}
    <div class="head">
        <div class="name">$this->name</div>
        <div class="price">£{$this->decimalPrice()}</div>
    </div>
    <div class="description">$this->description</div>
    <button>Add to cart</button>
</div>
HTML;
    }
}
