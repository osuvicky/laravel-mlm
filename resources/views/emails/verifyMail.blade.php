<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $data['title'] }}</title>
</head>
<body>
    <p>Hi {{ $data['firstname'] }}, welcome to Referral System!</p>
    <p>Please <a href="{{ $data['url'] }}">Click Here</a> to verify your email.</p>

    <p>Thank You!</p>
</body>
</html>