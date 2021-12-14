<?php

function main() {
	if(class_exists('OneAgent\OneAgentSDK')) {
		$oneagent = new OneAgent\OneAgentSDK();
		$traceContextInfo = $oneagent->getTraceContextInfo();
		$traceId = $traceContextInfo->getTraceId();
		$spanId = $traceContextInfo->getSpanId();
		$valid = $traceContextInfo->isValid();

		echo 'Dynatrace TraceContextInfo<br/>';
		echo 'Trace ID: '.$traceId.'<br/>';
		echo 'Span ID: '.$spanId.'<br/>';
		echo 'Is Valid: ';
		var_export($valid);
	} else {
		echo 'No OneAgentSDK class available';
	}
}

main();
?>