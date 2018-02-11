@extends('guest_view.pageLayout')


@section('content')

    <div class=" container fish-wrapper">
        
        <form action="{{url('fish')}}" method="get">
            
       
            <div class="search-title">SEARCH FISH</div>

            <div class="search-area">
                <input type="text" name="cari">
            </div>
            <div class="search-btn">
                <button class="btn " type="submit"> SEARCH</button>
            </div>
         </form>
        <div class="fish-shop">
            <div class="row">
                @foreach($response['data'] as $f)
                <div class="col-sm-3">
                    <div class="fish-box">
                        <div class="fish-box-img b1"><img src={{asset('img/fish/'.$f['fish_photo'])}} alt=""></div>
                        <div class="fish-desc">
                            <div class="fish-name">{{$f['fish_name']}}</div>
                            <div class="fish-range-price">PRICE RANGE {{$f['base_price']}} - {{$f['range_price']}}</div>
                        </div>
                    </div>
                </div>
                

                @endforeach
            </div>

        </div>


    </div>


@endsection