@php echo '<?xml version="1.0" encoding="UTF-8"?>' @endphp
<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

            
@foreach($route as $r)
<url>
  <loc>{{ route($r[0]) }}</loc>
  <lastmod>2023-01-01T07:16:32+00:00</lastmod>
  <priority>{{ $r[1] }}</priority>
</url>
@endforeach
@foreach($blog_list as $b)
<url>
  <loc>{{ route('blog.detail',$b->uniq) }}</loc>
  <lastmod>{{ $b->publish_date }}T07:16:32+00:00</lastmod>
  <priority>0.90</priority>
</url>
@endforeach
@foreach($tag_list as $t => $val)
<url>
  <loc>{{ route('tag.detail',$t) }}</loc>
  <lastmod>2023-01-01T07:16:32+00:00</lastmod>
  <priority>0.80</priority>
</url>
@endforeach
</urlset>