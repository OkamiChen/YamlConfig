# TableShard
## config.yml文件内容
```yaml
local:
    mysql:
        host: 127.0.0.1
        port: 3306
dev:
    mysql:
        host: 127.0.0.1
        port: 3306
qa:
    mysql:
        host: 127.0.0.1
        port: 3306
pre:
    mysql:
        host: 127.0.0.1
        port: 3306
gr:
    mysql:
        host: 127.0.0.1
        port: 3306
yc:
    mysql:
        host: 127.0.0.1
        port: 3306
production:
    mysql:
        host: 127.0.0.1
        port: 3306
```
## 读取
```php
<?php
$file   = 'config.yml';
$data   = yml_read($file);
$data['mysql']['port'] = 3307;
```
## 写入
```php
<?php
$file   = 'config.yml';
$data   = yml_read($file);
$data['mysql']['port'] = 3307;
yml_write($file,$data);
```
## config.yml变化后的内容
```yaml
local:
    mysql:
        host: 127.0.0.1
        port: 3307
dev:
    mysql:
        host: 127.0.0.1
        port: 3306
qa:
    mysql:
        host: 127.0.0.1
        port: 3306
pre:
    mysql:
        host: 127.0.0.1
        port: 3306
gr:
    mysql:
        host: 127.0.0.1
        port: 3306
yc:
    mysql:
        host: 127.0.0.1
        port: 3306
production:
    mysql:
        host: 127.0.0.1
        port: 3306
```