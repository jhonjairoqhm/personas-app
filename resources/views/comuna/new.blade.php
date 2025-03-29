!doctype html>
 <html lang="en">
 
 <head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
         integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 
     <title>Add Municipality</title>
 </head>
 
 <body>
     <div class="container">
         <h1>Add Municipality</h1>
         <form method="POST" action="{{ route('municipios.store') }}">
             @csrf
             <div class="mb-3">
                 <label for="muni_codi" class="form-label">Code</label>
                 <input type="text" class="form-control" id="muni_codi" aria-describedby="codeHelp" name="muni_codi" disabled="disabled">
                 <div id="codeHelp" class="form-text">Municipality code</div>
             </div>
             <div class="mb-3">
                 <label for="muni_nomb" class="form-label">Municipality Name</label>
                 <input type="text" required class="form-control" id="muni_nomb" aria-describedby="nameHelp" name="muni_nomb" placeholder="Municipality name.">
             </div>
     
             <label for="department">Department:</label>
             <select class="form-select" id="department" name="depa_codi" required>
                 <option selected disabled value="">Choose one...</option>
                 @foreach ($departamentos as $departamento)
                     <option value="{{ $departamento->depa_codi }}">{{ $departamento->depa_nomb }}</option>
                 @endforeach
             </select>
             <div class="mt-3">
                 <button type="submit" class="btn btn-primary">Save</button>
                 <a href="{{ route('municipios.index') }}" class="btn btn-warning">Cancel</a>
             </div>
         </form>
     </div>
     
     <!-- Bootstrap Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
         integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
     </script>
 </body>

 </html>