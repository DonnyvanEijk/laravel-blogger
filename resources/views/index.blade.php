<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DonBlog</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  </head>
  <body class="container">
  <header class="d-flex flex-wrap justify-content-between align-items-center py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 text-dark text-decoration-none">
    <svg class="bi me-2" width="40" height="32" aria-hidden="true"><use xlink:href="#bootstrap"></use></svg>
    <span class="fs-4">DonBlog</span>
    </a>

    <ul class="nav nav-pills">
    <li class="nav-item"><a href="/" class="nav-link active" aria-current="page">Home</a></li>
    <li class="nav-item"><a href="/about" class="nav-link">About</a></li>
    <li class="nav-item"><a href="/contact" class="nav-link">Contact</a></li>
    </ul>
  </header>

  <div class="row">
    <div class="col-md-8 mx-auto">
      <div class="card shadow-sm mb-4">
        <div class="card-body">
          <h1 class="card-title text-center">Make a Post</h1>
          <p class="card-text text-center">Place and read posts here! When posting a google warning will appear, click "still send" once and refresh</p>
          <form action="{{ route('store') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter name here or remain blank for an anonymous post">
              <div id="nameDesc" class="form-text">Fill in the name of your post!</div>
            </div>
            <div class="mb-3">
              <label for="subject" class="form-label">Post Subject</label>
              <input type="text" class="form-control" id="subject" name="subject" placeholder="Cool subject name here">
              <div id="subDesc" class="form-text">Find a fitting subject for your post!</div>
            </div>
            <div class="mb-3">
              <label for="message" class="form-label">Message</label>
              <textarea class="form-control" id="message" name="message" rows="3" placeholder="Enter your message"></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <h2 class="text-center mb-4">Latest Messages</h2>
    @if(count($posts))
    @foreach ($posts as $post)
      <div class="col-md-4 mb-4">
        <div class="card shadow-sm h-100">
          <div class="card-body">
            <h5 class="card-title">{{ $post->subject }}</h5>
            <p class="card-text"><strong>Name:</strong> {{ $post->name }}</p>
            <p class="card-text">
              {!! preg_replace('/(https?:\/\/[^\s]+)/', '<a href="$1" target="_blank" rel="noopener noreferrer">$1</a>', e($post->message)) !!}
            </p></p>
            <p class="card-text text-muted"><small>{{ $post->created_at }}</small></p>
          </div>
        </div>
      </div>
    @endforeach
    @else
    <p class="text-center">There are no new messages! :(</p>
    @endif
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.min.js" integrity="sha384-VQqxDN0EQCkWoxt/0vsQvZswzTHUVOImccYmSyhJTp7kGtPed0Qcx8rK9h9YEgx+" crossorigin="anonymous"></script>
  </body>
</html>
