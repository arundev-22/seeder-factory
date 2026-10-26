<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">

</head>
<body>
    <div class="nav nav-bar w-100 bg-secondary d-flex justify-content-between align-items-center p-3">
        <div class="row m-4 g-2">Laravel Application</div>
        <div>
            <button type="button" class="btn-solid theme-primary m-2" commandfor="invokerDialog" command="show-modal">
            Add Data
            </button>
        </div>
        <dialog class="dialog" id="invokerDialog">
            <div class="dialog-header">
                <h1 class="dialog-title">Student Form</h1>
                <button type="button" class="btn-close" commandfor="invokerDialog" command="close" aria-label="Close"></button>
            </div>
            <form action="{{ route('post.store') }}" method="POST">
                @csrf
                <div class="dialog-body">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                    @error('name')
                        <span class="text font-medium text-danger mt-1 block">{{ $message }}</span>
                    @enderror
                    <br>
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}">
                    @error('email')
                        <span class="text font-medium text-danger mt-1 block">{{ $message }}</span>
                    @enderror
                    <br>
                    <label for="marks">Marks:</label>
                    <input type="number" name="marks" id="marks" class="form-control" value="{{ old('marks') }}">
                    @error('marks')
                        <span class="text font-medium text-danger mt-1 block">{{ $message }}</span>
                    @enderror
                </div>
                <div class="dialog-footer">
                    <button type="button" class="btn-solid theme-secondary" commandfor="invokerDialog" command="close">Close</button>
                    <button type="submit" class="btn-solid theme-secondary" commandfor="invokerDialog" command="add">Add</button>
                </div>
            </form>
        </dialog>
    </div>
    @foreach($students as $student)
    <form action="{{ route('post.update', $student) }}" method="post">
        @csrf
        @method('PUT')
        <dialog class="dialog" id="editDialog-{{ $student->id }}">
            <div class="dialog-header">
                <h1 class="dialog-title">Edit Student Data</h1>
                <button type="button" class="btn-close" commandfor="editDialog-{{ $student->id }}" command="close" aria-label="Close"></button>
            </div>
            <div class="dialog-body">
                <label for="name-{{ $student->id }}">Name:</label>
                <input type="text" name="name" id="name-{{ $student->id }}" class="form-control" value="{{ old('name', $student->name) }}">
                @error('name')
                    <span class="text font-medium text-danger mt-1 block">{{ $message }}</span>
                @enderror
                <br>
                <label for="email-{{ $student->id }}">Email:</label>
                <input type="text" name="email" id="email-{{ $student->id }}" class="form-control" value="{{ old('email', $student->email) }}">
                @error('email')
                    <span class="text font-medium text-danger mt-1 block">{{ $message }}</span>
                @enderror
                <br>
                <label for="marks-{{ $student->id }}">Marks:</label>
                <input type="number" name="marks" id="marks-{{ $student->id }}" class="form-control" value="{{ old('marks', $student->marks) }}">
                @error('marks')
                    <span class="text font-medium text-danger mt-1 block">{{ $message }}</span>
                @enderror
            </div>
            <div class="dialog-footer">
                <button type="button" class="btn-solid theme-secondary" commandfor="editDialog-{{ $student->id }}" command="close">Close</button>
                <!-- Removed invalid commandfor/command attributes -->
                <button type="submit" class="btn-solid theme-secondary">Update</button>
            </div>
        </dialog>
    </form>
    @endforeach
    <div class="container">
        <div class="d-flex justify-content-center flex-shrink-0">
            @if(session('success'))
            <div id="success-alert" class="alert alert-success alert-dismissible fade show bg-success bg-opacity-50 w-50 d-flex flex-column  justify-content-center align-items-center" role="alert">
                {{ session('success') }}
            </div>
            @endif
        </div>
        <div class="flex-grow-1 overflow-hidden">
            @yield('content')
        </div>
    </div>

    <script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous"></script>
    @if ($errors->any())
    <script>
        $(document).ready(function () {
            $('#invokerDialog').dialog('show');
        });
    </script>
    @endif
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const alert = document.getElementById('success-alert');
            if (alert) {
                setTimeout(() => {
                    alert.style.transition = "opacity 0.5s ease";
                    alert.style.opacity = "0";
                    
                    setTimeout(() => alert.remove(), 500); 
                }, 3000); 
            }
        });
    </script>
</body>
</html>