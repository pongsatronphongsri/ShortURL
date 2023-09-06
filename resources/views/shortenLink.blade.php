<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <style>
        .container {
            border: 2px solid #000; 
            padding: 20px; 
            margin: 20px auto; 
            border-radius: 10px; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); 
            background-color: rgba(255, 255, 255, 0.8); 
        }

    </style>

    <title>shorten Link</title>
  </head>
  <body>
    <div class="container mt-5">
        <h2>Create URL Shortner</h2>
        @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <form method="post" action="{{route('shortlink.post')}}">
                    @csrf

                    <div class="input-group mb-4">
                        <input type="text" name="original_link" class="form-control" placeholder="Enter URL">
                        
                        <div class="input-group-addon">
                            <button class="btn btn-success">Submit</button>

                        </div>
                        
                       
                    </div> 
                    
                    @error('original_link')<p class="m-0 p-0 text text-danger">{{$message}}</p>@enderror
                </form>

            </div>

        </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        
                        <th>Short Link</th>
                        <th>Original Link</th>
                        <th>Visits</th>
                        <th>QR Code</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($shortLinks as $row)
                        <tr>
                            <td>{{$row->id}}</td>
                            <td><a href="{{route('shorten.link',$row->short_link)}}"target="_blank">{{route('shorten.link',$row->short_link)}}</a></td>
                            <td>{{$row->original_link}}</td>
                            <td>{{$row->open_count}}</td>
                            <td><a href="{{ route('show.qr', $row->short_link) }}" class="btn btn-primary">Open QR Code</a></td>
                            <td><a href="{{ route('clear.shortlink', $row->short_link) }}" class="btn btn-danger">Clear</a></td>

                        </tr>
                    @endforeach
                </tbody>

            </table>
    </div>
    
    
    
    
    
  </body>
</html>