<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = ['title', 'intro', 'body', 'active'];

    public function images()
    {
        return $this->hasMany('App\PortfolioImage', 'portfolio_id');
    }
}
