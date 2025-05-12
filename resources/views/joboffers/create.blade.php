<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Ajouter une offre d'emploi</title>
</head>
<body>
    <form action="{{ route('joboffers.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Compnay Id</label>
            <input type="text" name="company_id" class="form-control"  required>
        </div>
        <div class="mb-3">
            <label class="form-label">Titre</label>
            <input type="text" name="title" class="form-control"  required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <input type="text" name="description" class="form-control"  required>
        </div>

        <div class="mb-3">
            <label class="form-label">Exigences</label>
            <input type="text" name="requirements" class="form-control"  required>
        </div>

        <div class="mb-3">
            <label class="form-label">Lieu</label>
            <input type="text" name="location" class="form-control"  required>
        </div>

        <div class="mb-3">
            <label class="form-label">Type de contrat</label>
            <input type="text" name="contract_type" class="form-control"  required>
        </div>

        <div class="mb-3">
            <label class="form-label">Date de publication</label>
            <input type="date" name="date_posted" class="form-control"  required>
        </div>

        <div class="mb-3">
            <label class="form-label">Statut</label>
            <input type="text" name="status" class="form-control"  required>
        </div>

        <div class="mb-3">
            <label class="form-label">Type (partiel/ plein temps)</label>
            <input type="text" name="type" class="form-control" >
        </div>

        <div class="mb-3">
            <label class="form-label">Durée</label>
            <input type="text" name="duree" class="form-control" >
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="{{ route('joboffers.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
    
</body>
</html>
