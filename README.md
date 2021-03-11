#### 無權限登入:

```javascript
mysql -u root -p;
```

#### 使用者狀態登入:

```javascript
mysql -u 帳號 -p;
```

#### 新增使用者及密碼:

```javascript
CREATE USER '帳號'@'網域 IP' IDENTIFIED BY '密碼';
```

#### 開啟使用者所有權限:

```javascript
GRANT ALL PRIVILEGES ON 資料庫名稱.* TO '帳號'@'網域 IP';
```

#### 基礎語法:

可至[W3School](https://www.w3schools.com/sql/default.asp)查詢，如:

```javascript
UPDATE Table SET title = 'value' WHERE id = number;
```

#### windows 安裝:

.msi 為 windows 安裝檔，可至[官網](https://downloads.mariadb.org/)自行下載

### 最後紀錄

1.  `new FormData()`改成 service 獨立操作
    各 component 負責丟物件過去就行
    由 service 改成 FormData();

2.  合併資料庫相關

3.  完整取得資料
