<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('CSS/style.css') }}">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 220px;
            background-color: #2c3e50;
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            padding: 20px 0;
            border-radius: 0;
            text-align: left;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        .logout-btn,
        .sidebar a {
            display: block;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            transition: background 0.3s;
        }
        .logout-btn:hover,
        .sidebar a:hover {
            background-color: #34495e;
        }

        /* Main content */
        .content {
            margin-left: 220px;
            width: 100%;
        }

        .container {
            background: #fff;
            padding: 20px;
            width: 100%;
            height: 100vh;
            border-radius: 0;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        header {
            font-size: 22px;
            margin-bottom: 20px;
        }

        .input-field {
            margin-bottom: 15px;
            display: flex;
            flex-direction: column;
            height: 50%;
        }

        .input-field input {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
            height: 40px;
            font-size: medium;
            /* normal size for input */
        }

        .input-field textarea {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
            height: 550px;
            resize: none;
            font-size: large;
        }

        .button {
            margin-top: 15px;
        }

        .button button {
            background: #3498db;
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            width: 200px;
        }

        .button button:hover {
            background: #2980b9;
        }
    </style>
</head>

<body>
    <!-- Drawer / Sidebar -->
    <div class="sidebar">
        <h2>My Dashboard</h2>
        <a>⬆️ Upload Song</a>
        <a href="/song_list">🎵 Songs</a>
        <a href="#">⚙️ Settings</a>
        <form class="logout-btn" action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" style="background:none; border:none; color:white; cursor:pointer;">
                🚪 Logout
            </button>
        </form>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="container">
            <header>Upload Song</header>

            {{-- Success message --}}
            @if(session('success'))
                <div style="color: green; margin-bottom: 10px;">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Error messages --}}
            @if ($errors->any())
                <div style="color: red; margin-bottom: 10px;">
                    <ul>
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('songs.store') }}">
                @csrf

                <div class="input-field">
                    <input type="text" name="title" value="{{ old('title') }}" placeholder="Song Title" required>
                </div>

                <div class="input-field">
                    <textarea name="lyrics" placeholder="Song Lyrics" required>{{ old('lyrics') }}</textarea>
                </div>

                <div class="button">
                    <button type="submit">Upload Song</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>