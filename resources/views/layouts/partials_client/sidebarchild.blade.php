<div id="compact_submenuSidebar" class="submenu-sidebar">

    <div class="submenu" id="dashboard">
        <ul class="submenu-list" data-parent-element="#dashboard"> 
            <li>
                <a href="{{ route('glossary') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" 
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                        class="feather feather-book-open"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z">
                        </path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                    </svg>
                    Search in Glossary 
                </a>
            </li>
        </ul>
    </div>

    <div class="submenu" id="app">
        <ul class="submenu-list" data-parent-element="#app"> 
            <li>
                <a href="{{ route('profile') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                        class="feather feather-user">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg> 
                Profile 
                </a>
            </li>
            @if(Auth::check())
                @if($USERGROUPID == 4)
                    <li>
                        <a href="{{ route('academy') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" 
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z">
                                </path><polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                       Group Users 
                        </a>
                    </li>
                @endif

                @if(Auth::user()->USERID_F == 0 )
                    <li>
                        <a href="{{ route('suscription') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                                class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2">
                                </rect><line x1="1" y1="10" x2="23" y2="10"></line>
                            </svg>
                        Subscription 
                        </a>
                    </li>
                @endif
            @endif
        </ul>
    </div>
</div>