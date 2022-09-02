<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
    use HasFactory;
    protected $table='posts';


    //eu estou indicando quais colunas podem ser preenchidas na tabela
    protected $fillable=['title','context'];

    public function comments(){
        return $this->hasMany(Comments::class, 'posts_id', 'id');
    }
}
