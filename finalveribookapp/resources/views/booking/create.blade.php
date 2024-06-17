<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Room</title>
    <link rel="stylesheet" href="/css/new.css">
</head>
<body>
    <h1>Booking info</h1>
    <div>
        @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <form method="post" action="{{ route('room.store') }}">
        @csrf
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" placeholder="Title">
        </div>
        <div>
            <label for="description">Descrip:</label>
            <input type="text" id="description" name="description" placeholder="Description">
        </div>
        <div>
    <label for="price">Price:</label>
    <input type="text" id="price" name="price" placeholder="Price">
</div>

        <input type="submit" value="SAVE A NEW ROOM"/>
    </form>
</body>
</html>
