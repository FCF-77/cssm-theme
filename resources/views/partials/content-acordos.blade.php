<div class="grid-container my-100">
    <div class="page-title default-page">
        <h1>{!! App::title() !!}</h1>
        <h2>* os acordos poderão alterar consoante os servicos médicos.<br>Para mais informações contactar a entidade</h2>
    </div>
    @php
        $the_query = new WP_Query( [
        'post_type' => 'cssm_agreement',
        'posts_per_page' => -1,
        'fields' => 'ids',
        'orderby' => 'date',
        'order' => 'ASC'
        ] );
    @endphp

    @if ($the_query->have_posts())
        <div class="agreements grid-x grid-margin-y">
        @while ($the_query->have_posts()) @php $the_query->the_post() @endphp
            <div class="cell small-6 medium-4 large-3">
                {!! the_post_thumbnail() !!}
                <p>{!! get_the_title() !!}</p>
            </div>
        @endwhile
        </div>
    @endif
</div>