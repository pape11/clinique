<div>
    <div class="row mb-5">
        <div class="col-2 me-5 p-2  py-4 alert alert-warning">
            @foreach ($categories as $categorie)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="{{ $categorie->specialite }}" wire:model="activefilters.{{ $categorie->specialite }}">
                <label class="form-check-label" for="{{ $categorie->specialite }}">
                <p>{{ $categorie->specialite }}</p>
                </label>
            </div>
            @endforeach
        </div>
        <div class="col-9 ms-4">
            <div class="alert alert-warning" style="background: ">
                <table class="table table-hover table-striped table-warning">
                    <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Nom complet</th>
                          <th scope="col">Spécialité</th>
                          <th scope="col">Date Rendez-vous</th>
                          <th scope="col " class="text-center" colspan="2">Option</th>
                        </tr>
                      </thead>
                      <tbody class="table-group-divider">
                        @foreach ($rendez_vous as $patient)
                        <tr>
                            <th scope="row">{{ $patient->id }}</th>
                            <td>{{ $patient->nom_complet }}</td>
                            <td>{{ $patient->specialite }}</td>
                            <td>{{ $patient->rendez_vous }}</td>
                            <td class="text-center"><a href="{{ route('infos-rendez-vous', $patient->id) }}" class="btn text-light" style="background: #bf836082;">Infos</a></td>
                            <td class="text-center"><a href="" class="btn text-light" style="background: #BF8360;">Modifier</a></td>
                          </tr>
                        @endforeach
                        @if ($total->count() < 1)
                            <tr>
                                <th scope="row" class="text-center p-5" colspan="5">Désolé mais cette date ne correspond à aucune rendez-vous</th>
                            </tr>
                        @endif
                </table>
                {{-- <div class="d-flex justify-content-center mt-5" >
                    {{ $rendez_vous->links("pagination.custom") }}
                </div> --}}
            </div>
        </div>
    </div>
</div>
