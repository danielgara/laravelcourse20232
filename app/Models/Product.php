<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Collection;


class Product extends Model
{
    use HasFactory;

    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['name'] - string - contains the product name
     * $this->attributes['price'] - int - contains the product price
     * $this->comments - Comment[] - contains the associated comments
    */

    protected $fillable = ['name','price'];

    // funciones flecha -> arrow functions with fn and wihtout return
    /*protected function name(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => strtoupper($value),
            set: fn (string $value) => strtolower($value),
        );
    }*/

    // funciones anonimas -> anonymous functions with function and return
    /*protected function name(): Attribute
    {
        return Attribute::make(
            get: function (string $value) { return strtoupper($value); },
            set: function (string $value) { return strtolower($value); },
        );
    }*/

    // funciones anonimas -> anonymous functions with function and return -> without parameter name
    /*protected function name(): Attribute
    {
        return Attribute::make(
            function (string $value) { return strtoupper($value); },
            function (string $value) { return strtolower($value); },
        );
    }*/

    // funciones anonimas -> anonymous functions with function and return -> without parameter name, with functions above
    protected function name(): Attribute
    {
        $getFn = function (string $value) { return strtoupper($value); };
        $setFn = function (string $value) { return strtoupper($value); };
        return Attribute::make(
            $getFn,
            $setFn,
        );
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId($id) : void
    {
        $this->attributes['id'] = $id;
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName($name) : void
    {
        $this->attributes['name'] = $name;
    }

    public function getPrice(): int
    {
        return $this->attributes['price'];
    }

    public function setPrice($price) : void
    {
        $this->attributes['price'] = $price;
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function setComments(Collection $comments): void
    {
        $this->comments = $comments;
    }
}
