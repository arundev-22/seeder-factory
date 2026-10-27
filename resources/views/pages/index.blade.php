@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <table class="table text-center align-middle mt-4">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Marks</th>
                    <th>Edit</th>
                </tr>
                @foreach($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->marks }}</td>
                        <td>
                            <button type="button" class="btn" commandfor="editDialog-{{ $student->id }}" command="show-modal">edit</button>
                            <form action="{{ route('post.destroy', $student) }}" method="post" onsubmit="return confirm('Are you sure you want delete this product?')">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn">delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            
        </div>
    </div>

@endsection