## Installation

You can install the package via composer:

```bash
composer require vipszx/express
```

## Usage

``` php
$expressNo = new ExpressNumber('expressNumber', 'companyCode');
$gateway = new Kuaidi100Gateway('appKey', 'customer');
$express = new Express($gateway);
$express->query($expressNo); //查询接口
$express->subscribe($expressNo, 'callbackUrl); //订阅接口
```
