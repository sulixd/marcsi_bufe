<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Marcsi Büfé</title>
     <link href="{{$app->baseUrl}}css/dist.css" rel="stylesheet">
</head>
<body>
     <header>
          {{* $app->render->view('layouts/navbar', ['app' => $app]) }}
     </header>
     @section:main;
</body>
</html>