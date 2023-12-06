<?php

namespace Robertluowen\LaravelShop\Data\Goods\Models;

use Illuminate\Database\Eloquent\Model as laravelModel;

class Model extends laravelModel
{
    public function __construct(array $attributes = [])
    {
        $this->setConnection(config('data.goods.database.connection.name'));
        // parent::__construct($attributes);
    }
}
