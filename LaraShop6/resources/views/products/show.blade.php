@extends('layouts.master')
   
@section('content')

<main class="container">
  <div class="row mb-2">
    <div class="col-md-12">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-success">Technology</strong>
          <h4 class="mb-0">{{$product->title}}</h4>
          <div class="mb-1 text-muted">{{$product->created_at->format('d/m/y')}}</div>
          <div class="card-text mb-autoe">{{$product->description}}</div>
          <div class="card-text mb-auto"><strong>{{$product->getPrice()}}</strong></div>

          <form action="{{route('store')}}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$product->id}}">
            <input type="hidden" name="title" value="{{$product->title}}">
            <input type="hidden" name="price" value="{{$product->price}}">
            <button type="submit" class="btn btn-success">Ajouter au panier</button>

          </form>

        </div>
        <div class="col-auto d-none d-lg-block">
          <img src="{{$product->image}}" alt="ph">
        </div>
      </div>
    </div>
  </div>
  </main>

  @endsection
  