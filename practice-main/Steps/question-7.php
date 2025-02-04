<?php
/**
 * Siguiendo el principio de responsabilidad Única (SRP)
 * La clase Product solo manejará el nombre del producto
 * La clase ProductJsonFormatter será responsable de formatear el producto a JSON
 */

class Product
{
    private $name;

    // Constructor para inicializar el nombre del producto
    public function __construct($name)
    {
        $this->name = $name;
    }

    // Método para obtener el nombre del producto
    public function getName(): string
    {
        return $this->name;
    }
}

// Clase separada para formatear el producto a JSON
class ProductJsonFormatter
{
    // Método que toma una instancia de Product y la convierte a formato JSON
    public function format(Product $product): string
    {
        return json_encode([
            "name" => $product->getName()
        ]);
    }
}

// Creación de un producto
$product = new Product('Laptop');

// Creación del formateador JSON
$jsonFormatter = new ProductJsonFormatter();

// Formateamos el producto a JSON
echo $jsonFormatter->format($product);
