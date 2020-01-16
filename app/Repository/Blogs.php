<?php

namespace App\Repository;

use App\Blog;
use Carbon\Carbon;


class Blogs
{

    CONST CACHE_KEY = 'id';


    public function all($orderBy)
    {

        $key = "all.{$orderBy}";
        $cacheKey = $this->getCacheKey($key);
          // expires after 5 minutes
        return cache()->remember($cacheKey,Carbon::now()->addMinutes(5),function() use($orderBy){
            return Blog::fetchAll($orderBy);
    });
        //return $blogs = Blog::all();
    }
    public function getOne($id)
    {
        return Blog::fetchOne($id);

    }

    public function getCacheKey($key){
        $key=strtoupper(($key));
        return self::CACHE_KEY."$key";
    }
}
