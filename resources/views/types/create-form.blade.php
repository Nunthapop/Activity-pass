@extends('layouts.main')
@section('title', 'Add Type of Activity')
@section('content')

    <!-- สร้างกิจกรรม -->

<link rel="stylesheet" href="{{ asset('css/create.css') }}" type="text/css">

<div class="container">
<form action="{{ route('types.create') }}" method="POST">
    @csrf <!-- ป้องกันการโจมตี CSRF -->

    <div>
        <label for="code"><strong>Code</strong></label>
        <input type="text" name="code" id="code" required>
    </div>
    <div>
        <label for="name"><strong>Name</strong></label>
        <input type="text" name="name" id="name" required>
    </div>
    <div>
        <label for="details"><strong>Details</strong></label>
        <textarea name="description" id="description" rows="5" required></textarea>
    </div>

    <nav>
        <ul class="action-menu">
            <li class="action-item">
                <a href="{{ route('types.list') }}">
                    <button type="button" class="back-button">Back</button>
                </a>
            </li>
            <li class="action-item">
                <button type="submit" class="submit-button">Submit</button>
            </li>
            <li class="action-item">
                <button type="reset" class="cancel-button">Cancel</button>
            </li>
        </ul>
    </nav>
</form>
</div>

@endsection
