@extends('layouts.main')

@section('main')
    <h1>{{ __('Add Your Scarf') }}</h1>

    <form class="row" action="{{ route('scarves.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <h2 class="mt-5">{{ __('Base') }}</h2>
		<div class="col-12 col-md-6">
			<label class="col-form-label" for="color-scheme">{{ __('Color Scheme') }}*</label>
			<input class="form-control" id="color-scheme" type="text" name="color_scheme" placeholder="{{ __('Color or pattern') }}" value="{{ old('color_scheme') }}" required>
		</div>
		<div class="col-12 col-md-6">
			<label class="col-form-label" for="color-scheme-right" data-bs-toggle="tooltip">{{ __('Color Scheme Right') }}</label>
			<input class="form-control" id="color-scheme-right" type="text" name="color_scheme_right" placeholder="{{ __('Color or pattern') }}" value="{{ old('color_scheme_right') }}">
		</div>
		
        <h2 class="mt-5">{{ __('Edge from outer to inner') }}</h2>
		<div class="accordion accordion-flush" id="add-scarf-form">
			@for ($i = 1; $i <= Scarf::MAX_EDGES_PER_SCARF; $i++)
				<div class="accordion-item">
					<h2 class="accordion-header" id="headingOne">
						<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#edge{{ $i }}" aria-expanded="false" aria-controls="edge{{ $i }}">
							{{ __('Edge') }} {{ $i }}
						</button>
					</h2>
					<div id="edge{{ $i }}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#add-scarf-form">
						<div class="accordion-body row">
							<div class="col-12 col-md-4">
								<label class="col-form-label" for="edge-size{{ $i }}">{{ __('Edge Size') }}</label>
								<input class="form-control" id="edge-size{{ $i }}" type="text" name="edge_size{{ $i }}" placeholder="{{ __('In millimeters') }}" value="{{ old('edge_size' . $i) }}">
							</div>
							<div class="col-12 col-md-4">
								<label class="col-form-label" for="edge-color-scheme{{ $i }}">{{ __('Edge Color Scheme') }}</label>
								<input class="form-control" id="edge-color-scheme{{ $i }}" type="text" name="edge_color_scheme{{ $i }}" placeholder="{{ __('Color or pattern') }}" value="{{ old('edge_color_scheme' . $i) }}">
							</div>
							<div class="col-12 col-md-4">
								<label class="col-form-label" for="edge-color-scheme-right{{ $i }}">{{ __('Edge Color Scheme Right') }}</label>
								<input class="form-control" id="edge-color-scheme-right{{ $i }}" type="text" name="edge_color_scheme_right{{ $i }}" placeholder="{{ __('Color or pattern') }}" value="{{ old('edge_color_scheme_right' . $i) }}">
							</div>
						</div>
					</div>
				</div>
			@endfor
		</div>

        <div class="clearfix"></div>

        <h2 class="mt-5">{{ __('Badge') }}</h2>
		<span class="text-muted">{{ __('Optimal dimensions') }}: 250*250px</span>
		<div class="col-12">
			<input class="form-control" type="file" name="image">
		</div>

        <div class="clearfix"></div>

        <h2 class="mt-5">{{ __('Text') }}</h2>
		<div class="col-12 col-md-4">
			<label class="col-form-label" for="text">{{ __('Text') }}</label>
			<input class="form-control" id="text" type="text" name="text" placeholder="" value="{{ old('text') }}">
		</div>
		<div class="col-12 col-md-4">
			<label class="col-form-label" for="text-color">{{ __('Text Color') }}</label>
			<input class="form-control" id="text-color" type="text" name="text_color" placeholder="" value="{{ old('text_color') }}">
		</div>
		<div class="col-12 col-md-4">
			<label class="col-form-label" for="text-font">{{ __('Text Font') }}</label>
			<input class="form-control" id="text-font" type="text" name="text_font" placeholder="" value="{{ old('text_font') }}">
		</div>

        <div class="clearfix"></div>

        <button class="btn btn-primary m-3" type="submit">{{ __('Add') }}</button>
    </form>
@endsection
