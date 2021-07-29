@props(['url', 'title'])

<a class="weatherwidget-io" href="{{ $url }}" data-label_1="{{ $title }}" data-label_2="WEATHER" data-theme="original">{{ $title }} WEATHER</a>
<script>
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
</script>
