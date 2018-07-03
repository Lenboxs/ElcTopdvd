@component( 'sections.box' )

    @slot('title')
        {{ !empty( $page ) ? $page->heading : '' }}
    @endslot

    <p>{{ !empty( $page ) ? $page->body : '' }}</p>

@endcomponent
