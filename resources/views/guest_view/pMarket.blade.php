@extends('guest_view.pageLayout')


@section('content')

    <div class="container market-wrapper">
        
        
        <div class="market-back"><a href="">BACK TO FISH RESULT</a></div>
            

        <div class="market-show">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Detail Market</th>
                </tr>
                </thead>
                <tbody>
                    <?php $i=1;?>
                    @foreach($list as $mar)
                <tr>
                    <th scope="row">{{$i}}</th>
                    <td>{{$mar->market_name}}</td>
                    <td>{{$mar->market_address}}</td>
                    <td><a href=""><div class="search-btn"><button class="btn ">DETAIL</button></div></a></td>
                </tr>
                <?php $i++; ?>
                @endforeach
                

                </tbody>
            </table>
            
        </div>

    </div>


@endsection