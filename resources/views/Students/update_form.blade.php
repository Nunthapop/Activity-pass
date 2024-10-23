{{-- @extends('layouts.main')
@section('title', 'Reward: Update')
@section('content')

    <!-- หน้านี้ใช้สำหรับอัปเดตข้อมูลของสินค้า -->

    <!-- ฟอร์มสำหรับอัปเดตข้อมูลสินค้า -->
    <form action="{{ route('products.update', ['product' => $product->code]) }}" method="POST">
        @csrf

        <!-- ฟิลด์สำหรับกรอกข้อมูลสินค้า -->
        <p><strong>Code:</strong> <input type="text" name="code" value="{{ $reward->code }}" required></p>
        <p><strong>Name:</strong> <input type="text" name="name" value="{{ $reward->name }}" required></p>
        <p><strong>Score:</strong> <input type="text" name="score" value="{{ $reward->score }}" required></p>
        <p><strong>Description:</strong>
            <textarea name="description" cols="200" rows="10" required>{{ $reward->description }}</textarea>
        </p>

        <!-- ปุ่มสำหรับส่งฟอร์ม -->
        <button type="submit">Submit</button>

    </form>

@endsection --}}
