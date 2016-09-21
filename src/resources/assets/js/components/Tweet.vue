<template>
	<div class="list-group-item">
		<span class="list-group-item-heading"><slot></slot></span>
		<p class="list-group-item-text">{{ date }}</p>
	</div>
</template>
<script>
	export default
	{
		props: ['date']
	}
</script>