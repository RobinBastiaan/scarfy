@extends('layouts.main')

@section('title', __('Add Scouting Group to Scarf') . ' - ')

@section('main')
    <h1>{{ __('Add Scouting Group to Scarf') }}</h1>
    <div class="d-flex justify-content-center">
        <div class="col-12 col-sm-6 col-md-4">
            @include('components.scarf-card')
        </div>
    </div>

    <form class="row" action="{{ route('scarves.store-add-group', ['scarf' => $scarf]) }}" method="POST">
        @csrf

        <div class="col-12 col-md-6">
            <label class="col-form-label" for="scout-group">{{ __('Scout Group') }}*</label>
            <select class="form-select" id="scout-group" name="scout_group_id" required>
                @foreach ($scoutGroups as $group)
                    <option value="{{ $group->id }}"{{ old('scout_group_id') ? ' selected' : '' }}>{{ __(ucfirst($group->name)) }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-12 col-md-6">
            <label class="col-form-label" for="use-type">{{ __('Use type') }}*</label>
            <select class="form-select" id="use-type" name="scarf_usage_type_id" required>
                @foreach (ScarfUsageType::TYPES as $id => $type)
                    <option value="{{ $id+1 }}"{{ old('scarf_usage_type_id') ? ' selected' : '' }}>{{ __(ucfirst($type)) . Str::lower(__('Scarf')) }}</option>
                @endforeach
            </select>
        </div>

        <h2 class="mt-5">{{ __('Dates') }}</h2>
        <div class="col-12 col-md-6">
            <i class="fa fa-plus"></i>
            <label class="col-form-label" for="introduced-on">{{ __('Introduced on') }}*</label>
            <input class="form-control" id="introduced-on" type="date" name="introduced_on" placeholder="" value="{{ old('introduced_on') }}" required>
        </div>
        <div class="col-12 col-md-6">
            <i class="fa fa-times"></i>
            <label class="col-form-label" for="used-until">{{ __('Used Until') }}</label>
            <input class="form-control" id="used-until" type="date" name="used_until" placeholder="" value="{{ old('used_until') }}">
        </div>

        <div class="clearfix"></div>

        <div class="col-12">
            <button class="btn btn-primary my-3" type="submit">{{ __('Add') }}</button>
        </div>
    </form>
@endsection
