<?php

if (! function_exists('shop_asset')) {
    /**
     * Generate an asset path for the application.
     *
     * @param  string  $path
     * @param  bool|null  $secure
     * @return string
     */
    function shop_asset($path, $secure = null)
    {
        $path = "vendor/robertluowen/laravel-wap-shop\\".$path;
        return asset($path, $secure);
    }
}