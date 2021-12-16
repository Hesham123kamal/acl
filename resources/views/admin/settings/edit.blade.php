@extends('layouts.admin.app')

@section('content')

    @if (auth()->user()->hasPermission('read_settings'))
        <div>
            <a href = "{{ route('admin.settings.display') }}" class = "btn btn-info" >@lang('settings.show_settings')</a>
        </div>
    @endif

    <!-- Start Edit Profile Attributes Form -->

    <div class="container mt-4">
        <div class="card">
            <div class="card-header text-center font-weight-bold">
                <h2>@lang('settings.edit_profile_attributes')</h2>
            </div>
            <div class="card-body">
                <form name="EditProfileAttributesForm" id="EditProfileAttributesForm" method="post" action="{{ route('admin.settings.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="username">@lang('settings.username')</label>
                        <input type="text" id="username" name="username" class="form-control" value = "{{  $username_percentage_value }}" >
                    </div>
                    <div class="form-group">
                        <label for="email">@lang('settings.email')</label>
                        <input type="text" id="email" name="email" class="form-control" value = "{{ $email_percentage_value }}" >
                    </div>
                    <div class="form-group">
                        <label for="gender">@lang('settings.gender')</label>
                        <input type="text" id="gender" name="gender" class="form-control" value = "{{ $gender_percentage_value }}" >
                    </div>
                    <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <!-- End Edit Profile Attributes Form -->




@endsection

