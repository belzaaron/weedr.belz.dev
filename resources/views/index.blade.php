<x-layout>
    <div class="h-100 p-5 rounded-3 text-light bg-dark">
        <h2>Usage</h2>

        <p class="my-4">
            You may call to <code>{{ url('/XXXXX') }}</code> to get a valid Forecast7 weather url.
            This is useful if you have a need to provide "on-the-fly" weather-widgets from a source like <a href="https://weatherwidget.io">WeatherWidget.io</a>.
            The way I generally accomplish this is by using their widget generator to create a base widget like:
        </p>

        <h4>Widget from WeatherWidget.io</h4>
        <code>
            &lt;a class=&quot;weatherwidget-io&quot; href=&quot;https://forecast7.com/en/40d71n74d01/new-york/&quot; data-label_1=&quot;NEW YORK&quot; data-label_2=&quot;WEATHER&quot; data-theme=&quot;original&quot;&gt;NEW YORK WEATHER&lt;/a&gt;<br />
            &lt;script&gt;<br />
            !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');<br />
            &lt;/script&gt;
        </code>

        <p class="my-4">
            Take note of the <code>href</code> being <code>https://forecast7.com/en/40d71n74d01/new-york/</code> and the <code>data-label_1</code>
            along with the content of the anchor being/including <code>NEW YORK</code>.
            This is significant because, this service allows you to create a new url so you may programmatically replace the
            <code>https://forecast7.com/en/40d71n74d01/new-york/</code> with something like <code>{{ $widget }}</code> which
            was generated using a <strong>GET</strong> request to <a href="{{ url('/20001') }}" target="_blank"><code>{{ url('/20001') }}</code></a> and using the <strong>BODY</strong> of the response.
            Obviously you must replace the <code>20001</code> with your zipcode of choice. Also - if you get a <b>422</b> - it means Forecast7 can't use the zipcode you provided - so it's not this service's fault.
            Finally I replaced the content and <code>data-label_1</code> attribute on the anchor to be <code>WASHINGTON DC</code>.
            Below is a Laravel component that expects two props, <code>url, title</code> which - this service can provide URL, if given a zipcode.
            So for example - I am making a SaaS which allows users to add their property and the application will make a forward-facing page available.
            I would like my users to enable a weather widget feature - but I don't want them having to manually do this,
            so I use the City and Zipcode they've signed up their property with, and this service, and voilà; working weather widget.
            Oh and don't remove the trailing slash. It breaks the regex of Forecast7.
        </p>

        <h4>Laravel component</h4>

        <code>
            &lt;a class=&quot;weatherwidget-io&quot; href=&quot;@{{ $url }}&quot; data-label_1=&quot;@{{ $title }}&quot; data-label_2=&quot;WEATHER&quot; data-theme=&quot;original&quot;&gt;@{{ $title }} WEATHER&lt;/a&gt;<br />
            &lt;script&gt;<br />
            !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');<br />
            &lt;/script&gt;
        </code>

        <h4 class="mt-4">The result</h4>

        <x-widget url="{{ $widget }}?unit=us" title="WASHINGTON DC" />

        <h4 class="mt-4">Attribution and project information</h4>

        <p class="my-4">
            This project filled my need - it may or may not assist another out there, so I made it public.
            Though, I make no revenue from the public facing side of this service.
            The repository is <a href="https://github.com/belzaaron/weedr.belz.dev" target="_blank">here</a> and attribution is certainly given to:
            <ul>
                <li><a href="https://forecast7.com" target="_blank">Forcast7.com</a></li>
                <li><a href="https://weatherwidget.io" target="_blank">WeatherWidget.io</a></li>
                <li><a href="https://getbootstrap.com" target="_blank">Bootstrap</a></li>
                <li><a href="https://lumen.laravel.com" target="_blank">Lumen</a></li>
            </ul>
        </p>
    </div>
</x-layout>
