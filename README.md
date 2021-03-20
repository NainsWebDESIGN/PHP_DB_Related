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

### 查詢伺服器端口:

```javascript
SHOW GLOBAL VARIABLES LIKE 'PORT';
```

#### 基礎語法:

可至[W3School](https://www.w3schools.com/sql/default.asp)查詢，如:

```javascript
UPDATE Table SET title = 'value' WHERE id = number;
```

#### 新增Table常用及重要語法:

可至[CREATE TABLE屬性](https://www.w3schools.com/sql/sql_datatypes.asp)查詢

```javascript
CREATE TABLE NainsTable (
        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        name varchar(50) NOT NULL,
        text varchar(200));
```

#### windows 安裝:

.msi 為 windows 安裝檔，可至[官網](https://downloads.mariadb.org/)自行下載
