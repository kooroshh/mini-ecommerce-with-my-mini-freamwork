@extends("layouts.master")


@section('title','Create Articles')

@section('content')

    @if($auth)
        <h1>You Are Logged</h1>
    @else
        <h1>You Are not Logged</h1>
    @endif

    <form action="/articles/create?id=62" method="post">
        <h2>{{ $title }}</h2>
        <label for="title" class="form-label p-2">Title:</label>
        <input type="text" class="form-check my-1 p-1 w-100" name="title" id="title">
        <div class="w-100 d-flex justify-content-center mt-3">
            <button class="btn btn-primary p-2 px-5 " type="submit">Submit</button>
        </div>
    </form>

@endsection

