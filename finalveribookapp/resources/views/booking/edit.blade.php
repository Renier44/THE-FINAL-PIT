<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Booking</title>
    <style>
        /* CSS styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #94a2aa;
            padding: 20px;
            color: #333;
        }
        
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 1px solid #8b5225;
        }
        
        h1 {
            text-align: center;
            color: #333;
            font-family: 'Arial', sans-serif;
            margin-bottom: 20px;
        }
        
        form {
            margin-top: 20px;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #333;
            font-weight: bold;
        }
        
        .form-group input,
        .form-group select {
            width: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }
        
        button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-family: 'Arial', sans-serif;
        }
        
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Booking</h1>
        
        <form action="{{ route('booking.update', $booking->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ $booking->name }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ $booking->email }}" required>
            </div>

            <div class="form-group">
                <label for="checkin">Check-In Date:</label>
                <input type="date" id="checkin" name="checkin" value="{{ $booking->checkin }}" required>
            </div>

            <div class="form-group">
                <label for="checkout">Check-Out Date:</label>
                <input type="date" id="checkout" name="checkout" value="{{ $booking->checkout }}" required>
            </div>

            <div class="form-group">
                <label for="room">Room Type:</label>
                <select id="room" name="room" required>
                    <option value="single" {{ $booking->room === 'single' ? 'selected' : '' }}>Single</option>
                    <option value="double" {{ $booking->room === 'double' ? 'selected' : '' }}>Double</option>
                    <option value="suite" {{ $booking->room === 'suite' ? 'selected' : '' }}>Suite</option>
                </select>
            </div>

            <div class="form-group">
                <label for="adults">Number of Adults:</label>
                <input type="number" id="adults" name="adults" value="{{ $booking->adults }}" min="1" required>
            </div>

            <div class="form-group">
                <label for="children">Number of Children:</label>
                <input type="number" id="children" name="children" value="{{ $booking->children }}" min="0" required>
            </div>

            <button type="submit">Update Booking</button>
        </form>
    </div>
</body>
</html>
