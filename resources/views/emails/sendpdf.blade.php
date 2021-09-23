<!doctype html>
<html dir="rtl" lang="ar">
<head>
<meta charset="utf-8">
<title>Docs</title>

</head>

<body>
<?php if($doc == 'no'){?>
<a href="{{asset('upload/doc/'.$doc)}}" download id="downloadpdf">Download Package Doc</a>
<?php }?>
<a href="{{asset('upload/pdf/'.$string)}}" download id="downloadpdf">Download Details Doc</a>
</body>
</html>
