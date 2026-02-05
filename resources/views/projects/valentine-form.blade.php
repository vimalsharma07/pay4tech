<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create your Valentine card 💕</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
      min-height: 100vh;
      background: #fee8e8;
      font-family: "Segoe UI", system-ui, sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 1rem;
    }
    .card {
      background: #fff;
      border-radius: 24px;
      padding: 2rem 2.5rem;
      max-width: 400px;
      width: 100%;
      text-align: center;
      box-shadow: 0 12px 40px rgba(0, 0, 0, 0.08);
    }
    .card h1 {
      color: #1a1a1a;
      font-size: 1.4rem;
      margin-bottom: 0.5rem;
    }
    .card p.sub {
      color: #666;
      font-size: 0.95rem;
      margin-bottom: 1.5rem;
    }
    .form-group {
      text-align: left;
      margin-bottom: 1.25rem;
    }
    .form-group label {
      display: block;
      color: #333;
      font-weight: 600;
      font-size: 0.9rem;
      margin-bottom: 0.4rem;
    }
    .form-group input {
      width: 100%;
      padding: 0.75rem 1rem;
      border: 2px solid #f0f0f0;
      border-radius: 12px;
      font-size: 1rem;
      transition: border-color 0.2s;
    }
    .form-group input:focus {
      outline: none;
      border-color: #ff6b9d;
    }
    .btn {
      width: 100%;
      padding: 0.85rem 1.5rem;
      font-size: 1rem;
      font-weight: 600;
      border: none;
      border-radius: 12px;
      cursor: pointer;
      background: #ff6b9d;
      color: #fff;
      box-shadow: 0 4px 14px rgba(255, 107, 157, 0.4);
      transition: transform 0.15s ease, box-shadow 0.15s ease;
      margin-top: 0.5rem;
    }
    .btn:hover {
      transform: scale(1.02);
      box-shadow: 0 6px 20px rgba(255, 107, 157, 0.5);
    }
    .emoji { font-size: 2.5rem; margin-bottom: 0.5rem; }
    .error-list { color: #c00; font-size: 0.85rem; text-align: left; margin-bottom: 1rem; }
  </style>
</head>
<body>
  <div class="card">
    <div class="emoji">💕</div>
    <h1>Create your Valentine card</h1>
    <p class="sub">Enter your name and your love's name — we'll make a special link for you.</p>

    @if($errors->any())
      <ul class="error-list">
        @foreach($errors->all() as $err)
          <li>{{ $err }}</li>
        @endforeach
      </ul>
    @endif

    <form action="{{ route('valentine.create') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="your_name">Your name</label>
        <input type="text" id="your_name" name="your_name" value="{{ old('your_name') }}" placeholder="e.g. Ankit" required autofocus>
      </div>
      <div class="form-group">
        <label for="love_name">Your love's name</label>
        <input type="text" id="love_name" name="love_name" value="{{ old('love_name') }}" placeholder="e.g. Pooja" required>
      </div>
      <button type="submit" class="btn">Create my Valentine card 💖</button>
    </form>
  </div>
</body>
</html>
