	<script>
		var links = document.links;
		for (var i = 0; i < links.length; i++) {
			if (!links[i].classList.contains('no-blank') && links[i].hostname != location.hostname)
		     links[i].target = "_blank";
		}
	</script>
	</body>
</html>
