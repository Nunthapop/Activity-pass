@extends('layouts.main')
@section('title', 'Reward: Create')
@section('content')

    <!-- Reward Creation Page -->
    <link rel="stylesheet" href="{{ asset('css/create.css') }}" type="text/css">

    <!-- Form -->
    <div class="container">
    <form action="{{ route('rewards.create') }}" method="POST">
        @csrf <!-- CSRF token for security -->

        <div>
            <label for="code"><strong>Code </strong></label>
            <input type="text" id="code" name="code" placeholder="Enter code" required>
        </div>

        <div>
            <label for="code"><strong>Name </strong></label>
            <input type="text" id="name" name="name" placeholder="Enter name" required>
        </div>
        
        <div>
            <label for="score"><strong>Score </strong></label>
            <input type="number" id="score" name="score" placeholder="Enter score" required>
        </div>
        
        <div>
            <label for="qty"><strong>Quantity </strong></label>
            <input type="number" id="qty" name="qty" placeholder="Enter quantity" required>
        </div>
        
        <div>
            <label for="description"><strong>Description </strong></label>
            <textarea id="description" name="description" placeholder="Enter description" required></textarea>
        </div>      

        <!-- ปุ่ม action -->
        <nav>
            <ul class="action-menu">
                <li class="action-item">
                    <a href="{{ route('rewards.list') }}">
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
