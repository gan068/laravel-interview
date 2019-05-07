# 加分題

[TOC]

## 1. 請對SQL進行優化


* 資料庫限制為 mysql 5.7

```sql
SELECT last_name
FROM users
WHERE last_name = '張'
  OR last_name = '王'
  OR last_name = '林';
```

```sql
SELECT name
FROM user
WHERE signup_date >= CURDATE();
```

```sql
SELECT name
FROM actor
ORDER BY RAND()
LIMIT 1;
```



## 2. 請設計資料匯入程式


* 可自由運用所有你會的技術
* 資料來源為 CSV tab 分隔
* 需處理資料數100萬筆
* 欄位 C 必需使用 bcrypt 做 hashing

## 3. 請完成 getTotalPages

* 請依 test case 撰寫單元測試

* 限定使用版本 phpunit 6.5

* test case

  ```
  input 1, 1
  return 1
  ```

  ```
  input 0, 1
  return 1
  ```

  ```
  input 0, 0
  return 1
  ```

  ```
  input 1, 0
  return 1
  ```

  ```
  input 10, 5
  return 2
  ```

  ```
  input 16, 5
  return 4
  ```

  ```
  input 10, 20
  return 1
  ```

  

```php
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
        /**
         * put your code here
         */
        return 1;
    }
}

```



## 4. 設計提供N天內最熱門的N個項目的類別
* 可自由運用所有你會的技術
* 需在 0.5秒 內提供資料
* 項目總記錄數大約 30 億筆資料
* 每小時會產生 1000 筆新資料
* 項目資料結構如下

| Item (項目) |             |          |
| ----------- | ----------- | -------- |
| 欄位名稱    | 類型        | 描述     |
| id          | increments  | 流水編號 |
| title       | string, 100 | 標題     |

| ItemLog (項目記錄) |             |          |
| ----------- | ----------- | -------- |
| 欄位名稱    | 類型        | 描述     |
| id          | increments  | 流水編號 |
| item_id       | int | 項目編號    |
| created_at     | timestamp        | 建立時間     |


