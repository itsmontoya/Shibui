<?php $docRoot = $_SERVER['DOCUMENT_ROOT']; ?>

<style>
.pageList, .navBuilder {
	box-sizing: border-box;
	-moz-box-sizing: border-box;
	-webkit-box-sizing: border-box;
	border: 3px solid #494949;
	border-radius: 12px;
	-moz-border-radius: 12px;
	-webkit-border-radius: 12px;
	height: 100%;
}

.pageList {
	width: 30%;
	float: left;
}

.navBuilder {
	width: 70%;
	float: right;
}

</style>
<script type="text/javascript">
	ajax('listPages');
	function ajax(plugin, data, type, success, context){
		$.ajax({
		url:"plugins/"+plugin+"/edit.php",
			data: data,
			type:  type,
			statusCode: {
			404: function() {
					alert('page not found');
				}
			},
			success: success
		});
	}
</script>
<div class="pageList">

</div>
<div class="navBuilder">
<p>hihihihi</p>
</div>