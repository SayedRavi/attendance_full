<ul class="sidenav sidenav-fixed " id="sidenav">
    <li>
        <div style="width: 50%; margin: 0 auto" class="mt-3">
            <img src="{{asset('images/undraw_collaboration_re_vyau.svg')}}" alt="Logo" style="width: 100%">
        </div>
    </li>
    <li class="{{$active == 'dashboard' ? 'active' : ''}} waves-effect waves-block">
        <a href="{{route('admin.index')}}">
            <i class="material-icons left">dashboard</i>
            Dashboard
        </a>
    </li>
    <li class="{{$active == 'reports' ? 'active' : ''}} waves-effect waves-block">
        <a href="{{route('report.index')}}">
            <i class="material-icons left">list</i>
            Reports
        </a>
    </li>
    <li class="{{$active == 'courses' ? 'active' : ''}} waves-effect waves-block">
        <a href="{{route('course.index')}}">
            <i class="material-icons left">account_balance</i>
            Courses
        </a>
    </li>
    <li class="{{$active == 'teachers' ? 'active' : ''}} waves-effect waves-block">
        <a href="{{route('teacher.index')}}">
            <i class="material-icons left">people_outline</i>
            Teachers
        </a>
    </li>
    <li class="{{$active == 'students' ? 'active' : ''}} waves-effect waves-block">
        <a href="{{route('student.index')}}">
            <i class="material-icons left">people</i>
            Students
        </a>
    </li>
    <li class="{{$active == 'subjects' ? 'active' : ''}} waves-effect waves-block">
        <a href="{{route('subject.index')}}">
            <i class="material-icons left">chrome_reader_mode</i>
            Subjects
        </a>
    </li>
    <li class="{{$active == 'settings' ? 'active' : ''}} waves-effect waves-block">
        <a href="{{route('setting.index')}}">
            <i class="material-icons left">settings</i>
            Settings
        </a>
    </li>

{{--    For Mobile Devices Only--}}
    <li class="hide-on-large-only">
        <a href="{{$active == 'profile' ? 'active' : ''}} waves-effect waves-block">
            <i class="material-icons left">person</i>
            Profile
        </a>
    </li>
    <li class="hide-on-large-only">
        <a href="{{$active == 'changePassword' ? 'active' : ''}} waves-effect waves-block ">
            <i class="material-icons left">lock_outline</i>
            Change Password
        </a>
    </li>
    <li class="waves-effect waves-block hide-on-large-only">
        <a href="javascript:void(0)" onclick="$('#logout').submit()">
            <i class="material-icons left">exit_to_app</i>
            Logout
        </a>
    </li>
</ul>
