<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    
    <div class="container my-5">
        <h2>Modifier l'offre</h2>
        <form action="{{ route('joboffers.update', $joboffer->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Titre</label>
                <input type="text" name="title" class="form-control" value="{{ $joboffer->title }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <input type="text" name="description" class="form-control" value="{{ $joboffer->description }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Exigences</label>
                <input type="text" name="requirements" class="form-control" value="{{ $joboffer->requirements }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Lieu</label>
                <input type="text" name="location" class="form-control" value="{{ $joboffer->location }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Type de contrat</label>
                <input type="text" name="contract_type" class="form-control" value="{{ $joboffer->contract_type }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Date de publication</label>
                <input type="date" name="date_posted" class="form-control" value="{{ $joboffer->date_posted }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Statut</label>
                <input type="text" name="status" class="form-control" value="{{ $joboffer->status }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Type (partiel/ plein temps)</label>
                <input type="text" name="type" class="form-control" value="{{ $joboffer->type }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Durée</label>
                <input type="text" name="duree" class="form-control" value="{{ $joboffer->duree }}">
            </div>

            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <a href="{{ route('joboffers.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>


</body>
</html>
