@extends('layouts.admin.app')

@section('content')

    <div>
        <h2>@lang('roles.roles')</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">@lang('site.home')</a></li>
        <li class="breadcrumb-item">@lang('roles.roles')</li>
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <div class="row mb-2">

                    <div class="col-md-12">

                        @if (auth()->user()->hasPermission('create_roles'))
                            <a href="{{ route('admin.roles.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.create')</a>
                        @else
                            <button class="btn btn-primary disabled"><i class="fa fa-plus"></i> @lang('site.create')</button>

                        @endif

{{--                        @if (auth()->user()->hasPermission('delete_roles'))--}}
{{--                            <form method="post" action="{{ route('admin.roles.bulk_delete') }}" style="display: inline-block;">--}}
{{--                                @csrf--}}
{{--                                @method('delete')--}}
{{--                                <input type="hidden" name="record_ids" id="record-ids">--}}
{{--                                <button type="submit" class="btn btn-danger" id="bulk-delete" disabled="true"><i class="fa fa-trash"></i> @lang('site.bulk_delete')</button>--}}
{{--                            </form><!-- end of form -->--}}
{{--                        @endif--}}

                    </div>

                </div><!-- end of row -->

{{--                <div class="row">--}}

{{--                    <div class="col-md-6">--}}
{{--                        <div class="form-group">--}}
{{--                            <input type="text" id="data-table-search" class="form-control" autofocus placeholder="@lang('site.search')">--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div><!-- end of row -->--}}

                <div class="row">

                    <div class="col-md-12">

                        <div class="table-responsive">

                            <table class="table datatable" id="roles-table" style="width: 100%;">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('roles.name')</th>
{{--                                    <th>@lang('roles.admins_count')</th>--}}
{{--                                    <th>@lang('site.created_at')</th>--}}
                                    <th>@lang('site.action')</th>
                                </tr>
                                </thead>
                                <tbody>
                                     @foreach($roles as $index => $role)
                                             <tr>
                                                 <td>{{ $index + 1  }}</td>
                                                 <td> {{ $role->name   }} </td>
                                                 <td>

                                                     @if (auth()->user()->hasPermission('update_roles'))
                                                         <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                                     @else
                                                         <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                                     @endif

                                                         @if (auth()->user()->hasPermission('delete_roles'))
                                                             <form action="{{ route('admin.roles.destroy', $role->id) }}" method="post" style="display: inline-block">
                                                                 {{ csrf_field() }}
                                                                 {{ method_field('delete') }}
                                                                 <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                                             </form><!-- end of form -->
                                                         @else
                                                             <a href="#" class="btn btn-danger btn-sm disabled"><i class="fa fa-edit"></i> @lang('site.delete')</a>

                                                         @endif
                                                 </td>
                                             </tr>
                                         @endforeach
                                </tbody>
                            </table>

                        </div><!-- end of table responsive -->

                    </div><!-- end of col -->

                </div><!-- end of row -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection

{{--custom--}}

@push('scripts')

{{--    <script>--}}

{{--        let rolesTable = $('#roles-table').DataTable({--}}
{{--            dom: "tiplr",--}}
{{--            serverSide: true,--}}
{{--            processing: true,--}}
{{--            --}}{{--"language": {--}}
{{--            --}}{{--    "url": "{{ asset('admin_assets/datatable-lang/ar.json') }}"--}}
{{--            --}}{{--},--}}
{{--            ajax: {--}}
{{--                url: '{{ route('admin.roles.data') }}',--}}
{{--            },--}}
{{--            columns: [--}}
{{--                {data: 'record_select', name: 'record_select', searchable: false, sortable: false, width: '1%'},--}}
{{--                {data: 'name', name: 'name'},--}}
{{--                {data: 'users_count', name: 'users_count', searchable: false},--}}
{{--                {data: 'created_at', name: 'created_at', searchable: false},--}}
{{--                {data: 'actions', name: 'actions', searchable: false, sortable: false, width: '20%'},--}}
{{--            ],--}}
{{--            order: [[3, 'desc']],--}}
{{--            drawCallback: function (settings) {--}}
{{--                $('.record__select').prop('checked', false);--}}
{{--                $('#record__select-all').prop('checked', false);--}}
{{--                $('#record-ids').val();--}}
{{--                $('#bulk-delete').attr('disabled', true);--}}
{{--            }--}}
{{--        });--}}

{{--        $('#data-table-search').keyup(function () {--}}
{{--            rolesTable.search(this.value).draw();--}}
{{--        })--}}
{{--    </script>--}}

@endpush
