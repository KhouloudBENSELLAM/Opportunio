<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container my-5">
        <h2 class="mb-4">Détails de l'Offre d'Emploi</h2>
    
        <div class="card shadow-sm">
            <div class="card-body">
                <p><strong>Profil Rechercher: </strong></p>
                <h5 class="card-title text-primary mb-3">{{ $joboffer->title }}</h5>
    
                <p><strong>Description :</strong></p>
                <p class="mb-3">{{ $joboffer->description }}</p>
    
                <p><strong>Exigences :</strong></p>
                @php
                $requirements = is_array($joboffer->requirements) ? $joboffer->requirements : json_decode($joboffer->requirements, true);
                @endphp
                @if(is_array($requirements))
                    <ul class="mb-0">
                        @foreach ($requirements as $req)
                            <li>{{ $req }}</li>
                        @endforeach
                    </ul>
                @else
                    {{ $joboffer->requirements }}
                @endif

                {{-- <p><strong>Exigences :</strong></p> --}}
                {{-- <p class="mb-3">{{ $joboffer->requirements ?? 'Non spécifié' }}</p> --}}
    
                <p><strong>Lieu :</strong> {{ $joboffer->Location ?? 'Non spécifié' }}</p>
                <p><strong>Type de contrat :</strong> {{ $joboffer->contract_type ?? 'Non spécifié' }}</p>
                <p><strong>Date de publication :</strong> {{ \Carbon\Carbon::parse($joboffer->date_posted)->format('d/m/Y') }}</p>
                <p><strong>Statut :</strong> 
                    <span class="badge bg-{{ $joboffer->status === 'active' ? 'success' : 'secondary' }}">
                        {{ ucfirst($joboffer->status) }}
                    </span>
                </p>
                <p><strong>Durée :</strong> {{ $joboffer->duree ?? 'Non précisée' }}</p>
                <p><strong>Créée le :</strong> {{ $joboffer->created_at->format('d/m/Y H:i') }}</p>
                <p><strong>Dernière modification :</strong> {{ $joboffer->updated_at->format('d/m/Y H:i') }}</p>
            </div>
        </div>
    
        <div class="mt-4">
            <a href="{{ route('joboffers.edit', $joboffer->id) }}" class="btn btn-warning">Modifier</a>
    
            <form action="{{ route('joboffers.destroy', $joboffer->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette offre ?')">
                    Supprimer
                </button>
            </form>
    
            <a href="{{ route('joboffers.index') }}" class="btn btn-secondary">Retour à la liste</a>
        </div>
    </div>
</body>
</html>