
<div class="app-sidebar__user py-3">
    <div class="dropdown user-pro-body text-center">
        {{--<div class="user-pic">--}}
            {{--<img src="{{asset('assets/images/users/avatar5.png')}}" alt="user-img"--}}
                 {{--class="avatar-xxl rounded-circle mb-1">--}}
        {{--</div>--}}
        <div class="user-info">
            <h6 class=" mb-2">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</h6>
            <span class="text-muted ">{{getUserTypeName()}}</span>
            @if (auth()->user()->user_type == 3)
                <br><span class="text-muted ">{{ auth()->user()->department->title }}</span>
            @endif
        </div>
    </div>
</div>

<div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"  width="24" height="24" viewBox="0 0 24 24">
        <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
    </svg></div>

