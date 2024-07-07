<x-app-layout>
    @include('partials.pageTitle', ['title' => "File Manager", 'slug' => "File Manager"])
    <!-- Container-fluid starts-->
    <div class="container-fluid default-dashboard">
    <form action="{{ route('excel.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="file">Choose CSV File:</label>
        <input type="file" name="file" id="file">
        <button type="submit">Upload</button>
    </form>
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
                                <form class="row g-3 needs-validation custom-input">
                                    <div class="col-12">
                                        <label class="form-label" for="validationCustom01">Title</label>
                                        <input class="form-control" id="validationCustom01" type="text" placeholder="Report Title" required>
                                        <div class="invalid-feedback">Please enter your valid </div>
                                        <div class="valid-feedback">
                                        Looks's Good!</div>
                                    </div>
                                    <div class="col-12"> 
                                        <label class="form-label" for="validationTextarea">Description</label>
                                        <textarea class="form-control" id="validationTextarea" placeholder="Enter your report description" required></textarea>
                                        <div class="invalid-feedback">Please enter a message in the textarea.</div>
                                    </div>
                                    <div class="col-12"> 
                                        <label class="form-label" for="formFile1">Upload Excel File</label>
                                        <input class="form-control" id="formFile1" type="file" aria-label="file example" required>
                                        <div class="invalid-feedback">Invalid form file selected</div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                        <input class="form-check-input" id="invalidCheck" type="checkbox" value="" required>
                                        <label class="form-check-label" for="invalidCheck">Agree to terms and conditions</label>
                                        <div class="invalid-feedback">You must agree before submitting.</div>
                                        </div>
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
                        <div class="btn btn-outline-primary ms-2"><i data-feather="upload">   </i>Upload  </div>
                    </div>
                    </div>
                </div>
                <div class="card-body file-manager">
                    <h5 class="mt-4 mb-2">Reports</h5>
                    <ul class="folder">
                    <li class="folder-box">
                        <div class="d-block"><i class="f-22 fa fa-file-excel-o font-success"></i><i class="fa fa-ellipsis-v me-0 f-14 ellips"></i>
                        <div class="mt-3">  
                            <h6>Tivo admin</h6>
                            <p>20 file<span class="pull-right"> <i class="fa fa-clock-o"> </i> 2 Hour ago</span></p>
                        </div>
                        </div>
                    </li>
                    <li class="folder-box">
                        <div class="d-block"><i class="f-44 fa fa-folder txt-warning"></i><i class="fa fa-ellipsis-v me-0 f-14 ellips"></i>
                        <div class="mt-3">  
                            <h6>Viho admin</h6>
                            <p>14 file<span class="pull-right"> <i class="fa fa-clock-o"> </i> 3 Hour ago</span></p>
                        </div>
                        </div>
                    </li>
                    <li class="folder-box">
                        <div class="d-block"><i class="f-44 fa fa-file-archive-o txt-warning"></i><i class="fa fa-ellipsis-v me-0 f-14 ellips"></i>
                        <div class="mt-3">  
                            <h6>Unice admin</h6>
                            <p>15 file<span class="pull-right"> <i class="fa fa-clock-o"> </i> 3 Day ago</span></p>
                        </div>
                        </div>
                    </li>
                    <li class="folder-box">
                        <div class="d-block"><i class="f-44 fa fa-folder txt-warning"></i><i class="fa fa-ellipsis-v me-0 f-14 ellips"></i>
                        <div class="mt-3">  
                            <h6>Koho admin</h6>
                            <p>10 file<span class="pull-right"> <i class="fa fa-clock-o"> </i> 1 Day ago</span></p>
                        </div>
                        </div>
                    </li>
                    </ul>
                    <h5 class="mt-4 mb-2">Files </h5>
                    <ul class="d-flex flex-row files-content">
                    <li class="folder-box d-flex align-items-center">
                        <div class="d-flex align-items-center files-list">
                        <div class="flex-shrink-0 file-left"><i class="f-22 fa fa-folder font-info"></i></div>
                        <div class="flex-grow-1 ms-3">
                            <h6>Logo.psd</h6>
                            <p>7 Hour ago, 2.0 MB</p>
                        </div>
                        </div>
                    </li>
                    <li class="folder-box d-flex align-items-center">
                        <div class="d-flex align-items-center files-list">
                        <div class="flex-shrink-0 file-left"><i class="f-22 fa fa-file-excel-o font-success"></i></div>
                        <div class="flex-grow-1 ms-3">
                            <h6>Backend.xls</h6>
                            <p>2 Day ago, 3.0 GB</p>
                        </div>
                        </div>
                    </li>
                    <li class="folder-box d-flex align-items-center">
                        <div class="d-flex align-items-center files-list">
                        <div class="flex-shrink-0 file-left"><i class="f-22 fa fa-file-archive-o font-warning"></i></div>
                        <div class="flex-grow-1 ms-3">
                            <h6>Project.zip</h6>
                            <p>1 Day ago, 1.9 GB</p>
                        </div>
                        </div>
                    </li>
                    <li class="folder-box d-flex align-items-center">
                        <div class="d-flex align-items-center files-list">
                        <div class="flex-shrink-0 file-left"><i class="f-22 fa fa-folder font-primary"></i></div>
                        <div class="flex-grow-1 ms-3">
                            <h6>Report.txt</h6>
                            <p>1 Day ago, 0.9 KB</p>
                        </div>
                        </div>
                    </li>
                    <li class="folder-box d-flex align-items-center">
                        <div class="d-flex align-items-center files-list">
                        <div class="flex-shrink-0 file-left"><i class="f-22 fa fa-file-archive-o font-warning"></i></div>
                        <div class="flex-grow-1 ms-3">
                            <h6>Project.zip</h6>
                            <p>1 Day ago, 1.9 GB</p>
                        </div>
                        </div>
                    </li>
                    <li class="folder-box d-flex align-items-center">
                        <div class="d-flex align-items-center files-list">
                        <div class="flex-shrink-0 file-left"><i class="f-22 fa fa-folder font-primary"></i></div>
                        <div class="flex-grow-1 ms-3">
                            <h6>Report.txt</h6>
                            <p>1 Day ago, 0.9 KB   </p>
                        </div>
                        </div>
                    </li>
                    <li class="folder-box d-flex align-items-center">
                        <div class="d-flex align-items-center files-list">
                        <div class="flex-shrink-0 file-left"><i class="f-22 fa fa-file-excel-o font-success"></i></div>
                        <div class="flex-grow-1 ms-3">
                            <h6>Backend.xls</h6>
                            <p>2 Day ago, 3.0 GB   </p>
                        </div>
                        </div>
                    </li>
                    <li class="folder-box d-flex align-items-center">
                        <div class="d-flex align-items-center files-list">
                        <div class="flex-shrink-0 file-left"><i class="f-22 fa fa-folder font-primary"></i></div>
                        <div class="flex-grow-1 ms-3">
                            <h6>Report.txt</h6>
                            <p>1 Day ago, 0.9 KB</p>
                        </div>
                        </div>
                    </li>
                    <li class="folder-box d-flex align-items-center">
                        <div class="d-flex align-items-center files-list">
                        <div class="flex-shrink-0 file-left"><i class="f-22 fa fa-file-archive-o font-warning"></i></div>
                        <div class="flex-grow-1 ms-3">
                            <h6>Project.zip</h6>
                            <p>1 Day ago, 1.9 GB</p>
                        </div>
                        </div>
                    </li>
                    <li class="folder-box d-flex align-items-center">
                        <div class="d-flex align-items-center files-list">
                        <div class="flex-shrink-0 file-left"><i class="f-22 fa fa-folder font-primary"></i></div>
                        <div class="flex-grow-1 ms-3">
                            <h6>Report.txt</h6>
                            <p>1 Day ago, 0.9 KB</p>
                        </div>
                        </div>
                    </li>
                    </ul>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</x-app-layout>
