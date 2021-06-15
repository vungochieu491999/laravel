
@extends('Admin::layouts.default')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> {{ trans('admin_general.post') }} </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"> {{ trans('admin_general.dashboard') }} </a></li>
                        <li class="breadcrumb-item active"> {{ trans('admin_general.post') }} </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">

                <h3 class="card-title"> {{ trans('admin_general.post') }} &ensp;
                    <a data-toggle="tooltip" data-placement="top" title="" class="btn btn-primary btn-sm mr-3" href="{{ route('admin.posts-add') }}" data-original-title="View"> <i class="fa fa-plus"></i> {{ trans('admin_general.add_record') }}  </a>
                </h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th> {{ trans('admin_general.post_title') }} </th>
                            <th style="width: 30%"> {{ trans('admin_general.author') }} </th>
                            <th style="width: 20%"> {{ trans('admin_general.category') }} </th>
                            <th style="width: 8%" class="text-center"> {{ trans('admin_general.status') }} </th>
                            <th style="width: 20%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($posts) > 0)
                            @foreach ($posts as $post)
                                <tr id="ad_view_post_{{ $post->id }}">
                                    <td> {{ $post->title }} </td>
                                    <td>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <img alt="Avatar" class="table-avatar" src="{{ asset('bower_components/admin-lte/dist/img/avatar.png') }}">
                                            </li>
                                            <li class="list-inline-item">
                                                <p> {{ $post->user->getFullName() }} </p>
                                            </li>
                                        </ul>
                                    </td>
                                    <td> {{ $post->category->name }} </td>
                                    <td class="project-state">
                                        @if ($post->status == 'published')
                                            <span class="badge badge-success"> {{ $post->status }} </span>
                                        @elseif ($post->status == 'draft')
                                            <span class="badge badge-secondary"> {{ $post->status }} </span>
                                        @else
                                            <span class="badge badge-danger"> {{ $post->status }} </span>
                                        @endif
                                    </td>
                                    <td class="project-actions text-right">
                                        <a data-toggle="tooltip" data-placement="top" title="" class="btn btn-primary btn-sm" href="{{ route('admin.posts-view') }}" data-original-title="View"><i class="fa fa-eye"></i></a>
                                        <a data-toggle="tooltip" data-placement="top" title="" class="btn btn-info btn-sm" href="{{ route('admin.posts-edit', ['slug' => $post->slug]) }}" data-original-title="Edit"><i class="fa fa-pencil-alt"></i></a>
                                        <a data-toggle="tooltip" data-placement="top" title="" class="btn btn-danger btn-sm" href="{{ route('admin.posts-delete', ['slug' => $post->slug]) }}" data-original-title="Delete"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            No Data Found!
                        @endif
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
@endsection

@section('scripts')
    <script src="{{asset('js/dashboard.js')}}"></script>
@endsection
