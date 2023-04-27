<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{$title}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
</head>
<body>
<div class="container col-xl-10 col-xxl-8 px-4 py-5">
    @if (isset($error))
    <div class="row">
        <div class="alert alert-danger text-center" role="alert">
            {{$error}}
        </div>
    </div>
    @endif
    <div class="row">
        <form method="post" action="{{ route('logout') }}">
            @csrf
            <button class="w-15 btn btn-lg btn-danger" type="submit">Logout</button>
        </form>
    </div>
    <div class="row align-items-center g-lg-5 py-5">
        <div class="col-lg-7 text-center text-lg-start">
            <h1 class="display-4 fw-bold lh-1 mb-3">Todolist</h1>
        </div>
        <div class="col-md-10 mx-auto col-lg-5">
            <form class="p-4 p-md-5 border rounded-3 bg-light" method="post" action="{{ route('addTodo') }}">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('todo') is-invalid @enderror" name="todo" placeholder="todo">
                    <label for="todo">Todo</label>
                    @error('todo')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Add Todo</button>
            </form>
        </div>
    </div>
    <div class="row align-items-right g-lg-5 py-5">
        <div class="mx-auto">
            <form id="deleteForm" method="post" style="display: none">

            </form>
            <table class="table table-striped table-bordered text-center">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">TODO</th>
                    <th scope="col">ACTION</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($todolist as $todo)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $todo['todo'] }}</td>
                        <td>
                            <form action="/{{$todo['id']}}/delete" method="post">
                                @csrf
                                <button class="w-100 btn btn-lg btn-danger" onclick="return confirm('are you sure?')" type="submit">Remove</button>
                            </form>
                        </td>
                    </tr>        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>