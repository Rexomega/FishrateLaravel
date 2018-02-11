<!DOCTYPE html>
<html>
<head>
	<title>404 Error! | {{Fungsi::$namaWebsite}}</title>
	@include("utility")
</head>
<body>
	<center>
		<img src="{{asset('img/'.Fungsi::$logoWebsite)}}" width="500" height="500">
		<br>
		<h2>Page Not Found</h2>
		<a href="javascript:history.go(-1)">Back</a>
	</center>
</body>
</html>