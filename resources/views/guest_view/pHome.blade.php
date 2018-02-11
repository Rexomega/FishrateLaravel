@extends('guest_view.pageLayout')


@section('content')

	<form action="{{url('fish')}}" method="get">
        <div class="search-wrapper">
			
            <div class="search-title">SEARCH FISH</div>
            <div class="search-area">
                <input type="text" name="cari">
            </div>

            <div class="search-btn">
                <button class="btn" type="submit"> SEARCH</button>
            </div>

        </div>
	</form>	

@endsection