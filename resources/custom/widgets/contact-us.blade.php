@component( 'sections.box' )

    @slot('title')
        Get in Touch
    @endslot

        <div class="col-md-12">

          <div class="well well-sm">

            <form class="form-horizontal" action="{{ route( 'contact' ) }}" method="post">
            <fieldset>

              <input type="hidden" name="_token" value="{{ csrf_token() }}" />

              @if( Session::has( 'success' ) )
                <p class="alert alert-success">{{ Session::get( 'success' ) }}</p>
              @endif

              <!-- Branch input-->
              <div class="form-group{{ $errors->has( 'contact_branch' ) ? ' has-error' : '' }}">
                <label class="control-label" for="contact_branch">Select a branch:</label>
                  <select id="contact_branch" name="contact_branch" class="form-control">
                    <option value="">Select a Branch</option>
                    <option value="all">All</option>
                    @if( !empty( $branches ) )
                        @foreach( $branches as $branch )
                            <option value="{{ $branch->name }}">{{ $branch->name }}</option>
                        @endforeach
                    @endif
                  </select>

                  @if( $errors->has( 'contact_branch' ) )
                      <span class="help-block">
                          <strong>{{ $errors->first( 'contact_branch' ) }}</strong>
                      </span>
                  @endif
              </div>

              <!-- Name input-->
              <div class="form-group{{ $errors->has( 'contact_name' ) ? ' has-error' : '' }}">
                <label class="control-label" for="contact_name">Your Name</label>
                  <input id="contact_name" name="contact_name" type="text" placeholder="Your name" class="form-control">

                  @if( $errors->has( 'contact_name' ) )
                      <span class="help-block">
                          <strong>{{ $errors->first( 'contact_name' ) }}</strong>
                      </span>
                  @endif
              </div>

              <!-- Email input-->
              <div class="form-group{{ $errors->has( 'contact_email' ) ? ' has-error' : '' }}">
                <label class="control-label" for="contact_email">Your email</label>
                  <input id="contact_email" name="contact_email" type="text" placeholder="Your email" class="form-control">
                  @if( $errors->has( 'contact_email' ) )
                      <span class="help-block">
                          <strong>{{ $errors->first( 'contact_email' ) }}</strong>
                      </span>
                  @endif
              </div>

              <!-- Message body -->
              <div class="form-group{{ $errors->has( 'contact_message' ) ? ' has-error' : '' }}">
                <label class="control-label" for="contact_message">Your message</label>
                  <textarea class="form-control" id="contact_message" name="contact_message" placeholder="Please enter your message here..." rows="5"></textarea>
                  @if( $errors->has( 'contact_message' ) )
                      <span class="help-block">
                          <strong>{{ $errors->first( 'contact_message' ) }}</strong>
                      </span>
                  @endif
              </div>
              @if( !empty( config( 'settings.public_key' ) ) )
                <div>
                    <div class="g-recaptcha text-center" data-sitekey="{{ config( 'settings.public_key' ) }}"></div>
                </div>
                <br/>
              @endif
              <!-- Form actions -->
              <div class="form-group">
                  <button type="contact_submit" class="btn btn-block contact-btn btn-success">Submit</button>
              </div>

            </fieldset>

            </form>

          </div>

        </div>

@endcomponent
