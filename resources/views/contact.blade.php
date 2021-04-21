<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail pour Orcusa</title>
</head>
<body>
    <h1>Formulaire de contact du site Web Orcusa.fr</h1>
    <p>Nom Complet: {{ $details['name'] }}</p>
    <p>Email: {{ $details['email'] }}</p>
    <p>Numéro de telephone: {{ $details['phone'] }}</p>
    <p>Demande concerne: {{ $details['demande'] }}</p>
    <p>Message: {{ $details['message'] }}</p>
</body>
</html>