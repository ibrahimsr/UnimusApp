<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li><a href="{{route('dashboard')}}" class="{{Request::is('/')?'active':''}}"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                
                @if(auth()->user()->role=='admin')
                <li><a href="{{route('lecturers.index')}}" class="{{Request::is('lecturers')?'active':''}}"><i class="lnr lnr-user"></i> <span>Dosen</span></a></li>
                <li><a href="{{route('students.index')}}" class="{{Request::is('students')?'active':''}}"><i class="lnr lnr-user"></i> <span>Mahasiswa</span></a></li>
                @endif
                
                @if(auth()->user()->role=='dosen')
                <li><a href="{{route('lecturers.myprofile')}}" class="{{Request::is('profilsaya')?'active':''}}"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
                @endif
                
                @if(auth()->user()->role=='mahasiswa')
                <li><a href="{{route('students.profilsaya')}}" class="{{Request::is('profilsaya')?'active':''}}"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
                @endif
            </ul>
        </nav>
    </div>
</div>