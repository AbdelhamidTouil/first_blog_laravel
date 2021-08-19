@extends('backend.layouts.main')

@section('content')
<form action="" method="post">
    <div class="form-floating mb-3">
    <input type="email" class="form-control" name="email" placeholder="name@example.com">
    <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
    <input type="text" class="form-control" name="message" placeholder="message">
    <label for="message">message</label>
    </div>
    <button type="button" class="btn btn-primary">Primary</button>
</form>
@endsection