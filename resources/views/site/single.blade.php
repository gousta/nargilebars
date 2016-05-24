@include('common.head')

@include('common.menu')

<div class="container">
    <div class="row">

        <div class="span10">
            @include('common.map-single')

            <div class="store">
                <a class="btn pull-right" target="_blank" href="http://maps.google.com/?q={{ urlencode($store['address']['street'].', '.$store['address']['area'].', '.$store['address']['region'].', '.$store['address']['zip']) }}"><i class="icon-location-arrow"></i> Διαδρομή</a>
                <h3 class="title">{{ $store['title'] or '' }}</h3>

                <p>{{ $store['content'] or '' }}</p>

                <address>
                    <i class="icon-map-marker"></i>
                    {{ $store['address']['street'] or '' }}, {{ $store['address']['area'] or '' }}, {{ $store['address']['region'] or '' }} {{ $store['address']['zip'] or '' }}
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
