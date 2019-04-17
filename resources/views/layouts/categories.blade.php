
<div class="aside-widget">
    <div class="section-title">
        <h2>Catagories</h2>
    </div>
    <div class="category-widget">
        @foreach ($categories as $category)
        <ul>
        <li><a href="/categories/{{$category->id}}" class="cat-1">{{$category->name}}<span>340</span></a></li>
        </ul>
        @endforeach
    </div>
</div>
