<template>
	<div class="animated notification {{ type }}" v-if="show" transition="slide">
		<a href="#" class="close" data-dismiss="alert" aria-label="close" @click="show =! show">×</a>
		<slot></slot>
	</div>
</template>
<script>
	export default
	{
		props: ['type'],

		data()
		{
			return {
				show: false
			}
		},

		created()
		{
			if (!this.type)
				this.type = 'primary';
			var self = this;
			setTimeout(function() { self.show = true; }, 1);

			setTimeout(function() { self.show = false; }, 5000);
		}
	}
</script>