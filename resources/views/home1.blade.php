<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="text-primary">Trang đổ tin tức</h2>
        <button type="button" class="btn">Select All</button>
        <button type="button" class="btn btn-primary">Select</button>
        <button type="button" class="btn btn-secondary">Secondary</button>
        <button type="button" class="btn btn-success">Success</button>
        <button type="button" class="btn btn-info">Info</button>
        <button type="button" class="btn btn-warning">Warning</button>
        <button type="button" class="btn btn-danger">Danger</button>
        <table class="show-repo table table-striped">
            <thead>
              <tr>
                <th>Guid</th>
                <th>Nam</th>
                <th>Created_at</th>
              </tr>
            </thead>
            <tbody>
              {{-- @foreach ($repo as $all)
                <tr>
                    <td>{{ $all->guid }}</td>
                    <td>{{ $all->name }}</td>
                    <td>{{ $all->created_at }}</td>
                </tr>
              @endforeach --}}
            </tbody>
        </table>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        
    </script>
</body>
</html>