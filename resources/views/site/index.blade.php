@include('common.head')


@include('common.menu')

<div class="container">
    <div class="row">

        <div class="span10">
            @include('common.map-all')
        </div>

        <div class="span2">

            <ul class="nav nav-list sideNavigation">
                <li class="nav-header">ΚΑΤΑΣΤΗΜΑΤΑ</li>
                @foreach($stores as $store)
                    <li><a href="{{ $store['key'] }}">{{ $store['title'] }}</a></li>
                @endforeach
            </ul>

        </div>
    </div>
</div>


@include('common.foot')
@include('common.end')
