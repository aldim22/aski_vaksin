<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="POST" action="{{ url('import') }}" enctype="multipart/form-data">
@csrf
<label>Upload</label>
<input type="file" name="file">
<button type="submit">upload</button>
</form>
</body>
</html>