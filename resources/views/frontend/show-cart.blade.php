<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
          rel="stylesheet">

    <title>Sixteen Clothing HTML Template</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-sixteen.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>

<body>

<!-- ***** Preloader Start ***** -->
<div id="preloader">
    <div class="jumper">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<!-- ***** Preloader End ***** -->

<!-- Header -->
@include('frontend.header')


<!-- ***** Breadcrumb Area Start ***** -->
{{-- session message --}}

<div style="padding: 100px">
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <form action="{{ route('order') }}" method="POST">
                        @csrf
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($cart as $item)
                                <tr>
                                    <td>
                                        <label>
                                            <input type="text" name="productname[]"
                                                   value="{{ $item->product_title }}" hidden>
                                        </label>
                                        {{ $item->product_title }}
                                    </td>
                                    <td>
                                        <label>
                                            <input type="text" name="price[]" value="{{ $item->price }}"
                                                   hidden>
                                        </label>
                                        {{ $item->price }}
                                    </td>
                                    <td>
                                        <label>
                                            <input type="text" name="quantity[]" value="{{ $item->quantity }}"
                                                   hidden>
                                        </label>
                                        {{ $item->quantity }}
                                    </td>
                                    <td>
                                        {{-- delete button --}}

                                        <a href="{{ route('cart-delete', $item->id) }}" class=""><i
                                                class="fas fa-trash-alt text-danger mr-1"></i>Remove</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                        <button type="submit" class="btn btn-dark">Confirm Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Bootstrap core JavaScript -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


<!-- Additional Scripts -->
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script src="{{ asset('assets/js/owl.js') }}"></script>
<script src="{{ asset('assets/js/slick.js') }}"></script>
<script src="{{ asset('assets/js/isotope.js') }}"></script>
<script src="{{ asset('assets/js/accordions.js') }}"></script>


<script language="text/Javascript">
    cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
    function clearField(t) { //declaring the array outside of the
        if (!cleared[t.id]) { // function makes it static and global
            cleared[t.id] = 1; // you could use true and false, but that's more typing
            t.value = ''; // with more chance of typos
            t.style.color = '#fff';
        }
    }
</script>


</body>

</html>
