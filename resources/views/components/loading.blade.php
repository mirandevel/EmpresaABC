<button {{$attributes->wire('loading') }} {{$attributes->wire('target') }}disabled>
    <svg class="animate-spin h-5 w-5 mr-3"
         xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
         style="fill:rgba(0, 0, 0, 1);transform:;-ms-filter:">
        <circle cx="12" cy="20" r="2"/>
        <circle cx="12" cy="4" r="2"/>
        <circle cx="6.343" cy="17.657" r="2"/>
        <circle cx="17.657" cy="6.343" r="2"/>
        <circle cx="4" cy="12" r="2.001"/>
        <circle cx="20" cy="12" r="2"/>
        <circle cx="6.343" cy="6.344" r="2"/>
        <circle cx="17.657" cy="17.658" r="2"/>
    </svg>
</button>
