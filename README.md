## Installation

You can install the package via composer:

```bash
composer require vipszx/express
```

## Usage

``` php
$package = new Package('expressNumber', 'companyCode');
$gateway = new Kuaidi100Gateway('appKey', 'customer');
$express = new Express($gateway);
$express->query($package); //查询接口
$express->subscribe($package, 'callbackUrl); //订阅接口
```
