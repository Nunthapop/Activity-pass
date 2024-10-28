@extends('layouts.main')
@section('title', 'Reward: Create')
@section('content')

    <!-- Reward Creation Page -->

    <!-- Form -->
    <form action="{{ route('rewards.create') }}" method="POST">
        @csrf <!-- CSRF token for security -->

        <p>
            <strong>Code:</strong>
            <input type="text" name="code" value="" required>
        </p>
        <p>
            <strong>Score:</strong>
            <input type="number" name="score" value="" required>
        </p>
        <p>
            <strong>QTY:</strong>
            <input type="number" name="qty" value="" required>
        </p>
        <p>
            <strong>Description:</strong>
            <textarea name="description" required></textarea>
        </p>

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
                    <button type="clear" class="cancel-button">Cancel</button>
                </li>
            </ul>
        </nav>

    </form>

@endsection
