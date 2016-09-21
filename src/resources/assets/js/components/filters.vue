<script>
	Vue.filter('url', function(value)
	{
		return (value.replace(/\s+/g, '-').toLowerCase())
	});
</script>