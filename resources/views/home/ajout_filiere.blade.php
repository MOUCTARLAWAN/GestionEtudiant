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
                <h1>Ajouter une filiere</h1>
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
                <form action="/ajout_filiere/traitement" method="GET" class="form-group">
                    @csrf
                      <div class="mb-3">
                        <label for="classe" class="form-label">Filiere</label>
                        <input type="text" class="form-control" name="filiere" id="filiere">

                      </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button><br><br>
                    <a class="btn btn-danger" href="/etudiant">Liste des etudiants</a>
                  </form>
            </div>
        </div><br>
        <div class="col s12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id Filiere</th>
                            <th>Nom Filiere</th>
                            <th >   Action</th>

                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($Filiere as $filieres )
                        <tr>
                          <td>{{$filieres->id}}</td>
                          <td>{{$filieres->filiere}}</td>
                          <td>
                            <a href="/update_filiere/{{$filieres->id}}" class="btn btn-info">Modifier</a>
                            <a href="/delete_filiere/{{$filieres->id}}" class="btn btn-danger">Delete</a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
