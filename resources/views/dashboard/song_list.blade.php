<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Songs List</title>
  <link rel="stylesheet" href="{{ asset('CSS/style.css') }}">
  <style>
    .no-songs {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 70vh;
      /* take most of the screen */
      font-size: 20px;
      color: #888;
      text-align: center;
    }

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
      min-height: 100vh;
      border-radius: 0;
      box-shadow: none;
    }

    header {
      font-size: 22px;
      margin-bottom: 20px;
    }

    /* Song list styles */
    .song-list {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .song-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 12px 15px;
      border-bottom: 1px solid #eee;
    }

    .song-title {
      font-weight: bold;
    }

    .song-actions button {
      background: #3498db;
      border: none;
      color: white;
      padding: 6px 12px;
      border-radius: 4px;
      cursor: pointer;
      margin-left: 5px;
    }

    .song-actions button:hover {
      background: #2980b9;
    }
  </style>
</head>

<body>
  <!-- Sidebar -->
  <div class="sidebar">
    <h2>My Dashboard</h2>
    <a href="/upload_song">⬆️ Upload Song</a>
    <a>🎵 Songs</a>
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
      <header>Songs List</header>

      {{-- Success message --}}
      @if(session('success'))
        <div style="color: green; margin-bottom: 10px;">
          {{ session('success') }}
        </div>
      @endif

      {{-- List of songs --}}
      <ul class="song-list">
        @forelse($songs as $song)
          <li class="song-item">
            <span class="song-title">{{ $song->title }}</span>
            <div class="song-actions">
              {{-- <a href="{{ route('dashboard', $song->id) }}">
                <button>View</button>
              </a> --}}
              <a href="{{ route('songs.edit', $song->id, ) }}">
                <button>Edit</button>
              </a>
              <form action="{{ route('songs.delete', $song->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" style="background: red;">Delete</button>
              </form>
            </div>
          </li>
        @empty
          <div class="no-songs">No songs found.</div>
        @endforelse
      </ul>
    </div>
  </div>
</body>

</html>