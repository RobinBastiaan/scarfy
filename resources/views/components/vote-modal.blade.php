{{-- Vote Modal including the button, with form to explain why the record is wrong --}}
@php $uniqId = uniqid('vote-modal_') @endphp

<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#{{ $uniqId }}">
    <i class="fa fa-thumbs-down"></i> {{ __('Looks Wrong') }}
</button>

<div class="modal fade" id="{{ $uniqId }}" tabindex="-1" aria-labelledby="{{ $uniqId }}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="{{ $uniqId }}Label">{{ __('What is wrong with this :type?', ['type' => __($type)]) }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mb-3">
                <label for="description" class="form-label required">{{ __('Description') }}</label>
                <textarea id="description" class="form-control" name="description" rows="3" required></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Save') }}</button>
                <button type="submit" class="btn btn-primary">{{ __('Tell us') }}</button>
            </div>
        </div>
    </div>
</div>
