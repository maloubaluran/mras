<html>
	<head>
		<script>
			var mak = {
				el:"",
				cr_el:function(el_type,attrib) {
					el = document.createElement(el_type)
					for(val in attrib){
						alert(att)
						el.name = attrib[val]
					}
					return this
				},
				append: function(id){
					document.getElementById(id).appendChild(el)
				}
			}
		</script>
	</head>
	<body>
		<div id="i"></div>
		<script>
			mak.cr_el('input',{
				name: 'miming'
			}).append('i')
			
		</script>
	</body>
</html>