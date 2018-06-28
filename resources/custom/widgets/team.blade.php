@component( 'sections.box' )

    @slot('title')
        Meet Our Staff
    @endslot

    <div class="row">
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
          <div class="staff-name featured font-weight-bold text-center ">Susan</div>
          <div class="staff-position text-center">CEO</div>
      </div>
    </div>

@endcomponent
