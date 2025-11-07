{{-- resources/views/request.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Request</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(180deg, #f3e9fa 0%, #e8d7fa 100%);
      font-family: 'Inter', sans-serif;
      margin: 0;
      padding-bottom: 90px;
    }

    /* HEADER */
    .header {
      background-color: #cbb2e3;
      display: flex;
      align-items: center;
      justify-content: center;
      position: sticky;
      top: 0;
      width: 100%;
      z-index: 10;
      padding: 1rem;
    }

    .header h4 {
      color: #fff;
      font-weight: 700;
      margin: 0;
      text-align: center;
    }

    .back-arrow {
      position: absolute;
      left: 1rem;
      top: 50%;
      transform: translateY(-50%);
      color: #fff;
      font-size: 1.5rem;
      text-decoration: none;
      transition: 0.2s;
    }

    .back-arrow:hover {
      color: #ede4ff;
    }

    /* CARD REQUEST */
    .card-request {
      background-color: #fff;
      border-radius: 1rem;
      padding: 0.8rem 1rem;
      margin: 0.6rem 1rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
      box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    }

    .profile-info {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .profile-info img {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      object-fit: cover;
    }

    .profile-info .name {
      font-weight: 600;
      font-size: 0.95rem;
      color: #3c2a74;
    }

    .profile-info .desc {
      font-size: 0.85rem;
      color: #6b5a91;
      margin: 0;
    }

    /* BUTTONS */
    .btn-approve, .btn-reject {
      border: none;
      font-size: 0.75rem;
      padding: 0.4rem 0.8rem;
      border-radius: 0.4rem;
      color: #fff;
      transition: 0.2s;
    }

    .btn-approve {
      background-color: #7b5cb3;
    }
    .btn-approve:hover {
      background-color: #684aa3;
    }

    .btn-reject {
      background-color: #a38dc9;
    }
    .btn-reject:hover {
      background-color: #8f7abc;
    }

    .btn-group-req {
      display: flex;
      gap: 6px;
    }

    /* NAVBAR */
    .bottom-nav {
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
      background: linear-gradient(90deg, #e6d4fa 0%, #d8c2f7 100%);
      border-top-left-radius: 1rem;
      border-top-right-radius: 1rem;
      display: flex;
      justify-content: space-around;
      align-items: center;
      padding: 0.6rem 0;
      box-shadow: 0 -2px 10px rgba(0,0,0,0.05);
    }

    .bottom-nav a {
      color: #5c469c;
      text-decoration: none;
      text-align: center;
      font-size: 0.85rem;
      flex: 1;
    }

    .bottom-nav a i {
      font-size: 1.4rem;
      display: block;
    }
  </style>
</head>

<body>
  {{-- HEADER --}}
  <div class="header">
    <a href="{{ url('/connect') }}" class="back-arrow">
      <i class="bi bi-arrow-left"></i>
    </a>
    <h4>Request</h4>
  </div>

  {{-- LIST REQUEST --}}
  <div class="mt-3 mb-5">
    <div class="card-request">
      <div class="profile-info">
        <img src="https://api.dicebear.com/9.x/adventurer/svg?seed=Rusdi" alt="Rusdi">
        <div>
          <div class="name">Rusdi</div>
          <p class="desc mb-0">Charismatic and confident, a true trendsetter on and off stage.</p>
        </div>
      </div>
      <div class="btn-group-req">
        <button class="btn btn-approve">Approve</button>
        <button class="btn btn-reject">Reject</button>
      </div>
    </div>

    <div class="card-request">
      <div class="profile-info">
        <img src="https://api.dicebear.com/9.x/adventurer/svg?seed=Ambatron" alt="Ambatron">
        <div>
          <div class="name">Ambatron</div>
          <p class="desc mb-0">Half human, half machine — always on duty, always cool.</p>
        </div>
      </div>
      <div class="btn-group-req">
        <button class="btn btn-approve">Approve</button>
        <button class="btn btn-reject">Reject</button>
      </div>
    </div>

    <div class="card-request">
      <div class="profile-info">
        <img src="https://api.dicebear.com/9.x/adventurer/svg?seed=Andriana" alt="Andriana">
        <div>
          <div class="name">Andriana</div>
          <p class="desc mb-0">Chill and charming, the heart of the group.</p>
        </div>
      </div>
      <div class="btn-group-req">
        <button class="btn btn-approve">Approve</button>
        <button class="btn btn-reject">Reject</button>
      </div>
    </div>

    <div class="card-request">
      <div class="profile-info">
        <img src="https://api.dicebear.com/9.x/adventurer/svg?seed=FuadGoldenPharaoh" alt="Fuad Golden Pharaoh">
        <div>
          <div class="name">Fuad Golden Pharaoh</div>
          <p class="desc mb-0">Regal and radiant, unforgettable golden charisma.</p>
        </div>
      </div>
      <div class="btn-group-req">
        <button class="btn btn-approve">Approve</button>
        <button class="btn btn-reject">Reject</button>
      </div>
    </div>

    <div class="card-request">
      <div class="profile-info">
        <img src="https://api.dicebear.com/9.x/adventurer/svg?seed=SiImut" alt="Si Imut">
        <div>
          <div class="name">Si Imut</div>
          <p class="desc mb-0">Smile master with contagious happiness energy.</p>
        </div>
      </div>
      <div class="btn-group-req">
        <button class="btn btn-approve">Approve</button>
        <button class="btn btn-reject">Reject</button>
      </div>
    </div>
  </div>

  {{-- BOTTOM NAVBAR --}}
  <div class="bottom-nav">
    <a href="#"><i class="bi bi-house"></i>Home</a>
    <a href="#"><i class="bi bi-heart"></i>Favorites</a>
    <a href="#"><i class="bi bi-chat-dots"></i>Chat</a>
    <a href="#"><i class="bi bi-person"></i>Profile</a>
  </div>

</body>
</html>
