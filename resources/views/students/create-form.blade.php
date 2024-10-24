@extends('layouts.main')
@section('title', 'Student: Create')
@section('content')

    <!-- หน้าสร้างรางวัล -->

    <!-- ฟอร์ม -->
    
    <form action="{{ route('students.create') }}" method="POST"> 
        @csrf <!-- CSRF token for security -->
        
        <p>
            <strong>Code:</strong>
            <input type="number" name="code" value="" required> 
        </p>
        
        <p>
            <strong>Name:</strong>
            <input type="text" name="username" value="" required> 
        </p>
        
        <p>
            <strong>First Name:</strong>
            <input type="text" name="first_name" value="" required> 
        </p>
        
        <p>
            <strong>Last Name:</strong>
            <input type="text" name="last_name" value="" required> 
        </p>
    
        <p>
            <strong>Year:</strong>
            <input type="number" name="year" value="" required> 
    
        <p>
            <strong>Major:</strong>
            <select name="major" required>
                <option value="">Select Major</option>
                <option value="SE">SE</option>
                <option value="DII">DII</option>
                <option value="MMIT">MMIT</option>
                <option value="DG">DG</option>
                <option value="ANI">ANI</option>
            </select>
        </p>
    
        <button type="submit">Create Student</button> <!-- Submit button -->
    </form>
  
    
@endsection
