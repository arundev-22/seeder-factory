<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">

</head>
<body>
    <div class="nav nav-bar w-100 bg-secondary">
        <div class="row m-4 g-2">Home</div>
        <div class="d-flex align-items-end justify-content-center">
            <button type="button" class="btn-solid theme-primary m-2" commandfor="invokerDialog" command="show-modal">
            Add Data
            </button>

            <dialog class="dialog" id="invokerDialog">
                <div class="dialog-header">
                    <h1 class="dialog-title">Invoker Commands</h1>
                    <button type="button" class="btn-close" commandfor="invokerDialog" command="close" aria-label="Close"></button>
                </div>
                <div class="dialog-body">
                    <form action="">
                        @csrf
                        <label for="name">Name:</label>
                        <input type="text" name="name">
                        <br><br>
                        <label for="name">Email:</label>
                        <input type="text" name="name">
                        <br><br>
                        <label for="marks">Marks:</label>
                        <input type="number" name="marks">
                    </form>
                </div>
                <div class="dialog-footer">
                    <button type="button" class="btn-solid theme-secondary" commandfor="invokerDialog" command="close">Close</button>
                    <button type="submit" class="btn-solid theme-secondary" commandfor="invokerDialog" command="add">Add</button>
                </div>
            </dialog>
        </div>
    </div>
    <div class="container">
        @yield('content')
    </div>

    <script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous"></script>
</body>
</html>