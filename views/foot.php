	<script>
		var links = document.links;
		for (var i = 0; i < links.length; i++) {
			if (!links[i].classList.contains('no-blank') && links[i].hostname != location.hostname)
		     links[i].target = "_blank";
		}
	</script>
		<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-138624239-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-138624239-1');
	</script>
	</body>
</html>
