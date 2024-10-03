<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [ 
        "designation",
        "marque",
        "reference",
        "prix",
        "qtestock",
        "imageart",
        "scategorieID"



    ];
    public function scategorie(){
        return $this->belongsTo(Scategorie::class,"scategorieID");
    } 

    public function article() {
        return $this->belongsTo(Article::class,"scategorie");
    }
}


