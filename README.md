<h1>Ranking de Clientes</h1>
<p>configurate .env</p>
<hr>
<p> Create a folder "logos" in storage/app/public/</p>
<p>chmod -R 775 storage</p>
<p>chmod -R 775 storage/app/public/logos</p>
<p>php artisan storage:link</p>
<hr>
<h3>Populate the DataBase</h3>
<br>
<p>php artisan migrate</p>
<p>php artisan db:seed --class=CustomersTableSeeder</p>
