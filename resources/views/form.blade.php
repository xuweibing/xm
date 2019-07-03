<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>form表单</title>
</head>
<body>
	<form action="/doadd1" method="post">
		名字:<input type="text" name="name"><br/>
		年龄:<input type="text" name="age"><br/>
		{{csrf_field()}}
		<input type="submit" value="提交">
	</form>
</body>
</html>