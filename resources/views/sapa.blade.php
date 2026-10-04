   <!DOCTYPE html>
   <html>
   <head><title>Sapa</title></head>
   <body>
       <form method="POST" action="/sapa">
           @csrf
           <label>Nama: <input type="text" name="nama" required></label>
           <button type="submit">Kirim</button>
       </form>
   </body>
   </html
