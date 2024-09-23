<div class="sidebar-main sidebar-menu-one sidebar-expand-md sidebar-color">
    <div class="mobile-sidebar-header d-md-none">
        <div class="header-logo">
            <a href="index.html"><img src="{{asset('assets')}}/logo/logo_white.png" alt="logo"></a>
        </div>
    </div>
    <div class="sidebar-menu-content">
        <ul class="nav nav-sidebar-menu sidebar-toggle-view">
            <li class="nav-item">
                <a href="{{route('dashboard')}}" class="nav-link {{ @$activeDashboard }}"><i class="flaticon-dashboard"></i><span>{{__("Dashboard")}}</span></a>
            </li>

            <li class="nav-item sidebar-nav-item">
                <a href="#" class="nav-link"><i class="flaticon-classmates"></i><span>Student Management</span></a>
                <ul class="nav sub-group-menu {{ @$activeStudent }}">
{{--                    <li class="nav-item sidebar-nav-item">--}}
{{--                        <a href="#" class="nav-link  {{ @$activeSettingsInstituteInfo }}"><i class="fas fa-angle-right"></i>Registration</a>--}}
{{--                        <ul class="nav sub-group-menu {{ @$activeStudent }}">--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="{{route('student.add')}}" class="nav-link  {{ @$activeSettingsInstituteInfo }}"><i class="fas fa-minus"></i>Enrollment Form</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="{{route('student.import')}}" class="nav-link  {{ @$activeSettingsInstituteInfo }}"><i class="fas fa-minus"></i>Excel Form</a>--}}
{{--                            </li>--}}

{{--                        </ul>--}}
{{--                    </li>--}}

                    <li class="nav-item">
                        <a href="{{route('student.list')}}" class="nav-link {{@$activeStudentClass}}"><i class="fas fa-angle-right"></i>Registration</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('student-report.summary')}}" class="nav-link {{@$activeStudentReportClass}}"><i class="fas fa-angle-right"></i>Reports</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item sidebar-nav-item">
                <a href="#" class="nav-link"><i class="flaticon-checklist"></i><span>Student Attendance</span></a>
                <ul class="nav sub-group-menu">
                    <li class="nav-item">
                        <a href="all-student.html" class="nav-link"><i class="fas fa-angle-right"></i>All
                            Students</a>
                    </li>
                    <li class="nav-item">
                        <a href="student-details.html" class="nav-link"><i
                                class="fas fa-angle-right"></i>Student Details</a>
                    </li>
                    <li class="nav-item">
                        <a href="admit-form.html" class="nav-link"><i
                                class="fas fa-angle-right"></i>Admission Form</a>
                    </li>
                    <li class="nav-item">
                        <a href="student-promotion.html" class="nav-link"><i
                                class="fas fa-angle-right"></i>Student Promotion</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item sidebar-nav-item">
                <a href="#" class="nav-link"><i class="flaticon-multiple-users-silhouette"></i><span>Student Accounts</span></a>
                <ul class="nav sub-group-menu {{@$activeStudentAccount}}">
                    <li class="nav-item">
                        <a href="{{route('student-fee-category.list')}}" class="nav-link"><i class="fas fa-angle-right {{@$activeStudentAccountFeeCategoryClass}}"></i>Fee Category</a>
                    </li>
                    <li class="nav-item">
                        <a href="student-details.html" class="nav-link"><i
                                class="fas fa-angle-right"></i>Student Details</a>
                    </li>
                    <li class="nav-item">
                        <a href="admit-form.html" class="nav-link"><i
                                class="fas fa-angle-right"></i>Admission Form</a>
                    </li>
                    <li class="nav-item">
                        <a href="student-promotion.html" class="nav-link"><i
                                class="fas fa-angle-right"></i>Student Promotion</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item sidebar-nav-item">
                <a href="#" class="nav-link"><i class="flaticon-technological"></i><span>Accounts Management</span></a>
                <ul class="nav sub-group-menu {{@$activeAccountsManagement}}">
                    <li class="nav-item">
                        <a href="{{route('accounts-management.receipt-head-list')}}" class="nav-link {{@$activeReceiptHeadClass}}"><i class="fas fa-angle-right"></i>Receipt Head List</a>
                    </li>
                    <li class="nav-item">
                        <a href="student-details.html" class="nav-link"><i
                                class="fas fa-angle-right"></i>Student Details</a>
                    </li>
                    <li class="nav-item">
                        <a href="admit-form.html" class="nav-link"><i
                                class="fas fa-angle-right"></i>Admission Form</a>
                    </li>
                    <li class="nav-item">
                        <a href="student-promotion.html" class="nav-link"><i
                                class="fas fa-angle-right"></i>Student Promotion</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item sidebar-nav-item">
                <a href="#" class="nav-link"><i class="flaticon-settings"></i><span>Settings</span></a>
                <ul class="nav sub-group-menu {{ @$activeSettings }}">
                    <li class="nav-item">
                        <a href="{{route('institute.information')}}" class="nav-link {{ @$activeSettingsInstituteInfo }}"><i class="fas fa-angle-right"></i>Institute Information</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('class.list')}}" class="nav-link {{ @$activeSettingsClass }}"><i
                                class="fas fa-angle-right"></i>Class</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('settings-department.list')}}" class="nav-link {{@$activeSettingsDepartment}}"><i
                                class="fas fa-angle-right"></i>Department</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('settings-session.list')}}" class="nav-link {{@$activeSettingsSession}}"><i
                                class="fas fa-angle-right"></i>Session</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('settings-designation.list')}}" class="nav-link {{@$activeSettingsDesignation}}"><i
                                class="fas fa-angle-right"></i>Designation</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('settings-subject.list')}}" class="nav-link {{@$activeSettingsSubject}}"><i
                                class="fas fa-angle-right"></i>Subject</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
