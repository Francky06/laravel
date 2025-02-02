<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <title>LaraShop</title>

    @yield('extra-meta')
    
    
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{asset('../resources/css/app.css')}}">
  
  </head>
  <body>
    
<div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
        @include('partials.search')
      </div>
      <div class="col-4 text-center d-flex justify-content-around">
        <a class="blog-header-logo text-dark" href="{{ route('homes')}} ">Accueil</a>
        <a class="blog-header-logo text-dark" href="{{ route('shop')}} ">Shop</a>
        <a class="blog-header-logo text-dark" href="{{ route('home')}} ">Profil</a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        
        @include('partials.auth')
      </div>
    </div>
  </header>

  <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between"> 
        @foreach ( App\Category::all() as $category )
          <a class="p-2 link-secondary" href="{{route('shop', ['categorie' => $category->slug])}}">{{$category->name}}</a>
        @endforeach
      <a class="p-2 link-success" href="{{route('panier')}}">PANIER <span class="badge bg-success"> {{Cart::count()}}</span></a>
    </nav>
  </div>

  @if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
  @endif

  @if(session('danger'))
    <div class="alert alert-danger">
        {{session('danger')}}
    </div>
  @endif

  @if (count($errors)>0)
    <div class="alert alert-danger">
      
        @foreach ($errors->all() as $error )
          <div>{{ $error }}</div>    
        @endforeach
      
    </div>
    
  @endif

</div>

<main class="container">
    @yield('hero')
  </div>

  <div class="text-center">
  @if (request()->input('q'))
    <h6>{{ $products->total()}} résultats pour la recherche "{{ request()->q}}" </h6>
  @endif
</div>
<br>
  <div class="row mb-2">
    @yield('content')
  </div>

  </main>
  @yield('extra-script')
  @yield('paiement')
       
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
        
        
        
  </body>
</html>
