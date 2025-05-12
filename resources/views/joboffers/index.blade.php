<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des Offres</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Liste des Offres d'emploi</h1>
        <form action="{{ route('joboffers.search') }}" method="GET" class="mb-4">
            <input type="text" name="query" class="form-control" placeholder="Rechercher une offre..." value="{{ request('query') }}">
            <button type="submit" class="btn btn-primary mt-2">Rechercher</button>
        </form>

        <a href="{{ route('joboffers.create') }}">Créer une nouvelle offre</a>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Intitulé</th>
                    <th>Description</th>
                    <th>Exigences</th>
                    <th>Lieu</th>
                    <th>Type de contrat</th>
                    <th>Date publication</th>
                    <th>Statut</th>
                    <th>Durée</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($jobOffers as $offer)
                    <tr>
                        <td>{{ $offer->title }}</td>
                        <td>{{ $offer->description }}</td>
                        <td>
                            @php
                                $requirements = is_array($offer->requirements) ? $offer->requirements : json_decode($offer->requirements, true);
                            @endphp
                            @if(is_array($requirements))
                                <ul class="mb-0">
                                    @foreach ($requirements as $req)
                                        <li>{{ $req }}</li>
                                    @endforeach
                                </ul>
                            @else
                                {{ $offer->requirements }}
                            @endif
                        </td>
                        <td>{{ $offer->location }}</td>
                        <td>{{ $offer->contract_type }}</td>
                        <td>{{ \Carbon\Carbon::parse($offer->date_posted)->format('d/m/Y') }}</td>
                        <td>{{ ucfirst($offer->status) }}</td>
                        <td>{{ $offer->duree ?? '-' }}</td>
                        <td>
                            {{-- <a href="{{ route('joboffers.show', $offer->id) }}" class="btn btn-info btn-sm">Détails</a> --}}
                            <a href="{{ route('joboffers.edit', $offer->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <a href="{{ route('joboffers.show', $offer->id) }}" class="btn btn-warning btn-sm">Détails</a>
                            <form action="{{ route('joboffers.destroy', $offer->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette offre ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">Aucune offre trouvée.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {{ $jobOffers->links() }}
        </div>
    </div>
</body>
</html>
