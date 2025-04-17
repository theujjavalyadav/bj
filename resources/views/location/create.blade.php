@extends('template.theme')
@section('contents')

<body>
    <div class="container">
        <h1>Location Form</h1>
        <form action="{{ route('location.store') }}" method="POST">


            @csrf
            
            <label for="business_id">Business ID</label>
            <input type="text" id="business_id" name="business_id" >
            <span class="error">@error('business_id'){{$message}}@enderror</span>

            <label for="address">Address</label>
            <input type="text" id="address" name="address" >
            <span class="error">@error('address'){{$message}}@enderror</span>

            <label for="city">City</label>
            <input type="text" id="city" name="city" >
            <span class="error">@error('address'){{$message}}@enderror</span>

            <label for="state">State</label>
            <input type="text" id="state" name="state" >
            <span class="error">@error('state'){{$message}}@enderror</span>

            <label for="zip_code">ZIP Code</label>
            <input type="text" id="zip_code" name="zip_code" >
            <span class="error">@error('zip_code'){{$message}}@enderror</span>

            <label for="country">Country</label>
            <input type="text" id="country" name="country" >
            <span class="error">@error('country'){{$message}}@enderror</span>
            
            <button class="btn btn-primary">Submit</button>
            <a href="showLocation" class="btn btn-secondary">Cancel</a>
        
        </form>
    </div>
</body>

@endsection