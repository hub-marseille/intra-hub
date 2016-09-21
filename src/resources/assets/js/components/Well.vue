<template>
	<div class="well" :class="getSize">
		<slot></slot>
	</div>
</template>
<script>
	export default
	{
		props: ['size'],

		computed:
		{
			getSize()
			{
				var size = this.size;

				switch (size)
				{
					case 'small':
						return ('well-sm');
					case 'large':
						return ('well-lg');
					default:
						return ('');
				}
			}
		}
	}
</script>