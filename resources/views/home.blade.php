@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">Products</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
						@foreach($plans as $plan)
						  <div class="col-sm-6" style="margin-top:10px">
							<div class="card">
							  <div class="card-body">
								<h5 class="card-title">{{ $plan->name }}</h5>
								<p class="card-text">Rs.{{ number_format($plan->cost, 2) }} monthly</p>
								<p class="card-text"><h5>{{ $plan->description }}</h5></p>
								<a href="{{ route('subscription.show', $plan->id) }}" class="btn btn-primary">Buy Now</a>
							  </div>
							</div>
						  </div>
						@endforeach
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection