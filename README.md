# 支付宝SDK

### 开始

> composer require gzdsx/alipay-sdk

### 注册APP


在应用入口处注册，如Laravel的AppSericeProvider的boot处

```php
AlipaySdk::register('支付宝私钥','支付宝公钥','默认通知地址','默认返回地址');
```

### 创建订单
```php
$order = new AlipayUnifiedOrderBuilder();
$order->out_trade_no = time();
$order->subject = '测试商品';
$order->total_amount = 100;
```

### APP支付

```php
AlipaySdk::appPay()
->setBizContent($order->getBizContent())
->createPayStr();
```

### 网页支付
```php
AlipaySdk::pagePay()
->setBizContent($order->getBizContent())
->buildRequestForm();
```

### 订单查询
```php
AlipaySdk::query()->setBizContent(['out_trade_no'=>'你的订单号'])->sendRequest();
```

### 关闭订单
```php
AlipaySdk::close()->setBizContent(['out_trade_no'=>'你的订单号'])->sendRequest();
```

### 退款
```php
$order = new AlipayRefundOrderBuilder();
$order->out_trade_no = '你的订单号';
$order->refund_amount = '退款金额';
$order->refund_reason = '退款原因';

AlipaySdk::refund()->setBizContent($order->getBizContent())->sendRequest();
```

### 退款查询
```php
AlipaySdk::refundQuery()->setBizContent(['out_trade_no'=>'你的订单号'])->sendRequest();
```

### 打赏作者

![微信支付](https://shop.gzdsx.cn/storage/image/2023/03/zU4JxAGYranaNZ5LIibqqT5nfgI0qTJznL0zVg8f.jpg)
