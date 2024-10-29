@extends('layouts.main')
@section('title', 'Type of Activity Update: ' . $type->code)
@section('content')

    <!-- หน้านี้ใช้สำหรับอัปเดต -->
    <link rel="stylesheet" href="{{ asset('css/create.css') }}" type="text/css">
    <!-- ฟอร์ม -->
    <div class="container">
        <form action="{{ route('types.update', ['type_code' => $type->code]) }}" method="POST">
            @csrf <!-- ป้องกันการโจมตี CSRF -->
    
            <div>
                <label for="code"><strong>Code</strong></label>
                <input type="text" name="code" id="code" value="{{ $type->code }}" required>
            </div>
            <div>
                <label for="name"><strong>Name</strong></label>
                <input type="text" name="name" id="name" value="{{ $type->name }}" required>
            </div>
            <div>
                <label for="description"><strong>Description</strong></label>
                <textarea name="description" id="description" cols="200" rows="10" required>{{ $type->description }}</textarea>
            </div>
    
            <nav>
                <ul class="action-menu">
                    <li class="action-item">
                        <a href="{{ route('types.view', ['type_code' => $type->code]) }}">
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
