
</!DOCTYPE html>
<html>
<head>
	<title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<!-- CRUD PRACTICE FORM This practice uses no model -->
<!-- mynamejeff -->
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
				<td> UserName: </td>
				<td><input type="text" name="userName"></td>
			</tr>
			<tr>
				<td> Password: </td>
				<td><input type="Password" name="password"></td>
			</tr>
			<tr>
				<td> Email: </td>
				<td><input type="text" name="email"></td>
			</tr>
			<tr>
				<td> Position: </td>
				<td>
                    <select class="form-control" name="position">
                        <option value="1">Administrator</option>
                        <option value="2">Employee</option>
                    </select>
				</td>
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
			<td>UserName</td>
			<td>Password</td>
			<td>Email</td>
			<td>Job Position</td>
			<td>Action</td>
		</tr>
		@foreach($data as $value)
		<tr>
			<td>{{ $value->FIRSTNAME }}</td>
			<td>	
				@if ($value->USERSTATUSID == 1)
				    Active
				@elseif ($value->USERSTATUSID == 2)
				    Inactive
				@else
				    Suspended
				@endif
			</td>	
			<td>{{ $value->LASTNAME }}</td>
			<td>{{ $value->USERNAME}}</td>
			<td>{{ $value->EMAIL }}</td>
			<td>
			<td>	
				@if ($value->USERTITLESID == 1)
				    Admin
				@else
				    Employee
				@endif
			</td>
			<td><a href="/delete/{{ $value->USERID }}"><button>Delete</button></a></td>
		</tr>	
		@endforeach
	</table>
</center>
<!-- ./CRUD PRACTICE FORM -->
<!-- MODEL PRACTICE this uses model -->
<center>
	<div class="container box">
		<h3>All User</h3>

	</div>
</center>
<!-- ./MODEL PRACTICE -->
</body>
</html>
<script>
$(document).ready(function(){
	$('#btn_tweet').click(function(){
		var tweet_txt = $('#tweet').val();
		// trim() used to remove spaces between text
		if($.trim(tweet_txt) != '')
		{
			$.ajax({
				url:"insert.php",
				method:"POST",
				data:{tweet:tweet_txt},
				dataType:"text",
				success:function(data)
				{
					$('#tweet').val(" ");
				}
			});
		}
	});

	setInterval(function(){
		$('#load_tweets').load(fetch.php).fadeIn("slow");
	},1000);
});
</script>