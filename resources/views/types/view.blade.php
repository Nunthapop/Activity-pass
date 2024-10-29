@extends('layouts.main')
@section('title', 'Type of Activity: ' .$type->name)
@section('content')


<link rel="stylesheet" href="{{ asset('css/view.css') }}" type="text/css">
    <main>
    <div class="container">
        <div class="details">
            <div class="detail-item">
                <label><strong>Code:</strong></label>
                <span>{{ $type->code }}</span>
            </div>
            <div class="detail-item">
                <label><strong>Name:</strong></label>
                <span>{{ $type->name }}</span>
            </div>
            <div class="detail-item">
                <label><strong>Description:</strong></label>
                <span>{{ $type->description }}</span>
            </div>
        </div>

        <!-- ปุ่ม action -->
    <nav>
        <ul class="action-menu">
            @can('create', \App\Models\Student::class)
               <li class="action-item">
                   <a href="{{ route('types.update-form', ['type_code' => $type->code]) }}">
                       <button type="button" class="update-button">Update</button>
                   </a>
               </li>
               @endcan

           @can('create', \App\Models\Student::class)
               <li class="action-item">
                   <a href="{{ route('types.delete', ['type_code' => $type->code]) }}">
                       <button type="button" class="delete-button">Delete</button>
                   </a>
               </li>
         @endcan
        </ul>
    </nav>
    
    </div>
    </main>

@endsection
