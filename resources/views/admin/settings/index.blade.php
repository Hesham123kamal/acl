@extends('layouts.admin.app')

@section('content')

    <div>
        <h1>@lang('settings.profile_attributes_percentage_values')</h1>
    </div>

    <div class="row">

        <div class="col-md-12">

            <div class="table-responsive">

                <table class="table datatable" id="profile_attributes-table" style="width: 100%;">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>@lang('settings.attribute_name')</th>
                        <th>@lang('settings.percentage_value')</th>
                        <th>@lang('settings.created_at')</th>
                        <th>@lang('settings.updated_at')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($profile_attributes as $index => $profile_attribute)
                        <tr>
                            <td>{{ $index + 1  }}</td>
                            <td> {{ $profile_attribute->attribute_name  }} </td>
                            <td> {{ $profile_attribute->percentage_value . ' %' }} </td>
                            <td> {{ $profile_attribute->created_at   }} </td>
                            <td> {{ $profile_attribute->updated_at   }} </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div><!-- end of table responsive -->

        </div><!-- end of col -->

    </div><!-- end of row -->
    @if (auth()->user()->hasPermission('update_settings'))
    <div>
        <a href = "{{ route('admin.settings.display.edit') }}" class = "btn btn-info" >@lang('settings.edit_profile_attributes')</a>
    </div>
     @endif

@endsection
