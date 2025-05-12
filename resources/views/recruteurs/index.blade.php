<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Recruteurs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Liste des Recruteurs</h1>

        <table class="table table-bordered table-striped table-responsive">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Matricule</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Localisation</th>
                    <th>Secteur</th>
                    <th>Site Web</th>
                    <th>Logo</th>
                    {{-- <th>Date de création</th> --}}
                    {{-- <th>Date de mise à jour</th> --}}
                    {{-- <th>Actions</th> --}}
                </tr>
            </thead>
            <tbody>
                @forelse ($recruteur as $recrute)
                    <tr>
                        <td>{{ $recrute->id }}</td>
                        <td>{{ $recrute->user_id }}</td>
                        <td>{{ $recrute->Matricule }}</td>
                        <td>{{ $recrute->name }}</td>
                        <td>{{ $recrute->description }}</td>
                        <td>{{ $recrute->location }}</td>
                        <td>{{ $recrute->industry }}</td>
                        <td>
                            @if ($recrute->website)
                                <a href="{{ $recrute->website }}" target="_blank">{{ $recrute->website }}</a>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if ($recrute->logo)
                                <img src="{{ asset('storage/' . $recrute->logo) }}" alt="Logo" style="width: 60px;">
                            @else
                                -
                            @endif
                        </td>
                        {{-- <td>{{ \Carbon\Carbon::parse($recrute->created_at)->format('d/m/Y H:i') }}</td>
                        <td>{{ \Carbon\Carbon::parse($recrute->updated_at)->format('d/m/Y H:i') }}</td> --}}
                        {{-- <td>
                            <a href="{{ route('recruteurs.show', $recrute->id) }}" class="btn btn-info btn-sm">Voir</a>
                            
                        </td> --}}
                    </tr>
                @empty
                    <tr>
                        <td colspan="12" class="text-center">Aucun recruteur trouvé.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- <div class="d-flex justify-content-center">
            {{ $recrute->links() }}
        </div> --}}
    </div>
</body>
</html>
