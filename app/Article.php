<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Elasticquent\ElasticquentTrait;

class Article extends Model
{
    use ElasticquentTrait;

    protected $mappingProperties = array(
        'title' => array(
            'type' => 'string',
            'analyzer' => 'standard'
        )
    );

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
    public function category(){
        return $this->belongsTo('App\Category', 'category_id');
    }
}
