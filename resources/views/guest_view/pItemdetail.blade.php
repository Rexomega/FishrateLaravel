@extends('guest_view.pageLayout')


@section('content')

    <div class=" container detail-wrapper">

        <div class="market-back"><a href="">BACK TO MARKET RESULT</a></div>
        <div class="market-name">{{$data->market_name}}</div>
        <div class="market-address">{{$data->market_address}}</div>

        <div class="market-detail-fish">

            <div class="row">
                <div class="col-sm-8">
                    MARKETED FISH
                    <div class="row">
                        @foreach($list as $f)
                        <div class="col-sm-3">
                            <div class="fish-box">
                                <div class="fish-box-img "><img src={{asset('img/fish/'.$f->fish->fish_photo)}} alt=""></div>
                                <div class="fish-desc">
                                    <div class="fish-name">{{$f->fish->fish_name}}</div>
                                    <div class="fish-range-price">PRICE RANGE 30 000 - 50 000</div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                            <!--FISH-->
                    </div>

                </div>

                <div class="col-sm-4">
                    <?php Fungsi::google_map(450,400,$data->market_address)?>
                </div>
            </div>
        </div>


    </div>


@endsection