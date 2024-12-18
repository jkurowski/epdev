<div class="card-header card-nav">
    <nav class="nav">
        <a class="nav-link " href="{{route('admin.developro.investment.edit', $investment)}}"><span class="fe-info"></span> {{$investment->name}}</a>

        <a class="nav-link {{ Request::routeIs('admin.developro.investment.section.*') ? ' active' : '' }}" href="{{route('admin.developro.investment.section.index', $investment)}}"><span class="fe-file-text"></span> Sekcje tekstowe</a>

        <a class="nav-link {{ Request::routeIs('admin.developro.investment.article.index') ? ' active' : '' }}" href="{{route('admin.developro.investment.article.index', $investment)}}"><span class="fe-rss"></span> Dziennik inwestycji</a>

        <a class="nav-link {{ Request::routeIs('admin.developro.investment.search.index') ? ' active' : '' }}" href="{{route('admin.developro.investment.search.index', $investment)}}"><span class="fe-search"></span> Wyszukiwarka</a>
    </nav>
</div>
