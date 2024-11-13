self.addEventListener('install', (event) => {
    event.waitUntil(
      caches.open('feira-tech-cache').then((cache) => {
        return cache.addAll([
          '/', 
          '/principal.php',
          '/principap.css',
          '/app.js',
          '/icons/icon-192x192.png',
          '/icons/icon-512x512.png',
          // Adicione aqui outros arquivos necessários
        ]);
      })
    );
  });
  
  self.addEventListener('fetch', (event) => {
    event.respondWith(
      caches.match(event.request).then((cachedResponse) => {
        return cachedResponse || fetch(event.request);
      })
    );
  });
  
  
  