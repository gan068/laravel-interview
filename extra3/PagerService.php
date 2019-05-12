<?php
namespace App\Services;

class PagerService
{
    /**
     * 取得分頁總數
     *
     * @param integer $count
     * @param integer $per_page
     * @return integer
     */
    public function getTotalPages(int $count, int $per_page)
    {
        if ($count != 0 && $per_page != 0) {
            $pages = ceil($count/$per_page);
        }else{
            $pages = 1;
        }
        
        return $pages;
    }
}