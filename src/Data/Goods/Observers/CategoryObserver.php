<?php

namespace Robertluowen\LaravelShop\Data\Goods\Observers;

use Robertluowen\LaravelShop\Data\Goods\Models\Category;
class CategoryObserver
{
    // 在动作发生之后执行的
    public function created(Category $category){

    }

    // 在Category创建的时候执行的
    public function creating(Category $category){
        dd(1);
        //如果创建的是一个根类目
        if(is_null($category->pid) || $category->pid == 0){
            //将层级设为0
            $category->level=0;
            //将path设为-
            $category->path = '-';
        }else{
            //将层级设为父类目的层级+1
            $category->level = $category->parent->level+1;
            //将path值设为父类目的path 追加父类目ID以及最后跟上一个-分隔符
            $category->path =$category->parent->path.$category->parent_id.'-';
        }
    }
}
