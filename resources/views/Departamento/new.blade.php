<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Add Department</title>
</head>

<body>
    <div class="container">
        <h1>Add Department</h1>
        <form method="POST" action="{{ route('departamentos.store') }}">
            @csrf
            <div class="mb-3">
                <label for="depa_codi" class="form-label">Code</label>
                <input type="text" class="form-control" id="depa_codi" aria-describedby="codeHelp" name="depa_codi" disabled="disabled">
                <div id="codeHelp" class="form-text">Department code</div>
            </div>
            <div class="mb-3">
                <label for="depa_nomb" class="form-label">Department Name</label>
                <input type="text" required class="form-control" id="depa_nomb" aria-describedby="nameHelp" name="depa_nomb" placeholder="Department name.">
            </div>
    
            <label for="pais_codi">Country:</label>
            <select class="form-select" id="pais_codi" name="pais_codi" required>
                <option selected disabled value="">Choose one...</option>
                @foreach ($paises as $pais)
                    <option value="{{ $pais->pais_codi }}">{{ $pais->pais_nomb }}</option>
                @endforeach
            </select>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('departamentos.index') }}" class="btn btn-warning">Cancel</a>
            </div>
        </form>
    </div>
    
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
