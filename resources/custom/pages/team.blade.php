@extends( 'templates.main' )

@section( 'content' )

    @component( 'templates.one-column' )

        @slot('title')
            Meat Our Staff
        @endslot

        <div class="col-md-4">
            <div class="staff">
                <img src="{{ asset( 'img/staff/1.jpeg' ) }}" class="staff-img" />
            </div>
            <div class="staff-name featured font-weight-bold text-center">John Doe</div>
            <div class="staff-position text-center text-center">Founders</div>
        </div>
        <div class="col-md-4">
            <div class="staff">
                <img src="{{ asset( 'img/staff/2b.jpeg' ) }}" class="staff-img" />
            </div>
            <div class="staff-name featured font-weight-bold text-center ">Jane Doe</div>
            <div class="staff-position text-center">CEO</div>
        </div>
    @endcomponent
@endsection
