<?php
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

    public function decimalPrice()
    {
        return $this->price / 100;
    }

    public function render()
    {
        echo <<<HTML
<div class="product">
    <img path="{$this->image}" fix="width" style="aspect-ratio:1; object-fit: cover;">
    <div class="head">
        <div class="name">{$this->name}</div>
        <div class="price">£{$this->decimalPrice()}</div>
    </div>
    <div class="description">{$this->description}</div>
    <button>Add to cart</button>
</div>
HTML;
    }
}
