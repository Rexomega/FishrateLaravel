@extends('guest_view.pageLayout')


@section('content')

    <div class="container market-wrapper">
        
        <div class="report-form">
            <form method="POST" action="{{url('/report')}}" enctype="multipart/form-data">
             {{csrf_field()}}
              <div class="form-group">
                <label for="">PHONENUMBER</label>
                <input type="text" class="form-control">
              </div>

              <div class="form-group">
                <label>IMAGE</label>
                <input type="file" class="form-control">
              </div>

              <div class="form-group">
                <label>DESCRIPTION</label>
                <textarea class="form-control" rows="5" id="comment"></textarea>
              </div>
              
              <div class="search-btn">
                  <button type="submit" class="btn">SUBMIT</button>
              </div>
            </form>        

        </div>
    

    </div>


@endsection