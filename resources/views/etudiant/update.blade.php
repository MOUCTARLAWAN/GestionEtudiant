<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>liste</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h1>Modifier un etudiant</h1>
                <hr>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                @endif
                <ul>
                @foreach ($errors->all() as $error)
                   <li class="alert alert-danger">{{$error}}</li>
                @endforeach
                </ul>
                <form action="/update/traitement" method="GET" class="form-group">
                    @csrf

                    <input type="text" name="id" style="display: none;" value="{{$etudiants->id}}" />
                    <div class="mb-3">
                      <label for="nom" class="form-label">Nom</label>
                      <input type="text" class="form-control" name="nom" value="{{$etudiants->nom}}" id="nom">
                    </div>

                    <div class="mb-3">
                      <label for="prenom" class="form-label">Prenom</label>
                      <input type="text" class="form-control" value="{{$etudiants->prenom}}" name="prenom" id="prenom">
                    </div>

                    <div class="mb-3">
                        <label for="sexe" class="form-label">Sexe</label>
                        <input type="text" class="form-control" value="{{$etudiants->sexe}}" name="sexe" id="sexe">
                      </div>

                      <div class="mb-3">
                        <label for="filiere" class="form-label">Filiere</label>
                        <select name="filiere" id="filiere" class="form-select" aria-label="Default select example">
                            <option value="{{$etudiants->filiere}}">{{$etudiants->filiere}}</option>
                            @foreach ($Filiere as $filieres)
                                <option value="{{$filieres->filiere }}">{{$filieres->filiere }}</option>
                             @endforeach
                          </select>

                      </div>
                    <button type="submit" class="btn btn-primary">Modifier</button><br><br>
                    <a class="btn btn-danger" href="/etudiant">Liste des etudiants</a>
                  </form>


            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
