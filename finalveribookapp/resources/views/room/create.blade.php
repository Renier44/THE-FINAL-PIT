<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make a Booking</title>
</head>
<body>
    <form action="{{ route('room.store') }}" method="POST">
        @csrf
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="checkin">Check-in Date:</label>
        <input type="date" id="checkin" name="checkin" required>

        <label for="checkout">Check-out Date:</label>
        <input type="date" id="checkout" name="checkout" required>

        <label for="room">Room Type:</label>
        <select id="room" name="room" required>
            <option value="deluxe">Deluxe Room</option>
            <option value="suite">Suite Room</option>
            <option value="family">Family Room</option>
            <option value="executive">Executive Room</option>
        </select>

        <label for="guests">Number of Guests:</label>
        <input type="number" id="guests" name="guests" min="1" required>

        <label for="requests">Special Requests:</label>
        <textarea id="requests" name="requests"></textarea>

        <button type="submit">Book Now</button>
    </form>
</body>
</html>
