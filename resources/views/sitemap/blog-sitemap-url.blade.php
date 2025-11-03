 <?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  @foreach($blogdatas as $blogdata)  
  <url>
    <loc>{{url('/blog/'.$blogdata->slug)}}</loc>
    <lastmod>{{$blogdata->updated_at->toAtomString();}}</lastmod>
  </url>
  @endforeach
</urlset>