	</body>
</html>

<script>
	var links = document.links;
	for (var i = 0; i < links.length; i++) {
		if (links[i].hostname != location.hostname)
	     links[i].target = "_blank";
	}
</script>
