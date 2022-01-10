# Dynatrace OneAgent SDK for PHP

OneAgent SDK for PHP has to be used together with OneAgent injected. Otherwise, classes from OneAgent SDK will not be available.
The current implementation of OneAgent SDK for PHP is made with a single purpose: providing access to the Trace ID and Span ID information of the PurePath node.
This information can then be used, for example, to provide additional context in log messages.

## Table of Contents

* [Package contents](#package-contents)
* [Requirements](#requirements)
* [Integration](#integration)
  * [Troubleshooting](#troubleshooting)
* [API Concepts](#api-concepts)
  * [OneAgentSDK object](#oneagentsdk-object)
  * [Trace Context](#trace-context)
* [Help & Support](#help--support)
* [Release notes](#release-notes)

## Package contents

* `examples`: contains sample application, which demonstrates the usage of the SDK. See readme inside the examples directory for more details.
* `LICENSE`: license under which the whole SDK and sample applications are published.

## Requirements

* Deep monitoring by Dynatrace OneAgent must be successfully activated.

|OneAgent SDK for PHP |Minimum OneAgent version |Support status |
|:--------------------|:------------------------|:--------------|
|0.1.0                |1.233                    |Not supported  |

## Integration
If OneAgent is not present, PHP will emit 
```php
PHP Fatal error:  Uncaught Error: Class 'OneAgent\\OneAgentSDK' not found
```
To avoid it, class availability should be checked before usage, e.g.
```php
if(class_exists('OneAgent\OneAgentSDK')) {
	$oneagent = new OneAgent\OneAgentSDK();
}
``` 

### Troubleshooting

If the SDK can not connect to OneAgent, verify that a matching version of OneAgent is used.

## API Concepts

Common concepts of the Dynatrace OneAgent SDK are explained in the [Dynatrace OneAgent SDK repository](https://github.com/Dynatrace/OneAgent-SDK).

### OneAgentSDK object

OneAgent for PHP is a PHP Extension which exposes OneAgent SDK directly, so there is no need to install addtional libraries. 
The first step is get an instance of the OneAgent SDK object.

```php
$oneagent = new OneAgent\OneAgentSDK();
```

### Trace Context

The obtained OneAgent SDK API instance provides the `getTraceContextInfo()` method, which returns a `TraceContextInfo` object that provides the Trace ID and Span ID of the current PurePath node. `$traceContextInfo->isValid()` may be used to verify that the Trace ID and Span ID are both valid (non-zero). 

Trace ID and Span ID information is not intended for tagging and context-propagation scenarios and primarily designed for log-enrichment use cases.

```php
...
$traceContextInfo = $oneagent->getTraceContextInfo();
$traceId = $traceContextInfo->getTraceId();
$spanId = $traceContextInfo->getSpanId();
```

Trace ID and Span ID values may be invalid in the following cases:
* OneAgent is not present.
* OneAgent is not enabled.
* OneAgent does not support the SDK (check the [required version](#requirements)).
* There is no active Dynatrace PurePath context.

## Help & Support

**Support policy**

Dynatrace OneAgent SDK for PHP is in Early adopter status. The features are currently being tested by Dynatrace and a subject to change.

For a detailed support policy see [Dynatrace OneAgent SDK help](https://github.com/Dynatrace/OneAgent-SDK#help).

### Get Help

* Ask a question in the [product forums](https://answers.dynatrace.com/spaces/482/view.html)
* Read the [product documentation](https://www.dynatrace.com/support/help/)

### Open a [GitHub issue](https://github.com/Dynatrace/OneAgent-SDK-for-PHP/issues) to

* Report minor defects, minor items or typos
* Ask for improvements or changes in the SDK API
* Ask any questions related to the community effort

SLAs don't apply for GitHub tickets.

### Customers can open a ticket on the [Dynatrace support portal](https://support.dynatrace.com/supportportal/) to

* Get support from the Dynatrace technical support engineering team
* Manage and resolve product related technical issues

SLAs apply according to the customer's support level.