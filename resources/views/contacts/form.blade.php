
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($contact) ? 'Edit Contact' : 'Create Contact' }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fa;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 50%;
            margin: 0 auto;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 50px;
            border-radius: 8px;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        label {
            font-size: 14px;
            color: #555;
        }
        input[type="text"],
        input[type="email"] {
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
        }
        button {
            background-color: #28a745;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #218838;
        }
        a {
            text-align: center;
            display: block;
            color: #007bff;
            text-decoration: none;
            margin-top: 15px;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>{{ isset($contact) ? 'Edit Contact' : 'Create Contact' }}</h1>

        <form action="{{ isset($contact) ? route('contacts.update', $contact->id) : route('contacts.store') }}" method="POST">
            @csrf
            @if(isset($contact))
                @method('PUT')
            @endif

            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $contact->name ?? '') }}" required>

            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone', $contact->phone ?? '') }}" required>

            <button type="submit">{{ isset($contact) ? 'Update Contact' : 'Create Contact' }}</button>
        </form>

        <a href="{{ route('contacts.importForm') }}">Bulk Import Contacts</a>
        <a href="{{ route('contacts.index') }}">Back to Contact List</a>
    </div>

</body>
</html>
