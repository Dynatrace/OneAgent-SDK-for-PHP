# Sample applications for OneAgent SDK for PHP
Sample applications showing how to use Dynatrace OneAgent SDK for PHP.

## Contents
- TraceContextInfo: Shows usage od the SDK to get Trace ID and Span ID for current PurePath node

## Prepare running sample applications
- Ensure Dynatrace OneAgent is installed. If not see our [free Trial](https://www.dynatrace.com/trial/?vehicle_name=https://github.com/Dynatrace/OneAgent-SDK-for-PHP)
- Ensure you have [PHP](https://www.php.net/manual/en/install.php) installed.
- Ensure you have webserver installed and configured with PHP (e.g. Apache, Nginx, IIS) or have [PHP-CLI Monitoring](https://www.dynatrace.com/support/help/technology-support/application-software/php/full-stack-monitoring#monitoring-php-cli) enabled.

## TraceContextInfo sample application
This sample shows how to get Trace ID and Span ID for current PurePath node. The OneAgent will create trace for incoming request and share valid TraceContextInfo data.

### Web request
1. Copy `getTraceContextInfo.php` script to webserver document root.
2. Send a HTTP request to `http://{server-ip-address-and-port}/getTraceContextInfo.php`
3. Check results:

For valid Pure Path:
```php
Dynatrace TraceContextInfo
Trace ID: 4bdb382e6ab6e4daed3ae04114278d80
Span ID: cfa724fd4681c5d7
Is Valid: true
```

For invalid Pure Path:
```php
Dynatrace TraceContextInfo
Trace ID: 00000000000000000000000000000000
Span ID: 0000000000000000
Is Valid: false
```

### PHP CLI
1. Set up [custom service](https://www.dynatrace.com/support/help/shortlink/custom-services#php-services) for method `main`.
2. Run
```bash
php -f getTraceContextInfo.php
```
3. Check results:

For valid Pure Path:
```bash
Dynatrace TraceContextInfo<br/>Trace ID: 63ed23c91f7cc691d9a2609eb4f8b012<br/>Span ID: 2e4c80828a6cfe57<br/>Is Valid: true
```

For invalid Pure Path:
```bash
Dynatrace TraceContextInfo<br/>Trace ID: 00000000000000000000000000000000<br/>Span ID: 0000000000000000<br/>Is Valid: false
```