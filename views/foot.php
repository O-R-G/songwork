	</body>
</html>

<script type="text/javascript" src="/static/js/screenfull.js"></script>
<script>
        var fullscreens = document.getElementsByClassName('fullscreen');
        for (var i = 0; i < fullscreens.length; i++) {
                ( function () {
                        // ( closure ) -- retains state of local variables
                        // by making capturing context, here using j
                        // + listener wrapped in function to pass variable
                        var fullscreen = fullscreens[i];
                        fullscreen.addEventListener('click', function() {
                                        if (screenfull.enabled) {
                                                screenfull.toggle(fullscreen);
                                        }
                        });
                })();
        }
</script>


