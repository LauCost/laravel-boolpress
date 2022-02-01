<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nuova email</title>
</head>

<body>

    <h1>
        Test email
    </h1>

    <dl>
        <dd>
            Nome: {{ $data['name'] }}
        </dd>
        <dd>
            Email: {{ $data['email'] }}
        </dd>
        <div class="message">
            <p>
                Messaggio: {{ $data['message'] }}
            </p>
        </div>
    </dl>

</body>

</html>
