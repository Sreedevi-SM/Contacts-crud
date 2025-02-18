
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bulk Import Contacts</title>
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
        input[type="file"] {
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
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
        <h1>Bulk Import Contacts</h1>

        @if(session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @elseif(session('error'))
            <p style="color: red;">{{ session('error') }}</p>
        @endif

        <form action="{{ route('contacts.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="xml_file">Select XML File</label>
            <input type="file" name="xml_file" id="xml_file" accept=".xml" required>
            <button type="submit">Import Contacts</button>
        </form>

        <a href="{{ route('contacts.index') }}">Back to Contact List</a>
    </div>

</body>
</html>
