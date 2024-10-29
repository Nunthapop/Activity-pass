@extends('layouts.main')
@section('title', 'Activity: Create')
@section('content')

    <!-- สร้างกิจกรรม -->
    <link rel="stylesheet" href="{{ asset('css/create.css') }}" type="text/css">
    <div class="container">
        <form action="{{ route('activities.create') }}" method="POST">
            @csrf <!-- ป้องกันการโจมตี CSRF -->
    
            <!-- ฟิลด์สำหรับกรอกข้อมูล -->
            <div>
                <label for="name"><strong>Name:</strong></label>
                <input type="text" id="name" name="name" required>
            </div>
    
            <div>
                <label for="type"><strong>Type:</strong></label>
                <select name="type" id="type" required>
                    @foreach ($type as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
    
            <div>
                <label for="reward"><strong>Reward:</strong></label>
                <select name="reward" id="reward" required>
                    @foreach ($reward as $item)
                        <option value="{{ $item->id }}">{{ $item->code }}</option>
                    @endforeach
                </select>
            </div>
    
            <div>
                <label for="activity_by"><strong>Activity By:</strong></label>
                <input type="text" id="activity_by" name="activity_by" required>
            </div>
    
            <div>
                <label for="datetime"><strong>Date & Time:</strong></label>
                <input type="datetime-local" id="datetime" name="datetime" required>
            </div>
    
            <div>
                <label for="location"><strong>Location:</strong></label>
                <input type="text" id="location" name="location" required>
            </div>
    
            <div>
                <label for="score"><strong>Score:</strong></label>
                <input type="number" id="score" name="score" required>
            </div>
    
            <div>
                <label for="description"><strong>Description:</strong></label>
                <textarea id="description" name="description" required></textarea>
            </div>
    
            <!-- ปุ่ม action -->
            <nav>
                <ul class="action-menu">
                    <li class="action-item">
                        <a href="{{ route('activities.list') }}">
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
