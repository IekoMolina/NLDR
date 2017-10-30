
</!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<center>
	<form action="/insert" method="post">
		<table>
			<tr>
				{{ csrf_field() }}
				<td> FirstName: </td>
				<td><input type="text" name="firstName"></td>
			</tr>
			<tr>
				<td> Last Name: </td>
				<td><input type="text" name="lastName"></td>
			</tr>
			<tr>
				<td><input type="submit" name="submit" value="Add">	</td>
			</tr>
		</table>
		
	</form>
</center>
<center>
	<table>
		<tr>
			<td>FirstName</td>
			<td>LastName</td>
			<td>Action</td>
		</tr>
		@foreach($data as $value)
		<tr>
			<td>{{ $value->firstname }}</td>
			<td>{{ $value->lastname }}</td>
			<td><a href=""><button>Edit</button></a>&nbsp;<a href="/delete/{{ $value->id }}"><button>Delete</button></a></td>
		</tr>	
		@endforeach 
	</table>
	
</center>
</body>
</html>