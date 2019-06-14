<!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('admin')}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect has-arrow waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-border-inside"></i><span class="hide-menu">Batchs</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="{{route('batch.index')}}" class="sidebar-link"><i class="mdi"></i><span class="hide-menu">Batch list</span></a></li>
                                <li class="sidebar-item"><a href="{{route('batch.create')}}" class="sidebar-link"><i class="mdi"></i><span class="hide-menu">Create Batch</span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect has-arrow waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-border-inside"></i><span class="hide-menu">Faculties</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="{{route('faculty.index')}}" class="sidebar-link"><i class="mdi"></i><span class="hide-menu">Faculty list</span></a></li>
                                <li class="sidebar-item"><a href="{{route('faculty.create')}}" class="sidebar-link"><i class="mdi"></i><span class="hide-menu">Create Faculty</span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect has-arrow waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-border-inside"></i><span class="hide-menu">Result</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="{{route('result.index')}}" class="sidebar-link"><i class="mdi"></i><span class="hide-menu">All result list</span></a></li>
                                <li class="sidebar-item"><a href="{{route('result.create')}}" class="sidebar-link"><i class="mdi"></i><span class="hide-menu">Insert Result</span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect has-arrow waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-border-inside"></i><span class="hide-menu">Students</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="{{route('student.index')}}" class="sidebar-link"><i class="mdi"></i><span class="hide-menu">Student list</span></a></li>
                                <li class="sidebar-item"><a href="{{route('student.create')}}" class="sidebar-link"><i class="mdi"></i><span class="hide-menu">Create Student</span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect has-arrow waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-border-inside"></i><span class="hide-menu">Subjects</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="{{route('subject.index')}}" class="sidebar-link"><i class="mdi"></i><span class="hide-menu">Subject list</span></a></li>
                                <li class="sidebar-item"><a href="{{route('subject.create')}}" class="sidebar-link"><i class="mdi"></i><span class="hide-menu">Create Subject</span></a></li>
                            </ul>
                        </li>
                        
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->