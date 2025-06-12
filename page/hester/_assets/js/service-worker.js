self.addEventListener('install', event => {
    event.waitUntil(
      caches.open('app-cache').then(cache => {
        const urlsToCache = [
            '/page/hester/',
            '/page/hester/index.php',
            '/page/hester/style.css',
            '/page/hester/script.js',
            '/page/hester/_assets/icons/icon-192x192.png'
        ];
        return Promise.all(
          urlsToCache.map(url =>
            fetch(url).then(response => {
              if (!response.ok) throw new Error(`Failed to fetch ${url}`);
              return cache.put(url, response);
            })
          )
        );
      })
    );
});
  