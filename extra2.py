#!/usr/bin/env python3
# -*- coding: utf-8 -*-

import pandas as pd
import pymysql
import bcrypt


original_file = '/MOCK_DATA_1.tsv' #absolute path
target_file = '/MOCK_DATA_1.csv' #absolute path
data = pd.read_csv(original_file, sep='\t', header=0)
data['password'] = data['password'].map(lambda x: bcrypt.hashpw(x.encode('utf8'), bcrypt.gensalt()).decode('utf8'))
data.to_csv(target_file, header=False, index=False)

sql = pymysql.connect(
    host='192.168.10.10',
    user='homestead',
    passwd='secret',
    db='cw',
    charset='utf8',
    local_infile=True
)
cursor = sql.cursor()

try:
    cursor.execute('LOAD DATA LOCAL INFILE "'+target_file+'" INTO TABLE cw.user_data FIELDS TERMINATED BY "," (account,password)')
    sql.commit()
except pymysql.Error as e:
    print(e)
finally:
    sql.close()

