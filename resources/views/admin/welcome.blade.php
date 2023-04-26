@php
    use App\classes\Text;
@endphp

@extends('layout.app')
@section('content')
    <div class="pd-ltr-20">
        <div class="card-box pd-20 height-100-p mb-30">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <img src="{{ asset('admin/vendors/images/banner-img.png') }}" alt="">
                </div>
                <div class="col-md-8">
                    <h4 class="font-20 weight-500 mb-10 text-capitalize">
                        Welcome back <div class="weight-600 font-30 text-blue" style="color:#d88c3c">{{ Auth::user()->firstName }}
                            {{ Auth::user()->lastName }}</div>
                    </h4>
                    <p class="font-18 max-width-600">This is the administration dashboard for our website</p>
                </div>
            </div>
        </div>
        <div class="row" >
            <div class="col-xl-4 mb-30" >
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center">
                        {{--  <div class="progress-data">
                            <div id="chart"></div>
                        </div>  --}}
                        <div class="widget-data">
                            <div class="h4 mb-0">{{ $projectNbre }}</div>
                            <div class="weight-600 font-14">project</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center">
                        {{--  <div class="progress-data">
                            <div id="chart2"></div>
                        </div>  --}}
                        <div class="widget-data">
                            <div class="h4 mb-0">{{ $contactNbre }}</div>
                            <div class="weight-600 font-14">Contacts</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center">
                        {{--  <div class="progress-data">
                            <div id="chart3"></div>
                        </div>  --}}
                        <div class="widget-data">
                            <div class="h4 mb-0">{{ $userNbre }}</div>
                            <div class="weight-600 font-14">Users</div>
                        </div>
                    </div>
                </div>
            </div>
            {{--  <div class="col-xl-3 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="progress-data">
                            <div id="chart4"></div>
                        </div>
                        <div class="widget-data">
                            <div class="h4 mb-0">3</div>
                            <div class="weight-600 font-14">New</div>
                        </div>
                    </div>
                </div>
            </div>  --}}
        </div>

        <div class="card-box mb-30">
            <h2 class="h4 pd-20">Recent Project</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th >Project</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Description</th>
                        <th >Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($project as $item)
                        <tr>
                            <td >
                                @foreach ($item->photos->where('principale', 1) as $img)
                                    <img src="{{ asset('storage/' . $img->url) }}" alt="" width="70"
                                        height="70">
                                @endforeach
                            </td>
                            <td>
                                {{ $item->title }}
                            </td>
                            <td>{{ $item->created_at->format('Y-m-d') }}</td>
                            <td>{{ Text::Extrait($item->description, 20) }}</td>
                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                        href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                        <a class="dropdown-item" href="{{ route('admin.project.show', ['id' => $item->id]) }}"><i class="dw dw-eye"></i> View</a>
                                        <a class="dropdown-item" href="{{ route('admin.project.delete',['id'=>$item->id]) }}"><i class="dw dw-delete-3"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="footer-wrap pd-20 mb-20 card-box">
            &copy; Copyright <strong><span>Dream Design And Construction</span></strong>. All Rights Reserved
        </div>
    </div>
@endsection
