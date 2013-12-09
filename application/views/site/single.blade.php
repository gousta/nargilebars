@include('common.head')

@include('common.menu')

<div class="container">
    <div class="row">

        <div class="span10">
            @include('common.map-single')

            <div class="store">
                <a class="btn pull-right" target="_blank" href="http://maps.google.com/?q={{ urlencode($store['address'].', '.$store['area'].', '.$store['region'].', '.$store['zip']) }}"><i class="icon-location-arrow"></i> Διαδρομή</a>
                <h3 class="title">{{ $store['title'] }}</h3>

                <p>{{ $store['content'] }}</p>

                <address>
                    <i class="icon-map-marker"></i>
                    {{ $store['address'] }}, {{ $store['area'] }}, {{ $store['region'] }} {{ $store['zip'] }}
                </address>
            </div>
        </div>

        <div class="span2">

            <ul class="nav nav-list sideNavigation">
                <li class="nav-header">ΚΑΤΑΣΤΗΜΑΤΑ</li>
                @foreach($stores as $row)
                    <li {{ ($row['key'] == $store['key']) ? 'class="active"':'' }}><a href="{{ $row['key'] }}">{{ $row['title'] }}</a></li>
                @endforeach
            </ul>

        </div>
    </div>
</div>

@include('common.foot')
@include('common.end')
