<?php

// Parent class Product
class Product {
    // Properties
    protected $name;
    protected $price;

    // Constructor
    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }

    // Getter for name
    public function getName() {
        return $this->name;
    }

    // Setter for name
    public function setName($name) {
        $this->name = $name;
    }

    // Getter for price
    public function getPrice() {
        return $this->price;
    }

    // Setter for price
    public function setPrice($price) {
        $this->price = $price;
    }

    // Method to display product info
    public function displayInfo() {
        echo "Product: " . $this->name . "<br>";
        echo "Price: $" . $this->price . "<br>";
    }
}

// Subclass Book
class Book extends Product {
    // Additional properties for Book class
    private $author;
    private $genre;

    // Constructor for Book class
    public function __construct($name, $price, $author, $genre) {
        // Call parent constructor
        parent::__construct($name, $price);
        $this->author = $author;
        $this->genre = $genre;
    }

    // Getter for author
    public function getAuthor() {
        return $this->author;
    }

    // Setter for author
    public function setAuthor($author) {
        $this->author = $author;
    }

    // Getter for genre
    public function getGenre() {
        return $this->genre;
    }

    // Setter for genre
    public function setGenre($genre) {
        $this->genre = $genre;
    }

    // Override displayInfo to include author and genre
    public function displayInfo() {
        echo "Book: " . $this->getName() . "<br>";
        echo "Price: $" . $this->getPrice() . "<br>";
        echo "Author: " . $this->author . "<br>";
        echo "Genre: " . $this->genre . "<br>";
    }
}

// Subclass Electronics
class Electronics extends Product {
    // Additional property for Electronics class
    private $brand;

    // Constructor for Electronics class
    public function __construct($name, $price, $brand) {
        // Call parent constructor
        parent::__construct($name, $price);
        $this->brand = $brand;
    }

    // Getter for brand
    public function getBrand() {
        return $this->brand;
    }

    // Setter for brand
    public function setBrand($brand) {
        $this->brand = $brand;
    }

    // Override displayInfo to include brand
    public function displayInfo() {
        echo "Electronics: " . $this->getName() . "<br>";
        echo "Price: $" . $this->getPrice() . "<br>";
        echo "Brand: " . $this->brand . "<br>";
    }
}

// Demonstrating the usage of the classes

// Create a Book instance
$book = new Book("The Great Gatsby", 15.99, "F. Scott Fitzgerald", "Fiction");
$book->displayInfo(); // Display book information

echo "<hr>"; // Just a separator for clarity

// Create an Electronics instance
$electronic = new Electronics("Smartphone", 599.99, "Apple");
$electronic->displayInfo(); // Display electronic product information

?>
