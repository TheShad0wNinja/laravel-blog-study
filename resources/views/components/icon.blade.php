@props(['name'])

@if ($name == 'arrow-down')
    <svg {{ $attributes }} style="right: 12px;" width="22" height="22" viewBox="0 0 22 22"
        {{ $attributes->class(['transform -rotate-90 absolute pointer-events-none']) }}>
        <g fill="none" fill-rule="evenodd">
            <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
            </path>
            <path fill="#222" d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
        </g>
    </svg>
@elseif ($name == 'admin')
    <svg {{ $attributes }} xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home-cog"
        width="16" height="16" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none"
        stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
        <path d="M9 21v-6a2 2 0 0 1 2 -2h1.6"></path>
        <path d="M20 11l-8 -8l-9 9h2v7a2 2 0 0 0 2 2h4.159"></path>
        <path d="M18 18m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
        <path d="M18 14.5v1.5"></path>
        <path d="M18 20v1.5"></path>
        <path d="M21.032 16.25l-1.299 .75"></path>
        <path d="M16.27 19l-1.3 .75"></path>
        <path d="M14.97 16.25l1.3 .75"></path>
        <path d="M19.733 19l1.3 .75"></path>
    </svg>
@elseif ($name == 'logout')
    <svg {{ $attributes }} xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
        <polyline points="16 17 21 12 16 7"></polyline>
        <line x1="21" x2="9" y1="12" y2="12"></line>
    </svg>
@endif
