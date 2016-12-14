<template>
	<div class="animated notification {{ type }}" v-if="show" transition="slide">
		<a href="#" class="close" data-dismiss="alert" aria-label="close" @click="show =! show">×</a>
		<div class="row">
			<div class="col-sm-1">
				<span class="glyphicon glyphicon-{{ icon }}"></span>
			</div>
			<div class="col-sm-9">
				<slot></slot>
			</div>
		</div>
	</div>
</template>
<script>
	export default
	{
		props: ['type', 'icon'],

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
			if (!this.icon)
				this.icon = 'comment';

			var self = this;
			setTimeout(function() { self.show = true; }, 1);

			setTimeout(function() { self.show = false; }, 5000);
		}
	}
</script>