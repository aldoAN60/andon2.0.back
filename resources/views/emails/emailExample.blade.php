<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>andon 2.0 notification</title>
</head>
<body>
@if ($productionLine->current_status == 'RUNNING')
<h2>Andon 2.0 information</h2>

<h4>Next line is now running</h4>

<p><strong>line number:</strong>  <span>{{$productionLine->line_number}}</span></p>
<p><strong>reactivation time:</strong>  <span>{{$productionLine->runing_at}}</span></p>
@else
<h2>Andon 2.0 information</h2>
<h4>Next line is stop</h4>

<div>
    <p><strong>line number:</strong>  <span>{{$productionLine->line_number}}</span></p>
    <p><strong>stop time:</strong>  <span>{{$productionLine->stopped_at}}</span></p>
    <p><strong>stop reason:</strong>  <span>{{$productionLine->reason}}</span></p>
</div>
@endif
    

</body>
</html>
