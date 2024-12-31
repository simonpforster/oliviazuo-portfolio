<?php
class Product
{
    final public function __construct(
        public int $id,
        public string $name,
        public string $description,
        public int $price
    ) {
    }

    public function render()
    {
        echo '<div class="product">';
        echo '<img path="/personal/2024/rerendered-memory/combine-scan.jpg" fix="width" style="aspect-ratio:1; object-fit: cover;">';
        echo '<div class="head">';
        echo '<div class="name">' . $this->name . "</div>";
        echo '<div class="price">£' . $this->price / 100 . "</div>";
        echo "</div>";
        echo '<div class="description">' . $this->description . "</div>";
        echo "<button>Add to cart</button>";
        echo "</div>";
    }
}
