 @if (session()->has('success'))
     <div class="alert alert-success m-3">
         {{ session()->get('success') }}
     </div>
 @endif
 <div class="latest-products">
     <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <div class="section-heading">
                     <h2>Latest Products</h2>
                     {{-- search product --}}
                     <form action="{{ route('search') }}" method="GET" class="form-inline mb-2">
                         @csrf
                         <input type="search" class="form-control" name="search" placeholder="Search Item">
                         <button type="submit" class="btn btn-primary ml-2 text-black">Search item</button>
                     </form>
                 </div>
             </div>
             @foreach ($product as $list)
                 <div class="col-md-4">
                     <div class="product-item">
                         <a href="#"><img src="{{ asset('image/' . $list->image) }}" class="w-100"
                                 height="300px" alt=""></a>
                         <div class="down-content">
                             <a href="#">
                                 <h4>{{ $list->name }}</h4>
                             </a>
                             <h6>{{ $list->price }} Kyats</h6>
                             <p>{{ $list->description }}</p>
                             <form action="{{ route('add-card', $list->id) }}" method="POST">
                                 @csrf
                                 <input type="number" value="1" min="1" name="quantity"
                                     class="form-control">
                                 <button type="submit" class="btn btn-success  mt-1">Add Card</button>
                             </form>
                         </div>
                     </div>
                 </div>
             @endforeach
             <div>{{ $product->links() }}</div>
         </div>
     </div>
 </div>
