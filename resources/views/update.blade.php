<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{asset('/css/style.css')}}" rel="stylesheet" type="text/css" media="all"/>
</head>
<body class="fontnen">
<form method="post" action="{{ route('update',$customer->id) }}">
    <p>@csrf</p>
    <div>
        <center><label style="color: white">Name <input type="text" class="form-text" name="user_name" value="{{ $customer['full_name'] }}"></label></center>
    </div>
    <div>
        <center><label style="color: white">Phone <input type="text" class="form-text" name="phone" value="{{ $customer['phone_number'] }}"></label></center>
    </div>
    <div>
        <center> <label style="color: white">Email <input type="text" class="form-text" name="email" value="{{ $customer['email'] }}"></label></center>
    </div>
    <div>
        <center><input type="submit" value="submit"></center>
    </div>
</form>
</body>
</html>