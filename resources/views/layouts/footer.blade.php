    <footer><span class="dt">{{ date("d.m.Y H:i:s") }}</span><span class="cnt">Izradio: &copy; Josip Bošnjak</span><span class="okolina"> Okolina: {{ app()->environment() }} | DB: {{ config('database.connections.mysql.database') }}</span></footer>
</body>
</html>