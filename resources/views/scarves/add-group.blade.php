@extends('layouts.main')

@section('title', __('Add Scouting Group to Scarf') . ' - ')

@section('main')
    <h1>{{ __('Add Scouting Group to Scarf') }}</h1>
    @include('components.scarf-card')

    <form class="row" action="{{ route('scarves.add-group', ['scarf' => $scarf]) }}" method="POST">
        @csrf

		<div class="col-12 col-md-6">
			<label class="col-form-label" for="scout-group">{{ __('Scout Group') }}*</label>
            <select class="form-select" id="scout-group" name="scout_group" required>
                @foreach ($scoutGroups as $group)
                    <option value="{{ $group->id }}"{{ old('scout_group') ? ' selected' : '' }}>{{ __(ucfirst($group->name)) }}</option>
                @endforeach
            </select>
		</div>
		<div class="col-12 col-md-6">
			<label class="col-form-label" for="use-type">{{ __('Use type') }}*</label>
            <select class="form-select" id="use-type" name="use_type" required>
                @foreach (ScarfUsageType::TYPES as $type)
                    <option value="{{ $type }}"{{ old('use_type') ? ' selected' : '' }}>{{ __(ucfirst($type)) }}</option>
                @endforeach
            </select>
		</div>

        <h2 class="mt-5">{{ __('Dates') }}</h2>
		<div class="col-12 col-md-6">
			<label class="col-form-label" for="introduced-on">{{ __('Introduced on') }}*</label>
			<input class="form-control" id="introduced-on" type="date" name="introduced_on" placeholder="" value="{{ old('introduced_on') }}" required>
		</div>
		<div class="col-12 col-md-6">
			<label class="col-form-label" for="used-until">{{ __('Used Until') }}</label>
			<input class="form-control" id="used-until" type="date" name="used_until" placeholder="" value="{{ old('used_until') }}">
		</div>

        <div class="clearfix"></div>

        <div class="col-12">
            <button class="btn btn-primary my-3" type="submit">{{ __('Add') }}</button>
        </div>
    </form>
@endsection
