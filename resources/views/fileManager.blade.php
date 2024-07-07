<x-app-layout>
    @include('partials.pageTitle', ['title' => "File Manager", 'slug' => "File Manager"])
    <!-- Container-fluid starts-->
    <div class="container-fluid default-dashboard">
    <div class="row">
        <div class="col-xl-3 box-col-30">
            <div class="md-sidebar job-sidebar"><a class="btn btn-primary md-sidebar-toggle" href="javascript:void(0)">file filter</a>
                <div class="md-sidebar-aside custom-scrollbar">
                    <div class="file-sidebar">
                        <div class="card">
                            <div class="card-header pb-0">
                                <h4>Generate Report</h4>
                                <p class="f-m-light mt-1">Please fill this form carefully to generate a report!</p>
                            </div>
                            <div class="card-body">
                                @if(session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @endif

                                @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @endif
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                <form class="row g-3 needs-validation custom-input" action="{{ route('excel.upload') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-12">
                                        <label class="form-label" for="validationCustom01">Title</label>
                                        <input class="form-control" id="validationCustom01" name="title" type="text" placeholder="Report Title" required>
                                        <div class="invalid-feedback">Please enter your valid </div>
                                        <div class="valid-feedback">
                                        Looks's Good!</div>
                                    </div>
                                    <div class="col-12"> 
                                        <label class="form-label" for="validationTextarea">Description</label>
                                        <textarea class="form-control" id="validationTextarea" name="description" placeholder="Enter your report description"></textarea>
                                        <div class="invalid-feedback">Please enter a message in the textarea.</div>
                                    </div>
                                    <div class="col-12"> 
                                        <label class="form-label" for="formFile1">Upload Excel File</label>
                                        <input class="form-control" id="formFile1" name="file" type="file" aria-label="file example" accept=".csv,.xlsx,.xls" required>
                                        <div class="invalid-feedback">Invalid form file selected</div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary" type="submit">Generate Report</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-xl-9 col-md-12 box-col-70">
            <div class="file-content">
                <div class="card">
                <div class="card-header">
                    <div class="d-md-flex d-sm-block">
                    <form class="form-inline" action="#" method="get">
                        <div class="form-group d-flex align-items-center mb-0"><i class="fa fa-search"></i>
                        <input class="form-control-plaintext" type="text" placeholder="Search...">
                        </div>
                    </form>
                    <div class="flex-grow-1 text-end">
                        <form class="d-inline-flex" action="#" method="POST" enctype="multipart/form-data" name="myForm">
                        <div class="btn btn-primary" onclick="getFile()"> <i data-feather="plus-square"></i>Add New</div>
                        <div style="height: 0px;width: 0px; overflow:hidden;">
                            <input id="upfile" type="file" onchange="sub(this)">
                        </div>
                        </form>
                        <div class="btn btn-outline-primary ms-2"><i data-feather="upload"></i>Upload  </div>
                    </div>
                    </div>
                </div>
                <div class="card-body file-manager">
                    <h5 class="mt-4 mb-2">Reports</h5>
                    @if($reports->isEmpty())
                    <div class="alert alert-light-primary" role="alert">
                        <p class="txt-primary">No reports have been generated yet!</p>
                    </div>
                    @else
                    <ul class="folder mb-2">
                        @foreach($reports as $report)
                        <a href="/report/{{ $ }}">
                            <li class="folder-box">
                                <div class="d-block"><i class="f-44 fa fa-file-excel-o font-success"></i>
                                <div class="mt-3">  
                                    <h6>{{ $report->title }}</h6>
                                    <p>File<span class="pull-right"> <i class="fa fa-clock-o"> </i> {{ Helper::readableDate($report->created_at) }}</span></p>
                                </div>
                                </div>
                            </li>
                        </a>
						@endforeach
                    </ul>
                    @endif
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</x-app-layout>
