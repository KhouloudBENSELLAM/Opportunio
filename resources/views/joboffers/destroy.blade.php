<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <div class="container">
        <h2>Supprimer l'offre : {{ $joboffer->title }}</h2>
        <p>Êtes-vous sûr de vouloir supprimer cette offre ?</p>

        <form action="{{ route('joboffers.destroy', $joboffer->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Oui, supprimer</button>
            <a href="{{ route('joboffers.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>

</body>
</html>