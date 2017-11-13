
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
<!-- ./CRUD PRACTICE FORM -->
<!-- AJAX PRACTICE -->
<center>
	<div class="container box">
		<form name="add_tweet" method="post">
			<h3 align="center"> Tweet Page </h3>
			<div class="form-group">
					<textarea name="tweet" id="tweet"></textarea>
			</div>
			<div class="form-group">
				<input type="button" name="btn_tweet" id="btn_tweet">
			</div>
		</form>

	<div id="load_tweets">
	</div>

</center>
<!-- ./AJAX PRACTICE -->
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