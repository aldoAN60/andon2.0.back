<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>andon 2.0 notification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>   
    <center>
        <h1 style="display: flex; justify-content: center  text-transform:uppercase;">Andon 2.0 | email information</h1>
    </center>
@if ($productionLine->current_status == 'RUNNING')
<center>
<h2 style="display: flex; justify-content: center  text-transform:uppercase;" >Next line is <span style="color:green; margin-left: 6px"> running</span></h2>
</center>
<hr>

<br>
<br>

<div  style="margin-top:5% font-size:larger;">
    <p><strong>line number:</strong>  <span  style="color:green;">{{$productionLine->line_number}}</span></p>
    <p><strong>reactivation time:</strong>  <span  style="color:green;">{{$productionLine->runing_at}}</span></p>
    <p><strong>cumulative stoppage time:</strong>  <span style="color:rgb(214, 0, 0);">{{$productionLine->cumulative_stoppage_time}}</span></p>
</div>

@else
<center>
<h2 style="display: flex; justify-content: center  text-transform:uppercase;" >Next line is <span style="color:rgb(214, 0, 0); margin-left: 6px"> stop</span></h2>
</center>
<hr>

<br>
<br>

<div  style="margin-top:5% font-size:larger;">
    <p><strong>line number:</strong>  <span style="color:rgb(214, 0, 0);">{{$productionLine->line_number}}</span></p>
    <p><strong>stop time:</strong>  <span style="color:rgb(214, 0, 0);">{{$productionLine->stopped_at}}</span></p>
    <p><strong>stop reason:</strong>  <span style="color:rgb(214, 0, 0);">{{$productionLine->reason}}</span></p>
</div>

@endif
    
<br>
<br>

<footer style="margin-top: 5%">
    <center>
    <div>
        <h5>This is an automated message</h5>
        <p>Please do not reply to this email.</p>
        <p>This message has been generated automatically and will not be attended to.</p>
      </div>
    </center>
</footer>
</body>
</html>
