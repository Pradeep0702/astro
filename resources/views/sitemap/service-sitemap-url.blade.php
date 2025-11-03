<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  @foreach($sitemapurls as $sitemapurl)
    <url>
    <loc>{{url('/').'/service/'.$sitemapurl->menu_slug}}</loc>
    <lastmod>{{$sitemapurl->updated_at->toAtomString();}}</lastmod>
    <changefreq>weekly</changefreq>
    <priority>0.5</priority>
  </url>
  @endforeach
</urlset>
