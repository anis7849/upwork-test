<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://fontawesome.com/v4.7.0/assets/font-awesome/css/font-awesome.css">


    <div class="container">
        <div class="row">
            <aside class="col-md-3">

                <div class="card">
                    <article class="filter-group">
                        <header class="card-header">
                            <a href="#" data-toggle="collapse" data-target="#collapse_1" aria-expanded="true"
                                class="">
                                <i class="icon-control fa fa-chevron-down"></i>
                                <h6 class="title">Filters</h6>
                            </a>
                        </header>
                        <div class="filter-content collapse show" id="collapse_1" style="">
                            <div class="card-body">
                                <form class="pb-3" action="/products" method="GET">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="search" placeholder="Search"
                                            value="{{ app('request')->input('search') }}">

                                    </div>

                                    <select class="form-control mt-3" name="author" id="author_id">
                                        <option value="">Select Author</option>
                                        @foreach ($authors as $author)
                                            <option value="{{ $author->id }}"
                                                @if (app('request')->input('author') == $author->id) {{ 'selected' }} @endif>
                                                {{ $author->name }}</option>
                                        @endforeach
                                    </select>

                                    <input type="date" class="form-control mt-3" name="date"
                                        value="{{ app('request')->input('date') }}"></input>
                                    <button class="btn btn-block btn-primary mt-3">Search</button>
                                </form>

                            </div> <!-- card-body.// -->
                        </div>
                    </article> <!-- filter-group  .// -->

                </div> <!-- card.// -->

            </aside>
            <main class="col-md-9">

                <header class="border-bottom mb-4 pb-3">
                    <div class="form-inline">
                        <span class="mr-md-auto">{{ $products->count() }} Items found </span>
                        <a  href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                    <div style="float:right;">



                    </div>
                </header><!-- sect-heading -->

                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-md-4">
                            <figure class="card card-product-grid">
                                <div class="img-wrap text-center">
                                    <img src="{{ asset('/assets/images/sample.webp') }}"
                                        style="height:200px;width:200px;">
                                </div> <!-- img-wrap.// -->
                                <figcaption class="info-wrap">
                                    <div class="fix-height">
                                        <h3 class="title mt-2 text-center">{{ $product->name }}</h3>
                                        <div class="mt-2 p-3">
                                            <p class="title ">Author : {{ $product->authors->name }}</p>
                                            <p class="title ">Date :
                                                {{ \Carbon\Carbon::parse($product->created_at)->format('d/m/Y') }}
                                            </p>
                                        </div>
                                        <div class="price-wrap mt-2 p-3">
                                            @php echo substr($product->description,0,100); @endphp ...
                                        </div> <!-- price-wrap.// -->
                                    </div>
                                </figcaption>
                            </figure>
                        </div> <!-- col.// -->
                    @endforeach


                </div> <!-- row end.// -->


            </main>
        </div>
    </div>
</body>

</html>
