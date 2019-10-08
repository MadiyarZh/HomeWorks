<!DOCTYPE html>
<html>
<head>
	<title>Hello Page</title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<style type="text/css">
	.form-group {
		width: 400px;
		margin: 3% auto;
	}
	.btn-primary {
		margin: 10px;
	}
	form {
		width: 450px;
		margin: 4% auto;
	    border: 2px solid dodgerblue;
	    padding: 20px 10px;
	}
</style>
<body>
    <form action="hello_action" method="Get">

    <input type="hidden" name="_token" value="{{csrf_token()}}">
    
    @if ($errors->any())
        <div class="alert alert-danger">
          @foreach ($errors->all() as $error)
            <h2>Hello {{$error}}, your surname {{$surname}}</h2>
            @endforeach
        </div>
    @endif
     <div class="form-group">
      <label for="name">Name:</label>
      <input type="name" class="form-control" id="name" placeholder="Enter name" name="name">
    </div>
    <div class="form-group">
      <label for="surname">Surname:</label>
      <input type="surname" class="form-control" id="surname" placeholder="Enter surname" name="surname">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</body>
</html>