<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $data['title'] }} </title>
</head>
<body>
    <p>Hi {{ $data['firstname'] }}, welcome to Laravel Referral System!</p>
    <p><b>Username:-</b>{{ $data['email'] }}</p>
    <p><b>Password:-</b>{{ $data['password'] }}</p>
    <p>You can add users to your Network by sharing your <a href="{{ $data['url'] }}">Referral Link</a></p>

    <p>Thank You!</p>


</body>
</html> 