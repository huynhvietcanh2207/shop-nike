<?php
class Product{
    public $id;
    public $name;
    public $price;
    public $image;
    public $description;
    public $size;
    public $views;
    public $likes;
    public $categories_id;
    public function __construct($id,$name,$price,$image,$description,$size,$views,$likes,$categories_id){
        $this->id=$id;
        $this->name=$name;
        $this->price=$price;
        $this->image=$image;
        $this->description=$description;
        $this->size=$size;
        $this->views=$views;
        $this->likes=$likes;
        $this->categories_id=$categories_id;
    }
}