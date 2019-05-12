SELECT last_name
FROM users
WHERE last_name = '張'
union all 
SELECT last_name
FROM users
WHERE last_name = '王'
union all 
SELECT last_name
FROM users
WHERE last_name = '林';


$today = CURDATE();
SELECT name
FROM user
WHERE signup_date >= '$today';


-- 假設table有 500K rows, 1/500K = 0.000002
SELECT name
FROM actor
WHERE RAND() <= 0.000002
LIMIT 1;